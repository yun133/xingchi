<?php
	function sendSms($to,$datas,$tempId='1'){
		// 初始化REST SDK
	     global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
	     //主帐号,对应开官网发者主账号下的 ACCOUNT SID
		$accountSid= '8aaf07085b3bb22e015b4229a2a4053c';
		//主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
		$accountToken= 'a5ec3e0b716e409f943cb92bc98139cd';
		//应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
		//在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
		$appId='8aaf07085b3bb22e015b4229a30b0540';
		//请求地址
		//沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
		//生产环境（用户应用上线使用）：app.cloopen.com
		$serverIP='app.cloopen.com';
		//请求端口，生产环境和沙盒环境一致
		$serverPort='8883';
		//REST版本号，在官网文档REST介绍中获得。
		$softVersion='2013-12-26';
		include_once("./Application/Common/Plugins/sms/CCPRestSmsSDK.php");
	     $rest = new REST($serverIP,$serverPort,$softVersion);
	     $rest->setAccount($accountSid,$accountToken);
	     $rest->setAppId($appId);	    
	     // 发送模板短信
	     // echo "Sending TemplateSMS to $to <br/>";
	     $result = $rest->sendTemplateSMS($to,$datas,$tempId);
	     if($result == NULL ) {
	         // echo "result error!";
	         // break;
	     	return false;
	     }
	     if($result->statusCode!=0) {
	         // echo "error code :" . $result->statusCode . "<br>";
	         // echo "error msg :" . $result->statusMsg . "<br>";
	         //TODO 添加错误处理逻辑
	     	return false;	     	
	     }else{
	         // echo "Sendind TemplateSMS success!<br/>";
	         // // 获取返回信息
	         // $smsmessage = $result->TemplateSMS;
	         // echo "dateCreated:".$smsmessage->dateCreated."<br/>";
	         // echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
	         // //TODO 添加成功处理逻辑
	     	return true;	     	
	     }
	}
	function sendMail($to,$title,$content){
		//发送邮件
	require_once('./Application/Common/Plugins/mail/class.phpmailer.php');
	$mail = new PHPMailer();
	//设置为要发邮件
	$mail->IsSMTP();
	//是否允许发送HTML代码做为邮件的内容
	$mail->IsHTML(TRUE);
	$mail->CharSet='UTF-8';
	//是否需要身份验证
	$mail->SMTPAuth=TRUE;
	/*  发送邮件的中转服务器账号信息 */
	$mail->From="getsdk131@163.com"; //发送方账号
	$mail->FromName="系统";       //发送方名称
	$mail->Host="smtp.163.com";  //发送方中转邮件服务器地址
	$mail->Username="getsdk131";     //账号名称
	$mail->Password="getsdk131yun";   //账号密码

	// 发邮件smtp协议端口号，默认25
	$mail->Port = 25;
	// 收件人，显示名称(可以多次设置，表示多人同时收取邮件)
	// $mail->AddAddress('php621@163.com','小Kimi');
	$mail->AddAddress($to);

	//发送附件
	// $mail->AddAttachment('./ff/timg2.jpg');
	// $mail->AddAttachment('./ff/timg3.jpg');

	// 邮件标题
	$mail->Subject=$title;
	// 邮件内容
	$mail->Body=$content;
	return $mail->send();
	}
?>