<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- page-sidebar nav-collapse collapse -->
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>Metronic | Data Tables - Editable Tables</title>

	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->

	<link href="<?php echo C('ADMIN_CSS_PATH');?>bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo C('ADMIN_CSS_PATH');?>bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo C('ADMIN_CSS_PATH');?>font-awesome.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo C('ADMIN_CSS_PATH');?>style-metro.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo C('ADMIN_CSS_PATH');?>style.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo C('ADMIN_CSS_PATH');?>style-responsive.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo C('ADMIN_CSS_PATH');?>default.css" rel="stylesheet" type="text/css" id="style_color"/>

	<link href="<?php echo C('ADMIN_CSS_PATH');?>uniform.default.css" rel="stylesheet" type="text/css"/>

	<!-- END GLOBAL MANDATORY STYLES -->	



<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed">

	<!-- BEGIN HEADER -->

	<div class="header navbar navbar-inverse navbar-fixed-top">

		<!-- BEGIN TOP NAVIGATION BAR -->

		<div class="navbar-inner">

			<div class="container-fluid">

				<!-- BEGIN LOGO -->

				<a class="brand" href="index.html">

				<img src="<?php echo C('ADMIN_IMAGE_PATH');?>logo.png" alt="logo" />

				</a>

				<!-- END LOGO -->

				<!-- BEGIN RESPONSIVE MENU TOGGLER -->

				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

				<img src="<?php echo C('ADMIN_IMAGE_PATH');?>menu-toggler.png" alt="" />

				</a>          

				<!-- END RESPONSIVE MENU TOGGLER -->            

				<!-- BEGIN TOP NAVIGATION MENU -->              

				<ul class="nav pull-right">

					<!-- BEGIN NOTIFICATION DROPDOWN -->   

					<li class="dropdown" id="header_notification_bar">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<i class="icon-warning-sign"></i>

						<span class="badge">6</span>

						</a>

						<ul class="dropdown-menu extended notification">

							<li>

								<p>You have 14 new notifications</p>

							</li>

							<li>

								<a href="#">

								<span class="label label-success"><i class="icon-plus"></i></span>

								New user registered. 

								<span class="time">Just now</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-important"><i class="icon-bolt"></i></span>

								Server #12 overloaded. 

								<span class="time">15 mins</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-warning"><i class="icon-bell"></i></span>

								Server #2 not respoding.

								<span class="time">22 mins</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-info"><i class="icon-bullhorn"></i></span>

								Application error.

								<span class="time">40 mins</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-important"><i class="icon-bolt"></i></span>

								Database overloaded 68%. 

								<span class="time">2 hrs</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-important"><i class="icon-bolt"></i></span>

								2 user IP blocked.

								<span class="time">5 hrs</span>

								</a>

							</li>

							<li class="external">

								<a href="#">See all notifications <i class="m-icon-swapright"></i></a>

							</li>

						</ul>

					</li>

					<!-- END NOTIFICATION DROPDOWN -->

					<!-- BEGIN INBOX DROPDOWN -->

					<li class="dropdown" id="header_inbox_bar">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<i class="icon-envelope"></i>

						<span class="badge">5</span>

						</a>

						<ul class="dropdown-menu extended inbox">

							<li>

								<p>You have 12 new messages</p>

							</li>

							<li>

								<a href="inbox.html?a=view">

								<span class="photo"><img src="<?php echo C('ADMIN_IMAGE_PATH');?>avatar2.jpg" alt="" /></span>

								<span class="subject">

								<span class="from">Lisa Wong</span>

								<span class="time">Just Now</span>

								</span>

								<span class="message">

								Vivamus sed auctor nibh congue nibh. auctor nibh

								auctor nibh...

								</span>  

								</a>

							</li>

							<li>

								<a href="inbox.html?a=view">

								<span class="photo"><img src="<?php echo C('ADMIN_IMAGE_PATH');?>avatar3.jpg" alt="" /></span>

								<span class="subject">

								<span class="from">Richard Doe</span>

								<span class="time">16 mins</span>

								</span>

								<span class="message">

								Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh

								auctor nibh...

								</span>  

								</a>

							</li>

							<li>

								<a href="inbox.html?a=view">

								<span class="photo"><img src="<?php echo C('ADMIN_IMAGE_PATH');?>avatar1.jpg" alt="" /></span>

								<span class="subject">

								<span class="from">Bob Nilson</span>

								<span class="time">2 hrs</span>

								</span>

								<span class="message">

								Vivamus sed nibh auctor nibh congue nibh. auctor nibh

								auctor nibh...

								</span>  

								</a>

							</li>

							<li class="external">

								<a href="inbox.html">See all messages <i class="m-icon-swapright"></i></a>

							</li>

						</ul>

					</li>

					<!-- END INBOX DROPDOWN -->

					<!-- BEGIN TODO DROPDOWN -->

					<li class="dropdown" id="header_task_bar">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<i class="icon-tasks"></i>

						<span class="badge">5</span>

						</a>

						<ul class="dropdown-menu extended tasks">

							<li>

								<p>You have 12 pending tasks</p>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">New release v1.2</span>

								<span class="percent">30%</span>

								</span>

								<span class="progress progress-success ">

								<span style="width: 30%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">Application deployment</span>

								<span class="percent">65%</span>

								</span>

								<span class="progress progress-danger progress-striped active">

								<span style="width: 65%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">Mobile app release</span>

								<span class="percent">98%</span>

								</span>

								<span class="progress progress-success">

								<span style="width: 98%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">Database migration</span>

								<span class="percent">10%</span>

								</span>

								<span class="progress progress-warning progress-striped">

								<span style="width: 10%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">Web server upgrade</span>

								<span class="percent">58%</span>

								</span>

								<span class="progress progress-info">

								<span style="width: 58%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">Mobile development</span>

								<span class="percent">85%</span>

								</span>

								<span class="progress progress-success">

								<span style="width: 85%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li class="external">

								<a href="#">See all tasks <i class="m-icon-swapright"></i></a>

							</li>

						</ul>

					</li>

					<!-- END TODO DROPDOWN -->

					<!-- BEGIN USER LOGIN DROPDOWN -->

					<li class="dropdown user">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<img alt="" src="<?php echo (session('admin_logo')); ?>" style="height: 29px;width: 29px" />

						<span class="username"><?php echo (session('admin_name')); ?></span>

						<i class="icon-angle-down"></i>

						</a>

						<ul class="dropdown-menu">

							<li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li>

							<li><a href="<?php echo U('Admin/Admin/logout');?>"><i class="icon-key"></i> Log Out</a></li>

						</ul>

					</li>

					<!-- END USER LOGIN DROPDOWN -->

				</ul>

				<!-- END TOP NAVIGATION MENU --> 

			</div>

		</div>

		<!-- END TOP NAVIGATION BAR -->

	</div>

	<!-- END HEADER -->

	<!-- BEGIN CONTAINER -->

	<div class="page-container row-fluid">

		<!-- BEGIN SIDEBAR -->

		<div class="page-sidebar nav-collapse collapse">

			<!-- BEGIN SIDEBAR MENU -->        

			<ul class="page-sidebar-menu">

				<li>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

					<div class="sidebar-toggler hidden-phone"></div>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

				</li>

				<li>

					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->

					<form class="sidebar-search">

						<div class="input-box">

							<a href="javascript:;" class="remove"></a>

							<input type="text" placeholder="Search..." />

							<input type="button" class="submit" value=" " />

						</div>

					</form>

					<!-- END RESPONSIVE QUICK SEARCH FORM -->

				</li>

				<li class="start <?php if(CONTROLLER_NAME=='Index'){echo 'active';} ?>">

					<a href="<?php echo U('Admin/Index/index');?>">

					<i class="icon-home"></i> 

					<span class="title">首页</span>
					<span class="selected"></span>		

					</a>
				</li>
				<?php if(is_array($menu)): foreach($menu as $key=>$v): ?><li class="<?php if($v['pri_name']==$sel_name){echo 'active';} ?>">					
					<a href="javascript:;">
					<i class="icon-cogs"></i> 
					<span class="title"><?php echo ($v["pri_name"]); ?></span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<?php if(is_array($v["children"])): foreach($v["children"] as $key=>$v1): ?><li class="<?php if(ACTION_NAME==$v1['action_name']){echo 'active';} ?>">
							<a href="<?php echo U($v1['module_name'].'/'.$v1['controller_name'].'/'.$v1['action_name']);?>"><?php echo ($v1["pri_name"]); ?></a>
						</li><?php endforeach; endif; ?>		
					</ul>
				</li><?php endforeach; endif; ?>			
			</ul>

			<!-- END SIDEBAR MENU -->

		</div>

		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->  

		<div class="page-content">

			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<div id="portlet-config" class="modal hide">

				<div class="modal-header">

					<button data-dismiss="modal" class="close" type="button"></button>

					<h3>portlet Settings</h3>

				</div>

				<div class="modal-body">

					<p>Here will be a configuration form</p>

				</div>

			</div>

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<!-- BEGIN PAGE CONTAINER-->

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->   

				<div class="row-fluid">

					<div class="span12">

						<!-- BEGIN STYLE CUSTOMIZER -->

						<div class="color-panel hidden-phone">

							<div class="color-mode-icons icon-color"></div>

							<div class="color-mode-icons icon-color-close"></div>

							<div class="color-mode">

								<p>THEME COLOR</p>

								<ul class="inline">

									<li class="color-black current color-default" data-style="default"></li>

									<li class="color-blue" data-style="blue"></li>

									<li class="color-brown" data-style="brown"></li>

									<li class="color-purple" data-style="purple"></li>

									<li class="color-grey" data-style="grey"></li>

									<li class="color-white color-light" data-style="light"></li>

								</ul>

								<label>

									<span>Layout</span>

									<select class="layout-option m-wrap small">

										<option value="fluid" selected>Fluid</option>

										<option value="boxed">Boxed</option>

									</select>

								</label>

								<label>

									<span>Header</span>

									<select class="header-option m-wrap small">

										<option value="fixed" selected>Fixed</option>

										<option value="default">Default</option>

									</select>

								</label>

								<label>

									<span>Sidebar</span>

									<select class="sidebar-option m-wrap small">

										<option value="fixed">Fixed</option>

										<option value="default" selected>Default</option>

									</select>

								</label>

								<label>

									<span>Footer</span>

									<select class="footer-option m-wrap small">

										<option value="fixed">Fixed</option>

										<option value="default" selected>Default</option>

									</select>

								</label>

							</div>

						</div>

						<!-- END BEGIN STYLE CUSTOMIZER -->     

						<h3 class="page-title">

							<?php echo ($titles["name"]); ?>

						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="#"><?php echo ($titles["name"]); ?></a> 

								<span class="icon-angle-right"></span>

							</li>

							<li>

								<a href="#"><?php echo ($titles["sub"]); ?></a>

							</li>

						</ul>

					</div>

				</div>

				<!-- END PAGE HEADER-->
					
	<!-- 引入提取的公共头部和左侧部分 -->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN VALIDATION STATES-->
						<div class="portlet box purple">

							<div class="portlet-title">

								<div class="caption"><i class="icon-reorder"></i>Basic Validation</div>

								<div class="tools">

									<a href="javascript:;" class="collapse"></a>

									<a href="#portlet-config" data-toggle="modal" class="config"></a>

									<a href="javascript:;" class="reload"></a>

									<a href="javascript:;" class="remove"></a>

								</div>

							</div>

							<div class="portlet-body form">
								<!-- BEGIN FORM-->
								<form action="" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="alert alert-error hide">
										<button class="close" data-dismiss="alert"></button>

										您的表单尚有未填项或者非法数据，请仔细检查后再进行提交！
									</div>
									<div class="alert alert-success hide">
										<button class="close" data-dismiss="alert"></button>
										您的表单验证成功!
									</div>
									<div class="control-group">
										<label class="control-label">商品分类<span class="required">*</span></label>
										<div class="controls">											
											<select class="span6 m-wrap" name="cat_id" >
											<option value="">请选择分类</option>
											<?php if(is_array($data)): foreach($data as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if($v['id'] == $info['cat_id']): ?>selected='selected'<?php endif; ?>><?php echo str_repeat('-',$v['level']*8); echo ($v["cat_name"]); ?></option><?php endforeach; endif; ?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">商品名称<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="goods_name" data-required="1" class="span6 m-wrap" value="<?php echo ($info["goods_name"]); ?>" />
											<input type="hidden" id="g_id" name="id" value="<?php echo ($info["id"]); ?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">商品价格<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="goods_price" data-required="1" class="span6 m-wrap" value="<?php echo ($info["goods_price"]); ?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">商品图片<span class="required">*</span></label>
										<div class="controls">
											<button type="button" class="btn green" onclick="getUpload()">点击更换logo</button><span id="getText">未上传</span>
											<input type="file" name="goods_logo" style="display: none" id="logoFile"/><img src="<?php echo ($info["logo"]); ?>" style="height: 100px;" title="没有图片"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">商品简介<span class="required">*</span></label>
										<div class="controls" style="width:600px;">
											<textarea name="goods_desc" id="goods_desc" style="height:300px;"><?php echo ($info["goods_desc"]); ?></textarea>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">商品相册<span class="required">*</span></label>
										<div class="controls" >
											<button type="button" class="btn green" onclick="getUploads()">点击更换相册图片</button>
											<span id="getTexts">按住Ctrl可以进行多张图片的选择,双击可以删除图片</span>
											<input type="file" name="goods_pics[]" style="display: none" id="logoFiles" multiple/>
											<?php if(is_array($pics)): foreach($pics as $k=>$v): ?><img id="pic_goods_<?php echo ($k); ?>" src="<?php echo ($v["pic"]); ?>" style="height: 100px;" title="没有图片" ondblclick="del_pics('<?php echo ($v["pic"]); ?>',<?php echo ($k); ?>)" />&nbsp;&nbsp;&nbsp;<?php endforeach; endif; ?>
										</div>
									<hr>
								<h3>类型和属性管理</h3>
								
								<div class="control-group">
									<label class="control-label">商品类型<span class="required">*</span></label>
									<div class="controls">
										<select class="span6 m-wrap" name="type_id" id="goods_type">
											<option value="">请选择类型</option>
											<?php if(is_array($typedata)): foreach($typedata as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if($info['type_id'] == $v['id']): ?>selected="selected"<?php endif; ?>><?php echo ($v["type_name"]); ?></option><?php endforeach; endif; ?>
										</select>
										<br><br>
										<ul style="list-style:none" id="type_ul">		
										</ul>
									</div>
								</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn purple">提交</button>
										<button type="button" class="btn">取消</button>
									</div>
								</form>
								<!-- END FORM-->
							</div>
						</div>
						<!-- END VALIDATION STATES-->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->  
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->

	<div class="footer">
		<div class="footer-inner">

			2013 &copy; Metronic by keenthemes.Collect from <a href="http://www.cssmoban.com/" title="网站模板" target="_blank">网站模板</a> - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a>

		</div>

		<div class="footer-tools">

			<span class="go-top">

			<i class="icon-angle-up"></i>

			</span>

		</div>

	</div>

	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<!-- BEGIN CORE PLUGINS -->

	<script src="<?php echo C('ADMIN_JS_PATH');?>jquery-1.10.1.min.js" type="text/javascript"></script>

	<script src="<?php echo C('ADMIN_JS_PATH');?>jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

	<script src="<?php echo C('ADMIN_JS_PATH');?>jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      

	<script src="<?php echo C('ADMIN_JS_PATH');?>bootstrap.min.js" type="text/javascript"></script>

	<!--[if lt IE 9]>

	<script src="<?php echo C('ADMIN_JS_PATH');?>excanvas.min.js"></script>

	<script src="<?php echo C('ADMIN_JS_PATH');?>respond.min.js"></script>  

	<![endif]-->   

	<script src="<?php echo C('ADMIN_JS_PATH');?>jquery.slimscroll.min.js" type="text/javascript"></script>

	<script src="<?php echo C('ADMIN_JS_PATH');?>jquery.blockui.min.js" type="text/javascript"></script>  

	<script src="<?php echo C('ADMIN_JS_PATH');?>jquery.cookie.min.js" type="text/javascript"></script>

	<script src="<?php echo C('ADMIN_JS_PATH');?>jquery.uniform.min.js" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->



	<!-- 引入富文本编辑器 -->
	<script type="text/javascript" charset="utf-8" src="<?php echo C('ADMIN_PLUGIN_PATH');?>/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php echo C('ADMIN_PLUGIN_PATH');?>/ueditor/ueditor.all.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php echo C('ADMIN_PLUGIN_PATH');?>/ueditor/lang/zh-cn/zh-cn.js"></script>
	<script type="text/javascript">
		var ue=UE.getEditor('goods_desc');
		function isFocus(e){

		}
	</script>

	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo C('ADMIN_JS_PATH');?>jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo C('ADMIN_JS_PATH');?>additional-methods.min.js"></script>
	<script type="text/javascript" src="<?php echo C('ADMIN_JS_PATH');?>select2.min.js"></script>
	<script type="text/javascript" src="<?php echo C('ADMIN_JS_PATH');?>chosen.jquery.min.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<script src="<?php echo C('ADMIN_JS_PATH');?>app.js"></script>
	<!-- END PAGE LEVEL STYLES -->
	<script>
		function del_pics(pic,pid){
			var gid=$("#g_id").val();
			$.ajax({
				url:"<?php echo U('goods_ajax_del_pic');?>",
				data:{'gid':gid,'g_p_path':pic},
				dataType:'json',
				type:'post',
				success:function(msg){
				if(msg.status==1){
					$("#pic_goods_"+pid).remove();
				}else{
					alert('删除图片失败！');
				}
			}
			})
		}
		//拼装商品属性 的方法：
	function get_attr_by_type(t_id){
		if(t_id == undefined){
			var t_id = <?php echo ($info["type_id"]); ?>;//获取当前选择的类型ID
		}
		var g_id = <?php echo ($info["id"]); ?>;
		//发送ajax请求，从属性表中，拿到当前类型对应的所有属性
		$.getJSON("<?php echo U('Goods/get_attr_by_type_edit');?>",{"type_id":t_id,'goods_id':g_id},function(data){
			console.log(data);//在控制台中打印数据
			//foreach($data as $k=>$v)---	data---data $k----n    $v---v
			var str = '';
			$.each(data,function(n,v){
				//alert(v.attr_name);取出数据进行测试
				if(v.attr_type == "可选"){
					//生成下拉框
					//JS方法split（）：用逗号，把字符串拆分成数组
					var  attr_option_val = v.attr_option_value.split(',');//explode(",",v.attr_opiton_value)
					
					//判断v.attr_value，如果有值，进行拆分、循环，否则，证明是选择了别的类型，那么，只输出一次
					if(v.attr_value==null){
						str +="<br><li><a href='javascript:void(0)' onclick='add_li(this)'>[+]</a> "+v.attr_name;
						str +="：<select name='attr_val["+v.id+"][]'>";
						str +="<option value=''>请选择</option>";
						//循环attr_option_val数组，把里面的值拼装成下拉框
						for(var i=0;i<attr_option_val.length;i++){
							str +="<option value='"+attr_option_val[i]+"'>"
							str += attr_option_val[i]+"</option>";
						}
						str +="</select></li>";
					}else{
						var attr_value = v.attr_value.split(',');
						//循环attr_value数组，输出多个<select>框
						for(var j=0;j<attr_value.length;j++){
							if(j==0){
								str +="<br><li><a href='javascript:void(0)' onclick='add_li(this)'>[+]</a> "+v.attr_name;
								
							}else{
								str +="<br><li><a href='javascript:void(0)' onclick='add_li(this)'>[-]</a> "+v.attr_name;
							}
							str +="：<select name='attr_val["+v.id+"][]'>";
							str +="<option value=''>请选择</option>";
							//循环attr_option_val数组，把里面的值拼装成下拉框
							for(var i=0;i<attr_option_val.length;i++){
								if(attr_value[j] == attr_option_val[i]){
									str +="<option selected='selected' value='"+attr_option_val[i]+"'>"
								}else{
									str +="<option value='"+attr_option_val[i]+"'>"
								}
								str += attr_option_val[i]+"</option>";
							}
							str +="</select></li>";
						}
					}
				}else{
					//attr_type=唯一，生成文本框
					if(v.attr_value == null){
						v.attr_value='';
					}
					str+="<br>"+v.attr_name+"：<input type='text' name='attr_val["+v.id+"][]' value="+v.attr_value+"><br>";
				}
				
				//把拼装好的str,添加到页面上
			})
				$("#type_ul").html(str);
		})
	}
		function getUpload(){
			$("#logoFile").click();
		}
		function getUploads(){
			$("#logoFiles").click();
		}
		jQuery(document).ready(function() {   
			$("#logoFile").change(function(){
				$("#getText").html($(this).val());
			})
			$("#logoFiles").change(function(){
				$("#getTexts").html('图片已选择');
			})
			//页面加载完成后，自动执行,获取当前类型对应的属性
		   get_attr_by_type();
			
			//监听类型下拉框的切换事件，调用get_attr_by_type获取对应的属性
			$("#goods_type").change(function(){
				var t_id = $(this).val();
				get_attr_by_type(t_id);
			})
		   // initiate layout and plugins

		   App.init();
            var form1 = $('#form_sample_1');
            var error1 = $('.alert-error', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-inline', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    goods_name: {
                        minlength: 2,
                        required: true
                    },
                    goods_price: {
                        required: true,
                        number: true
                    }, 
                    cat_id: {
                        required: true
                    }            
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    App.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.help-inline').removeClass('ok'); // display OK icon
                    $(element)
                        .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change dony by hightlight
                    $(element)
                        .closest('.control-group').removeClass('error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                    .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
                },

                submitHandler: function (form) {
                	form.submit();
                    // success1.show();
                    // error1.hide();
                }
            });

		});
		function add_li(e){
			var str=$(e).html();
			if (str=="[+]") {
				$(e).html("[-]");
				var new_li=$(e).parent().clone();
				$(e).html("[+]");
				$(e).parent().after(new_li);
			}else{
				$(e).parent().remove();
			}
		}
	</script>

	<!-- END JAVASCRIPTS -->   

</body>

<!-- END BODY -->

</html>