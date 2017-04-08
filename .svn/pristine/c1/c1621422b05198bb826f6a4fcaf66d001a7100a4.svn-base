<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

    public function login(){
        $model=D('Admin');
        if (IS_POST) {
            // dump($_POST);die;
            if($model->validate($model->_login_validate)->create()){
                if ($model->checkVerify()) {
                    $res=$model->checkUser();
                    if($res==1) {
                        $this->error('用户名错误');
                    }elseif($res==2){
                        $this->error('密码错误');
                    }elseif($res==3){
                        $this->success('登录成功',U('Admin/Index/index'));
                    }
                    die;
                }                
            }
            $this->error($model->getError());die;
        }
        $this->display();
    }
    public function verify_code(){
        $Verify=new \Think\Verify();
        $Verify->fontSize=30;
        $Verify->length=2;
        $Verify->useNoise=none;
        $Verify->entry();
    }

}