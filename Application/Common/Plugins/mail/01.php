<?php
//发送邮件
require_once('./class.phpmailer.php');
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
$mail->FromName="林志颖";       //发送方名称
$mail->Host="smtp.163.com";  //发送方中转邮件服务器地址
$mail->Username="getsdk131";     //账号名称
$mail->Password="getsdk131yun";   //账号密码

// 发邮件smtp协议端口号，默认25
$mail->Port = 25;

// 收件人，显示名称(可以多次设置，表示多人同时收取邮件)
// $mail->AddAddress('php621@163.com','小Kimi');
$mail->AddAddress('getsdk131@163.com','杨洋');

//发送附件
$mail->AddAttachment('./ff/timg2.jpg');
$mail->AddAttachment('./ff/timg3.jpg');

// 邮件标题
$mail->Subject='今天天气真好啊';
// 邮件内容
$mail->Body='是啊,下周如果还这样好<a href="http://www.tianqi.com">天气</a>，我们去爬山吧';
var_dump($mail->send());
