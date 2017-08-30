<?php


//设置编码
header("Content-type:text/html;charset=utf-8");

//错误显示
#error_reporting(E_ALL);

//设置时区
date_default_timezone_set("PRC");


/**
 * 
 * 验证是否登录  后台验证
 */
function islogin(){
	
	$CI =& get_instance();
	
	if($CI->session->userdata('islogin') == false){
		redirect("admin/login");
	}
}

/**
 * 
 * 验证是否登录  前台验证
 */
function isloginvip(){
	
	$CI =& get_instance();
	
	if($CI->session->userdata('isvip') == false){
		redirect("login");
	}
}

/**
 * 前台验证用户是否登录  已登录则获取用户信息
 */
function get_user_info(){
	$CI =& get_instance();
    
	if($CI->session->userdata('user_login') == false){
	    return null;
	}else{
	    $data['user_id'] = $CI->session->userdata('user_id');
	    $data['user_phone'] = $CI->session->userdata('user_phone');
	    $data['user_name'] = $CI->session->userdata('user_name');
	    $data['user_nickname'] = $CI->session->userdata('user_nickname');
	    $data['user_photo'] = $CI->session->userdata('user_photo');
	    $data['user_sex'] = $CI->session->userdata('user_sex');
	    return $data;
	}
}

/**
 * 
 * 字符截取
 * @param string $string
 * @param int $start
 * @param int $length
 * @param string $charset
 * @param string $dot
 * 
 * @return string
 */
function str_cut(&$string, $start, $length, $charset = "utf-8", $dot = '...') {
	if(function_exists('mb_substr')) {
		if(mb_strlen($string, $charset) > $length) {
			return mb_substr ($string, $start, $length, $charset) . $dot;
		}
		return mb_substr ($string, $start, $length, $charset);
		
	}else if(function_exists('iconv_substr')) {
		if(iconv_strlen($string, $charset) > $length) {
			return iconv_substr($string, $start, $length, $charset) . $dot;
		}
		return iconv_substr($string, $start, $length, $charset);
	}

	$charset = strtolower($charset);
	switch ($charset) {
		case "utf-8" :
			preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $ar);
			if(func_num_args() >= 3) {
				if (count($ar[0]) > $length) {
					return join("", array_slice($ar[0], $start, $length)) . $dot;
				}
				return join("", array_slice($ar[0], $start, $length));
			} else {
				return join("", array_slice($ar[0], $start));
			}
			break;
		default:
			$start = $start * 2;
			$length   = $length * 2;
			$strlen = strlen($string);
			for ( $i = 0; $i < $strlen; $i++ ) {
				if ( $i >= $start && $i < ( $start + $length ) ) {
					if ( ord(substr($string, $i, 1)) > 129 ) $tmpstr .= substr($string, $i, 2);
					else $tmpstr .= substr($string, $i, 1);
				}
				if ( ord(substr($string, $i, 1)) > 129 ) $i++;
			}
			if ( strlen($tmpstr) < $strlen ) $tmpstr .= $dot;
			
			return $tmpstr;
	}
}


/**
 * 构造函数
 * @author liujun
 * @param string $path 文件上传后要存放的路径,不存在时会自动创建
 * @param string $sub_path 自动生成以日期格式的子目录
 */
function setPath($path = NULL, $sub_path = 'Ym')
{
	if(!empty($path))
	{
		$path = trim($path, '/') . '/';
	}
	if(!empty($sub_path))
	{
		$path .= date($sub_path) . '/';
	}
	
	if(! is_dir($path))
	{
		mkdir($path, 0777, true);	// 如果路径不存在，自动创建
	} 
	//$this->path = $path;
}


/**
* 显示提示信息
*/
function alert($msg="", $url=""){
	echo '<script type="text/javascript">';
	echo 'alert("'.$msg.'");';
	
	if(!empty($url)){
		echo 'location.href = "'.$url.'"';
	}else{
		echo 'history.go(-1);';
	}
	
	echo '</script>';
	exit;
}


/**
 * @param $length 随记数长度
 * @param string $chars 随机字符串
 * @return string 返回生成的随机数
 */
function randoms($length, $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
	$hash = '';
	$max = strlen($chars) - 1;
	for($i = 0; $i < $length; $i++) {
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}
	

/**
* 图片宽高显示处理
*/
function getimages($fileimages){
	//if(file_exists($fileimages)){}
	//var_dump(file_exists($fileimages));
	
	//$apap = base_url("uploads/".$item["product_thumb"]);
	//getimages("$apap");
	
	$size = GetImageSize($fileimages);
	echo "<img src=\"$fileimages\" $size[3]>";
}

function maxmen($id_a,$abc){
	echo 'if('.$id_a. '==' .$abc.')';
}


//删除字符串里的所有空格
function trimall($str)
{
    $qian=array(" ","　","\t","\n","\r");$hou=array("","","","","");
    return str_replace($qian,$hou,$str);    
}

/**
* 判断星座
*/
function get_zodiac_sign($month, $day){
	// 检查参数有效性
	if ($month < 1 || $month > 12 || $day < 1 || $day > 31)
		return (false);
		// 星座名称以及开始日期
		$signs = array(
		array( "20" => "宝瓶座"),
		array( "19" => "双鱼座"),
		array( "21" => "白羊座"),
		array( "20" => "金牛座"),
		array( "21" => "双子座"),
		array( "22" => "巨蟹座"),
		array( "23" => "狮子座"),
		array( "23" => "处女座"),
		array( "23" => "天秤座"),
		array( "24" => "天蝎座"),
		array( "22" => "射手座"),
		array( "22" => "摩羯座")
	);
	list($sign_start, $sign_name) = each($signs[(int)$month-1]);
	if ($day < $sign_start)
	list($sign_start, $sign_name) = each($signs[($month -2 < 0) ? $month = 11: $month -= 2]);
	return $sign_name;
}


/**
 * 友好的时间显示
 *
 * @param int    $sTime 待显示的时间
 * @param string $type  类型. normal | mohu | full | ymd | other
 * @param string $alt   已失效
 * @return string
 */
function get_show_time($sTime,$type = 'normal',$alt = 'false') {
    if (!$sTime)
        return '';
    //sTime=源时间，cTime=当前时间，dTime=时间差
    $cTime      =   time();
    $dTime      =   $cTime - $sTime;
    $dDay       =   intval(date("z",$cTime)) - intval(date("z",$sTime));
    //$dDay     =   intval($dTime/3600/24);
    $dYear      =   intval(date("Y",$cTime)) - intval(date("Y",$sTime));
    //normal：n秒前，n分钟前，n小时前，日期
    if($type=='normal'){
        if( $dTime < 60 ){
            if($dTime < 10){
                return '刚刚';    //by yangjs
            }else{
                return intval(floor($dTime / 10) * 10)."秒前";
            }
        }elseif( $dTime < 3600 ){
            return intval($dTime/60)."分钟前";
        //今天的数据.年份相同.日期相同.
        }elseif( $dYear==0 && $dDay == 0  ){
            //return intval($dTime/3600)."小时前";
            return '今天'.date('H:i',$sTime);
        }elseif($dYear==0){
            return date("m月d日 H:i",$sTime);
        }else{
            return date("Y-m-d H:i",$sTime);
        }
    }elseif($type=='mohu'){
        if( $dTime < 60 ){
            return $dTime."秒前";
        }elseif( $dTime < 3600 ){
            return intval($dTime/60)."分钟前";
        }elseif( $dTime >= 3600 && $dDay == 0  ){
            return intval($dTime/3600)."小时前";
        }elseif( $dDay > 0 && $dDay<=7 ){
            return intval($dDay)."天前";
        }elseif( $dDay > 7 &&  $dDay <= 30 ){
            return intval($dDay/7) . '周前';
        }elseif( $dDay > 30 ){
            return intval($dDay/30) . '个月前';
        }
    //full: Y-m-d , H:i:s
    }elseif($type=='full'){
        return date("Y-m-d , H:i:s",$sTime);
    }elseif($type=='ymd'){
        return date("Y-m-d",$sTime);
    }else{
        if( $dTime < 60 ){
            return $dTime."秒前";
        }elseif( $dTime < 3600 ){
            return intval($dTime/60)."分钟前";
        }elseif( $dTime >= 3600 && $dDay == 0  ){
            return intval($dTime/3600)."小时前";
        }elseif($dYear==0){
            return date("Y-m-d H:i:s",$sTime);
        }else{
            return date("Y-m-d H:i:s",$sTime);
        }
    }
}



/**
* 这个是查询文件夹有多少文件
*/
function finddir($filename, &$dirnum, &$filenum){
    $open=opendir($filename);
    readdir($open);
    readdir($open);
    while($newfile=readdir($open)){
        //echo readdir($open);
        $new_dir=$filename."/".$newfile;
        if(is_dir($new_dir)){
            finddir($new_dir, $dirnum, $filenum);
            $dirnum++;    
        }else{
            $filenum++;
        }
    }
    closedir($open);
}

/**
* 用户是用什么浏览器
*/
function user_browser(){
	$agent = $_SERVER["HTTP_USER_AGENT"];
	if(strpos($agent,"MSIE 8.0"))
	return "IE8";
	else if(strpos($agent,"MSIE 7.0"))
	return "IE7";
	else if(strpos($agent,"MSIE 6.0"))
	return "IE6";
	else if(strpos($agent,"MSIE 9.0"))
	return "IE9";
	else if(strpos($agent,"MSIE 10.0"))
	return "IE10";
	else if(strpos($agent,"MSIE 11.0"))
	return "IE11";
	else if(strpos($agent,"Firefox/3"))
	return "Firefox3";
	else if(strpos($agent,"Firefox/2"))
	return "Firefox2";
	else if(strpos($agent,"Chrome"))
	return "Chrome";
	else if(strpos($agent,"Safari"))
	return "Safari";
	else if(strpos($agent,"Opera"))
	return "Opera";
}

/**
* 用户是用手机还是PC
*/
function user_client(){
	if (isset ($_SERVER['HTTP_USER_AGENT'])){
		$clientkeywords = array (
			'nokia',
			'sony',
			'ericsson',
			'mot',
			'samsung',
			'htc',
			'sgh',
			'lg',
			'sharp',
			'sie-',
			'philips',
			'panasonic',
			'alcatel',
			'lenovo',
			'iphone',
			'ipod',
			'blackberry',
			'meizu',
			'android',
			'netfront',
			'symbian',
			'ucweb',
			'windowsce',
			'palm',
			'operamini',
			'operamobi',
			'openwave',
			'nexusone',
			'cldc',
			'midp',
			'wap',
			'mobile'
		);
		// 从HTTP_USER_AGENT中查找手机浏览器的关键字
		if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) 
		{
		return "Mobile";
		}else{
		return "PC";
		}
	}
}


/**
* 根据大小来决定播放速度
*/
function interval($max){
	if($max <= 50){
		return 80;
	}elseif($max >= 51 && $max <= 100){
		return 50;
	}elseif($max >= 101 && $max <= 300){
		return 20;
	}elseif($max >= 301 && $max <= 500){
		return 10;
	}elseif($max >= 501){
		return 1;
	}
}


//可以让价格有逗号
function format_number($num,$cut) {
 return number_format($num,2,'.',$cut); 
}
//echo format_number(1234567.89,',');



