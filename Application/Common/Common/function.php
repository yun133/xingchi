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
?>