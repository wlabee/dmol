<?php
/*{{{LICENSE
+-----------------------------------------------------------------------+
| SlightPHP Framework                                                   |
+-----------------------------------------------------------------------+
| This program is free software; you can redistribute it and/or modify  |
| it under the terms of the GNU General Public License as published by  |
| the Free Software Foundation. You should have received a copy of the  |
| GNU General Public License along with this program.  If not, see      |
| http://www.gnu.org/licenses/.                                         |
| Copyright (C) 2008-2009. All Rights Reserved.                         |
+-----------------------------------------------------------------------+
| Supports: http://www.slightphp.com                                    |
+-----------------------------------------------------------------------+
}}}*/

require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."mail/class.phpmailer.php");
/**
 * @package SlightPHP
 */
class SMail extends PHPMailer{
	public function __construct() {
	}
	
	/**
	 * 发送邮件
	 */
	public function sendMail($frommail,$fromName, $tomail, $subject, $body) {
		$mail = new SMail();
		$mail->IsSMTP();	   // 经smtp发送  
		$mail->Host = "smtp.163.com";	 // SMTP 服务器  
		$mail->SMTPAuth = true;	  // 打开SMTP 认证  
		$mail->Username = "baiyushengying@163.com"; // 用户名  
		$mail->Password = "*********";	// 密码  
		$mail->CharSet = 'UTF-8';
		$mail->Encoding = 'base64';
		$mail->From = $frommail;	  // 发信人  
		$mail->FromName = $fromName;  // 发信人别名  
		$mail->AddAddress($tomail);	 // 收信人  
		$mail->WordWrap = 50;
		$mail->IsHTML(true);	   // 以html方式发送  
		$mail->Subject = $subject;	 // 邮件标题  
		$mail->Body = $body;	 // 邮件内空  
		$mail->AltBody = "请使用HTML方式查看邮件。";
		if (!$mail->Send()) {
			return $mail->ErrorInfo;
		} else {
			return true;
		}
	}
}
?>