<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class IP{

	/**
	 *
	 * 根据IP返回地区信息
	 * @param String $ip
	 * @return Array array(国家，省，市)
	 */
	public function ip_to_district($ip){
		//sina API
		$district = $this->_get_sina_ip_to_area($ip);
		if($district)
		return $district;
		//cz API
		$dstr = $this->_get_cz_ip_to_area($ip);
		$dstr = explode(' ', $dstr);
		$dstr = $dstr[0];
		$pos = intval(mb_strpos($dstr, '国'));
		$gj = mb_substr($dstr, 0, $pos);
		if(empty($gj))
		$gj = '中国';
		$pos2 = intval(mb_strpos($dstr, '省'));
		if(!empty($pos))
		$pos =  $pos+mb_strlen('国');
		$len = 0;
		if(!empty($pos2))
		$len = $pos2-$pos;
		$sf = mb_substr($dstr,$pos, $len);
		if(!empty($pos2))
		$pos2 = $pos2+mb_strlen('省');
		$pos = intval(mb_strpos($dstr, '市'));
		$len = 0;
		if(!empty($pos))
		$len = $pos-$pos2;
		$cs = mb_substr($dstr, $pos2, $len);
		return array($gj, $sf, $cs);
	}

	/**
	 *
	 * 获取新浪接口
	 * @param String $ip
	 */
	private function _get_sina_ip_to_area($ip){
		$url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip=".$ip;
		$ip = file_get_contents($url);
		if(preg_match_all("/[".chr(0xa1)."-".chr(0xff)."]+/",$ip,$match)){
			if(!empty($match)){
				return array(
				mb_convert_encoding($match[0][0], 'UTF-8', 'GBK'),
				mb_convert_encoding($match[0][1], 'UTF-8', 'GBK'),
				mb_convert_encoding($match[0][2], 'UTF-8', 'GBK')
				);
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}

	/**
	 * 获取纯真IP库
	 * @param String $ip
	 */
	private function _get_cz_ip_to_area($ip){

		if(!$fd = @fopen(dirname(__FILE__).'/wry.dat', 'rb')) {
			return FALSE;
		}

		$ip = explode('.', $ip);
		$ipNum = $ip[0] * 16777216 + $ip[1] * 65536 + $ip[2] * 256 + $ip[3];

		if(!($DataBegin = fread($fd, 4)) || !($DataEnd = fread($fd, 4)) ) return;
		@$ipbegin = implode('', unpack('L', $DataBegin));
		if($ipbegin < 0) $ipbegin += pow(2, 32);
		@$ipend = implode('', unpack('L', $DataEnd));
		if($ipend < 0) $ipend += pow(2, 32);
		$ipAllNum = ($ipend - $ipbegin) / 7 + 1;

		$BeginNum = $ip2num = $ip1num = 0;
		$ipAddr1 = $ipAddr2 = '';
		$EndNum = $ipAllNum;

		while($ip1num > $ipNum || $ip2num < $ipNum) {
			$Middle= intval(($EndNum + $BeginNum) / 2);

			fseek($fd, $ipbegin + 7 * $Middle);
			$ipData1 = fread($fd, 4);
			if(strlen($ipData1) < 4) {
				fclose($fd);
				return 'System Error';
			}
			$ip1num = implode('', unpack('L', $ipData1));
			if($ip1num < 0) $ip1num += pow(2, 32);

			if($ip1num > $ipNum) {
				$EndNum = $Middle;
				continue;
			}

			$DataSeek = fread($fd, 3);
			if(strlen($DataSeek) < 3) {
				fclose($fd);
				return 'System Error';
			}
			$DataSeek = implode('', unpack('L', $DataSeek.chr(0)));
			fseek($fd, $DataSeek);
			$ipData2 = fread($fd, 4);
			if(strlen($ipData2) < 4) {
				fclose($fd);
				return 'System Error';
			}
			$ip2num = implode('', unpack('L', $ipData2));
			if($ip2num < 0) $ip2num += pow(2, 32);

			if($ip2num < $ipNum) {
				if($Middle == $BeginNum) {
					fclose($fd);
					return 'Unknown';
				}
				$BeginNum = $Middle;
			}
		}

		$ipFlag = fread($fd, 1);
		if($ipFlag == chr(1)) {
			$ipSeek = fread($fd, 3);
			if(strlen($ipSeek) < 3) {
				fclose($fd);
				return 'System Error';
			}
			$ipSeek = implode('', unpack('L', $ipSeek.chr(0)));
			fseek($fd, $ipSeek);
			$ipFlag = fread($fd, 1);
		}

		if($ipFlag == chr(2)) {
			$AddrSeek = fread($fd, 3);
			if(strlen($AddrSeek) < 3) {
				fclose($fd);
				return 'System Error';
			}
			$ipFlag = fread($fd, 1);
			if($ipFlag == chr(2)) {
				$AddrSeek2 = fread($fd, 3);
				if(strlen($AddrSeek2) < 3) {
					fclose($fd);
					return 'System Error';
				}
				$AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));
				fseek($fd, $AddrSeek2);
			} else {
				fseek($fd, -1, SEEK_CUR);
			}

			while(($char = fread($fd, 1)) != chr(0))
			$ipAddr2 .= $char;

			$AddrSeek = implode('', unpack('L', $AddrSeek.chr(0)));
			fseek($fd, $AddrSeek);

			while(($char = fread($fd, 1)) != chr(0))
			$ipAddr1 .= $char;
		} else {
			fseek($fd, -1, SEEK_CUR);
			while(($char = fread($fd, 1)) != chr(0))
			$ipAddr1 .= $char;

			$ipFlag = fread($fd, 1);
			if($ipFlag == chr(2)) {
				$AddrSeek2 = fread($fd, 3);
				if(strlen($AddrSeek2) < 3) {
					fclose($fd);
					return 'System Error';
				}
				$AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));
				fseek($fd, $AddrSeek2);
			} else {
				fseek($fd, -1, SEEK_CUR);
			}
			while(($char = fread($fd, 1)) != chr(0))
			$ipAddr2 .= $char;
		}
		fclose($fd);

		if(preg_match('/http/i', $ipAddr2)) {
			$ipAddr2 = '';
		}
		$ipaddr = "$ipAddr1 $ipAddr2";
		$ipaddr = preg_replace('/CZ88\.NET/is', '', $ipaddr);
		$ipaddr = preg_replace('/^\s*/is', '', $ipaddr);
		$ipaddr = preg_replace('/\s*$/is', '', $ipaddr);
		if(preg_match('/http/i', $ipaddr) || $ipaddr == '') {
			$ipaddr = 'Unknown';
		}

		return mb_convert_encoding($ipaddr, 'utf-8', 'gbk');
	}
    /**
	  获取客户端IP
	*/
	function get_ip(){
		if (getenv('HTTP_CLIENT_IP')){
			$ip = getenv('HTTP_CLIENT_IP');
		}elseif (getenv('HTTP_X_FORWARDED_FOR')){
			$ips = explode (", ", getenv('HTTP_X_FORWARDED_FOR'));
			if ($ip)
			{
				array_unshift($ips, $ip); $ip = false;
			}
			for ($i = 0; $i < count($ips); $i++)
			{
				if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i]))
				{
					$ip = $ips[$i];
					break;
				}
			}
		}elseif (getenv('HTTP_X_FORWARDED')){
			$ip = getenv('HTTP_X_FORWARDED');
		}elseif (getenv('HTTP_FORWARDED_FOR')){
			$ip = getenv('HTTP_FORWARDED_FOR');
		}elseif (getenv('HTTP_FORWARDED')){
			$ip = getenv('HTTP_FORWARDED');
		}else{
			$ip = $_SERVER['REMOTE_ADDR'];
		}

		return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
	}
}


