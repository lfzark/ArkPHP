<?php
/**
 * ArkPHP [Fast And Simple]
 * ==============================================
 * Copyright (c) 2014-2020 http://www.arkphp.com All rights reserved.
 * -------------------------------------------------------------------
 * Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
 * ==============================================
 * @date: 2014-9-12
 * @author: Ark <lfzlfz@126.com>
 * @version: 0.1.0
 */
class email_plugin extends Plugin {
	
	function send_email($content,$subject,$to,$from,$host,$user="",$pass="",$port = 25) {

// 		$host = "mail.arkphp.com";
// 		//$port = 25;
// 		$user = "";
// 		$pass = "";
		
// 		$from = "admin@arkphp.com";
// 		$to = "z@arkphp.com";
// 		$subject = "Hello World";
// 		$content = "Hello World,This is a mail powered by socket";
		
		
		$mail = new stmp_mail($host,$port,$user,$pass);
		$mail->sendMail($from,$to,$subject,$content);
		
	}
	

	
}



class stmp_mail{
	private $host;//stmp服务器
	private $port = 25;//端口号
	private $user;//登陆服务器的用户名和密码
	private $pass;
	private $debug = false;//调试模式
	private $sock;  //连接stmp服务器的句柄
	private $mail_format = 0;//邮件发送格式;0:普通邮件 1:html格式的邮件
	
	function stmp_mail($host,$port,$user,$pass,$format = 1,$debug = 0){
		
		$this->host = $host;
		$this->port = $port;
		$this->user = base64_encode($user);
		$this->pass = base64_encode($pass);
		$this->mail_format = $format;
		$this->debug = $debug;
		
		$this->sock = fsockopen($this->host,$this->port,$errno,$errstr,10);//fsockopen函数连接smtp服务器
		if(!$this->sock){
			exit("错误码 : $errno,错误信息 : $errstr\n");
		}
		
		$response = fgets($this->sock);//fgets获取服务器信息
		if(strstr($response, "220") == false){
			exit("服务器错误 : $response\n");
		}
	}
	
	private function show_debug($messgae){
		
		if($this->debug){
			echo "<p>Dubug : $messgae</p>\n";
		}
	}
	
	private function do_command($cmd,$return_code){
		fwrite($this->sock, $cmd);
		
		$response = fgets($this->sock);
		echo $cmd.$response;
		if(strstr($response, "$return_code") == false){
			$this->show_debug($response);
			return false;
		}
		
		return true;
	}
	
	//邮件格式校验
	private function is_mail($email){
		
		$pattern = "/^[^_][\w]*@[\w.]+[\w]*[^_]$/";
		if(preg_match($pattern, $email,$matches)){
			return true;
		}
		
		return false;
	}
	
	//发送邮件
	public function sendMail($from,$to,$subject,$body){
		
		if(!$this->is_mail($from) || !$this->is_mail($to)){
			$this->show_debug("请输入正确的邮件格式");
			return false;
		}
		
		if(empty($subject) || empty($body)){
			$this->show_debug("请填写邮件主题或内容");
			return false;
		}
		
		$detail = "FROM:<".$from.">\r\n";
		$detail .= "TO:<".$to.">\r\n";
		$detail .= "Subject:".$subject."\r\n";
		
		if($this->mail_format == 1){
			$detail .= "Content-Type: text/html;\r\n";
		}
		
		$detail .= "Content-Type: text/plain;\r\n";
		
		$detail = $detail .$body;
		
		$this->do_command("HELO mail.arkphp.com\r\n",250);
		
		//$this->do_command("AUTH LOGIN\r\n",334);
		//$this->do_command($this->user."\r\n",334);
		//$this->do_command($this->pass."\r\n",235);
		$this->do_command("MAIL FROM:<".$from.">\r\n",250);
		$this->do_command("RCPT TO:<".$to.">\r\n",250);
		$this->do_command("DATA\r\n",354);
		$this->do_command($detail."\r\n.\r\n",250);
		$this->do_command("QUIT\r\n",221);
		
		return true;
	}
}
