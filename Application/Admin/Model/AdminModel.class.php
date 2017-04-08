<?php
	namespace Admin\Model;
	use \Think\Model;
	class AdminModel extends Model{
		protected $insertFields="user_name,password,user_logo,role_ids";
		protected $updateFields="id,user_name,password,user_logo,role_ids";

		protected $validate=array(
			array('admin_name','require','管理员名称必须填写',1),
			array('password','require','密码必须填写',1)
		);
		//----------------start-登录验证------------------
		public $_login_validate=array(
			array('user_name','require','用户名必须填写',1),
			array('password','require','密码必须填写',1)
		);
		public function checkVerify(){
			// if (!I('post.verifycode')) {
			// 	$this->error="请填写验证码!";
			// 	return false;
			// }
			// $verify=new \Think\Verify();
			// if (!$verify->check(I('post.verifycode'))) {
			// 	$this->error="验证码错误!";
			// 	return false;
			// }
			return true;
		}
		public function checkUser(){
			$user_name=I('post.user_name');
			$password=md5(I('post.password'));
			$res=$this->where(array('user_name'=>$user_name))->find();
			if ($res) {
				if ($res['password']===$password) {
					session('admin_id',$res['id']);
					session('admin_name',$res['user_name']);
					session('admin_logo',$res['user_logo']);
					$data['login_time']=time();
					$data['last_login_ip']=ip2long(get_client_ip());
					M('Admin')->where(array('id'=>$res['id']))->setField($data);
					return 3;
				} else {
					return 2;
				}
				
			} else {
				return 1;
			}			
		}
		//----------------end-登录验证------------------

		protected function _before_insert(&$data,$option){
			$data['password'] = md5($data['password']);
        	$data['create_time'] = time();//补上创建时间
			if ($_FILES['user_logo']['error']===0) {
				$upload=new \Think\Upload();
				$upload->maxSize=3145728;
				$upload->exts=array('jpg','png','jpeg','gif');
				$upload->rootPath='./Public/Uploads/';
				$upload->savePath='Admin/Admin_pic/';				

				$info=$upload->uploadOne($_FILES['user_logo']);
				if ($info) {
					$data['user_logo']="/Public/Uploads/".$info['savepath'].$info['savename'];
				}
			}
		}
		public function _before_update(&$data,$option){
			$data['password']=md5($data['password']);
			// dump($option);
			// dump($data);die;
			if ($_FILES['user_logo']['error']===0) {	
				$pics=$this->where(array('id'=>$option['where']['id']))->getField('user_logo');
				@unlink('.'.$pics);
				$upload=new \Think\Upload();
				$upload->maxSize=3145728;
				$upload->exts=array('jpeg','gif','jpg','png');
				$upload->rootPath='./Public/Uploads/';
				$upload->savePath='Admin/Admin_pic/';
				$info=$upload->uploadOne($_FILES['user_logo']);
				if ($info) {
					$data['user_logo']="/Public/Uploads/".$info['savepath'].$info['savename'];
				}
			}
		}
		public function _before_delete($option){
			$pics=$this->where(array('id'=>$option['where']['id']))->getField('user_logo');
			@unlink('.'.$pics);
		}

	}