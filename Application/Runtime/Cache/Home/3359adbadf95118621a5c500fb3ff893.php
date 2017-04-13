<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>登录商城</title>
    <link rel="stylesheet" href="<?php echo C('HOME_CSS_PATH');?>base.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('HOME_CSS_PATH');?>global.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('HOME_CSS_PATH');?>header.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('HOME_CSS_PATH');?>login.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('HOME_CSS_PATH');?>footer.css" type="text/css">
    <script type="text/javascript" src="<?php echo C('HOME_JS_PATH');?>jquery-1.8.3.min.js"></script>
</head>
<body>
    <!-- 顶部导航 start -->
    <div class="topnav">
        <div class="topnav_bd w990 bc">
            <div class="topnav_left">
                
            </div>
            <div class="topnav_right fr">
                
<?php if(!empty($_SESSION['user_name'])): ?><ul>
    <li>您好，<span style="font-size:20px; color:blue;">【<?php echo (session('user_name')); ?>】</span>欢迎来到京西！ [<a href="<?php echo U('User/logout');?>">退出系统</a>] </li>
    <li class="line">|</li>
    <li>我的订单</li>
    <li class="line">|</li>
    <li>客户服务</li>
</ul>
<?php else: ?>
<ul>
    <li>您好，欢迎来到京西！[<a href="<?php echo U('User/login');?>">登录</a>] [<a href="<?php echo U('User/register');?>">免费注册</a>] </li>
    <li class="line">|</li>
    <li>我的订单</li>
    <li class="line">|</li>
    <li>客户服务</li>
</ul><?php endif; ?>

            </div>
        </div>
    </div>
    <!-- 顶部导航 end -->
    
    <div style="clear:both;"></div>

    <!-- 页面头部 start -->
    <div class="header w990 bc mt15">
        <div class="logo w990">
            <h2 class="fl"><a href="index.html"><img src="<?php echo C('HOME_IMAGE_PATH');?>logo.png" alt="京西商城"></a></h2>
            <!-- 控制器为Shop情况,就显示下边的div -->
            <?php if((CONTROLLER_NAME) == "Shop"): ?><div class="flow fr <?php echo (ACTION_NAME); ?>">
                <!-- 把当前操作方法名称设置为class类 -->
                    <ul>
                        <li <?php if((ACTION_NAME) == "flow1"): ?>class="cur"<?php endif; ?>>1.我的购物车</li>
                        <li <?php if((ACTION_NAME) == "flow2"): ?>class="cur"<?php endif; ?>>2.请填写核对订单信息</li>
                        <li <?php if((ACTION_NAME) == "flow3"): ?>class="cur"<?php endif; ?>>3.成功提交订单</li>
                    </ul>
                </div><?php endif; ?>
        </div>
    </div>
    <!-- 页面头部 end -->

<!-- 这里写{__ NOLAYOUT __}或者控制器中使用layout(false) -->


<!-- 登录主体部分start -->
<div class="login w990 bc mt10 regist">
	<div class="login_hd">
		<h2>用户注册</h2>
		<b></b>
	</div>
	<div class="login_bd">
		<div class="login_form fl">
			<form action="" method="post">
				<ul>
					<li>
						<label for="">用户名：</label>
						<input type="text" class="txt" name="username" />
						<p>3-20位字符，可由中文、字母、数字和下划线组成</p>
					</li>
					<li>
						<label for="">密码：</label>
						<input type="password" class="txt" name="password" />
						<p>6-20位字符，可使用字母、数字和符号的组合，不建议使用纯数字、纯字母、纯符号</p>
					</li>
					<li>
						<label for="">确认密码：</label>
						<input type="password" class="txt" name="password" />
						<p> <span>请再次输入密码</p>
					</li>
					<li>
						<label for="">邮箱：</label>
						<input type="text" class="txt" name="user_email" />
					</li>
					<li class="checkcode"><label for="">手机号码：</label>
						<input type="text"  name="user_tel" />
						<span><input type="button" value="免费获取验证码" onclick="send()" style="height: 30px;"></span><span id="sendresult"></span>
					</li>
					<li class="checkcode">
						<label for="">验证码：</label>
						<input type="text"  name="checkcode" />
						<!-- <img src="<?php echo C('HOME_IMAGE_PATH');?>checkcode1.jpg" alt="" /> -->
						<!-- <span>看不清？<a href="">换一张</a></span> -->
						<span style="color: red"><?php echo ((isset($infoerror) && ($infoerror !== ""))?($infoerror):''); ?></span>
					</li>
					<li>
						<label for="">&nbsp;</label>
						<input type="checkbox" class="chb" checked="checked" /> 我已阅读并同意《用户注册协议》
					</li>
					<li>
						<label for="">&nbsp;</label>
						<input type="submit" value="" class="login_btn" />
					</li>
				</ul>
			</form>
<script type="text/javascript">
	function send(){
		var tel=$('[name=user_tel]').val();
		alert(tel);
		$.ajax({
			url:'/index.php/Home/User/sendCont',
			data:{'tel':tel},	
			dataType:'json',
			success:function(msg){
				console.log(msg);
				if (msg.status==100) {
					$('#sendresult').html('短信发送成功...');
				} else {
					$('#sendresult').html('短信发送失败!');
				}
			}
		});
	}
</script>
			
		</div>
		
		<div class="mobile fl">
			<h3>手机快速注册</h3>			
			<p>中国大陆手机用户，编辑短信 “<strong>XX</strong>”发送到：</p>
			<p><strong>1069099988</strong></p>
		</div>

	</div>
</div>
<!-- 登录主体部分end -->

<div style="clear:both;"></div>


    <!-- 底部版权 start -->
    <div class="footer w1210 bc mt15">
        <p class="links">
            <a href="">关于我们</a> |
            <a href="">联系我们</a> |
            <a href="">人才招聘</a> |
            <a href="">商家入驻</a> |
            <a href="">千寻网</a> |
            <a href="">奢侈品网</a> |
            <a href="">广告服务</a> |
            <a href="">移动终端</a> |
            <a href="">友情链接</a> |
            <a href="">销售联盟</a> |
            <a href="">京西论坛</a>
        </p>
        <p class="copyright">
             © 2005-2013 京东网上商城 版权所有，并保留所有权利。  ICP备案证书号:京ICP证070359号 
        </p>
        <p class="auth">
            <a href=""><img src="<?php echo C('HOME_IMAGE_PATH');?>xin.png" alt="" /></a>
            <a href=""><img src="<?php echo C('HOME_IMAGE_PATH');?>kexin.jpg" alt="" /></a>
            <a href=""><img src="<?php echo C('HOME_IMAGE_PATH');?>police.jpg" alt="" /></a>
            <a href=""><img src="<?php echo C('HOME_IMAGE_PATH');?>beian.gif" alt="" /></a>
        </p>
    </div>
    <!-- 底部版权 end -->

</body>
</html>