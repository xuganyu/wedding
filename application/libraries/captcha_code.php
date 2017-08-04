<?php
// +----------------------------------------------------------------------
// | Leaps Framework [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://www.tintsoft.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author XuTongle <xutongle@gmail.com>
// +----------------------------------------------------------------------
// | $Id$
// +----------------------------------------------------------------------
error_reporting ( E_ALL );
ini_set('display_errors', '1');
class Captcha_code {

	/**
	 * 输出类型
	 *
	 * 可以是png,gif,jpeg
	 *
	 * @var string
	 */
	public $imageType = 'png';

	/**
	 * 生成宽度
	 *
	 * @var unknown
	 */
	public $width = 100;

	/**
	 * 生成高度
	 *
	 * @var unknown
	 */
	public $height = 34;

	/**
	 * 验证码字符长度
	 *
	 * @var int
	 */
	public $codeLen = 4;

	/**
	 * 验证码类型
	 *
	 * @var int 1 数字 2 大写字母 3小写字母 4 中文 默认字母不区分大小写
	 */
	public $codeType = 99;
	/**
	 * 验证码复杂度
	 *
	 * @var unknown
	 */
	public $complexity = 4;

	/**
	 * 字体
	 *
	 * @var unknown
	 */
	public $fonts = array ('DejaVuSerif.ttf','FetteSteinschrift.ttf','STXINWEI.TTF' );

	/**
	 * 背景
	 *
	 * @var unknown
	 */
	public $background = '';
	public $promote = false;
	public $life = 1800;
	protected $image;
	protected $response = '';

	/**
	 * 初始化
	 */
	public function init() {
	}
	/**
	 * 生成随机验证码。
	 */
	protected function creatCode() {
		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$result = "";
		$length = "4";
		for($i = 0; $i < $length; $i ++) {
			$num [$i] = rand ( 0, 25 );
			$result .= $str [$num [$i]];
		}
		$this->response = $result;
		// $this->response = String::randString ( $this->codeLen,
		// $this->codeType );
		//if (session_status () == PHP_SESSION_ACTIVE) {
		//} else {
		//	session_start ();
		//}
		$_SESSION ['captcha'] = strtolower ( $this->response );
	}

	/**
	 * 创建图片
	 *
	 * @param string $background
	 */
	protected function imageCreate($background = null) {
		if (! function_exists ( 'imagegd2' )) {
			throw new Exception ( '[captcha.requires_GD2' );
		}
		$this->image = imagecreatetruecolor ( $this->width, $this->height );
		if (! empty ( $background )) {
			// 设置背景色
			$background = imagecolorallocate ( $this->image, hexdec ( substr ( $background, 1, 2 ) ), hexdec ( substr ( $background, 3, 2 ) ), hexdec ( substr ( $background, 5, 2 ) ) );
			// 画一个柜形，设置背景颜色。
			imagefilledrectangle ( $this->image, 0, $this->height, $this->width, 0, $background );
		}
	}
	protected function imageGradient($color1, $color2, $direction = null) {
		$directions = array('horizontal','vertical' );
		if (! in_array ( $direction, $directions )) {
			$direction = $directions [array_rand ( $directions )];
			if (mt_rand ( 0, 1 ) === 1) {
				$temp = $color1;
				$color1 = $color2;
				$color2 = $temp;
			}
		}

		$color1 = imagecolorsforindex ( $this->image, $color1 );
		$color2 = imagecolorsforindex ( $this->image, $color2 );

		$steps = ($direction === 'horizontal') ? $this->width : $this->height;

		$r1 = ($color1 ['red'] - $color2 ['red']) / $steps;
		$g1 = ($color1 ['green'] - $color2 ['green']) / $steps;
		$b1 = ($color1 ['blue'] - $color2 ['blue']) / $steps;

		$i = null;
		if ($direction === 'horizontal') {
			$x1 = & $i;
			$y1 = 0;
			$x2 = & $i;
			$y2 = $this->height;
		} else {
			$x1 = 0;
			$y1 = & $i;
			$x2 = $this->width;
			$y2 = & $i;
		}
		for($i = 0; $i <= $steps; $i ++) {
			$r2 = $color1 ['red'] - floor ( $i * $r1 );
			$g2 = $color1 ['green'] - floor ( $i * $g1 );
			$b2 = $color1 ['blue'] - floor ( $i * $b1 );
			$color = imagecolorallocate ( $this->image, $r2, $g2, $b2 );
			imageline ( $this->image, $x1, $y1, $x2, $y2, $color );
		}
	}
	protected function imageRender() {
		ob_clean();
		header ( "Cache-Control:no-cache,must-revalidate" );
		header ( "Pragma:no-cache" );
		header ( 'Content-Type: image/' . $this->imageType );
		header ( "Connection:close" );
		$function = 'image' . $this->imageType;
		$function ( $this->image );
		imagedestroy ( $this->image );
	}

	/**
	 * 渲染图片
	 *
	 * @throws Core_Exception
	 */
	public function render() {
		if (empty ( $this->response )) {
			$this->creatCode ();
		}
		$this->imageCreate ( $this->background );

		

		if (empty ( $this->background )) {
			$color1 = imagecolorallocate ( $this->image, mt_rand ( 0, 100 ), mt_rand ( 0, 100 ), mt_rand ( 0, 100 ) );
			$color2 = imagecolorallocate ( $this->image, mt_rand ( 0, 100 ), mt_rand ( 0, 100 ), mt_rand ( 0, 100 ) );
			$this->imageGradient ( $color1, $color2 );
		}
		
		for($i = 0, $count = mt_rand ( 10, $this->complexity * 3 ); $i < $count; $i ++) {
			$color = imagecolorallocatealpha ( $this->image, mt_rand ( 0, 255 ), mt_rand ( 0, 255 ), mt_rand ( 0, 255 ), mt_rand ( 80, 120 ) );
			$size = mt_rand ( 5, $this->height / 3 );
			imagefilledellipse ( $this->image, mt_rand ( 0, $this->width ), mt_rand ( 0, $this->height ), $size, $size, $color );
		}
		
		$default_size = min ( $this->width, $this->height * 2 ) / strlen ( $this->response );
		
		$spacing = ( int ) ($this->width * 0.9 / strlen ( $this->response ));
		$color_limit = mt_rand ( 96, 160 );
		$chars = 'ABEFGJKLPQRTVY';
		
		for($i = 0, $strlen = strlen ( $this->response ); $i < $strlen; $i ++) {
			$font = SYSDIR . "/fonts/" . $this->fonts [array_rand ( $this->fonts )];
			$angle = mt_rand ( - 40, 20 );
			$size = $default_size / 10 * mt_rand ( 8, 12 );
			if (! function_exists ( 'imageftbbox' )) {
				throw new Exception ( 'function imageftbbox not exist.' );
			}
			$box = imageftbbox ( $size, $angle, $font, $this->response [$i] );
			$x = $spacing / 4 + $i * $spacing;
			$y = $this->height / 2 + ($box [2] - $box [5]) / 4;
			$color = imagecolorallocate ( $this->image, mt_rand ( 150, 255 ), mt_rand ( 200, 255 ), mt_rand ( 0, 255 ) );
			imagefttext ( $this->image, $size, $angle, $x, $y, $color, $font, $this->response [$i] );
			$text_color = imagecolorallocatealpha ( $this->image, mt_rand ( $color_limit + 8, 255 ), mt_rand ( $color_limit + 8, 255 ), mt_rand ( $color_limit + 8, 255 ), mt_rand ( 70, 120 ) );
			$char = substr ( $chars, mt_rand ( 0, 14 ), 1 );
			imagettftext ( $this->image, $size * 1.4, mt_rand ( - 45, 45 ), ($x - (mt_rand ( 5, 10 ))), ($y + (mt_rand ( 5, 10 ))), $text_color, $font, $char );
		}
		
		return $this->imageRender ();
	}
}