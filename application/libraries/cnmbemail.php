<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cnmbemail {

	public function send_email($mai_jsr,$mai_content){
		
		require_once('class.phpmailer.php');
		$mail = new PHPMailer();											//实例化
		$mail->IsSMTP();													//启用SMTP
		$mail->Host = "smtp.qq.com";										//SMTP服务器 以163邮箱为例子
		$mail->Port = 25;													//邮件发送端口
		$mail->SMTPAuth   = true;											//启用SMTP认证
		$mail->CharSet  = "UTF-8";											//字符集
		$mail->Encoding = "base64";											//编码方式
		$mail->Username = "83730862@qq.com";								//你的邮箱
		$mail->Password = "chenkai7878";									//你的密码
		$mail->Subject = "你好";												//邮件标题
		$mail->From = "83730862@qq.com";									//发件人地址（也就是你的邮箱）
		$mail->FromName = "网络科技";											//发件人姓名
		$address = $mai_jsr;												//收件人email
		$mail->AddAddress($address, "亲");									//添加收件人（地址，昵称）
		//$mail->AddAttachment('xx.xls','我的附件.xls');						//添加附件,并指定名称
		$mail->IsHTML(true); 												//支持html格式内容
		//$mail->AddEmbeddedImage("logo.jpg", "my-attach", "logo.jpg"); 	//设置邮件中的图片
		$mail->Body = $mai_content;											//邮件主体内容<img alt="helloweba" src="cid:my-attach">
		
		
		//发送
		if(!$mail->Send()) {
			echo "发送失败: " . $mail->ErrorInfo;
		}
		
		//echo "hello word";
		
		/*	
		在php.ini中去掉下面的两个分号
		;extension=php_sockets.dll
		;extension=php_openssl.dll
		*/
		
	}

}
