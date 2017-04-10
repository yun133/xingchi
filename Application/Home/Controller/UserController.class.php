<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    //会员登录
    public function login(){
        if(IS_POST){
            //收集form表单过来的用户名和密码信息
            $name = I('post.username');
            $pwd = I('post.password'); 
            $pwd = md5($pwd); //加密处理

            //判断用户名和密码(返回null则说明用户名和密码是错误的)
            $info = D('User')->where(array('username'=>$name,'password'=>$pwd))->find();
            if($info !== null){
                //持久化用户信息
                session('user_name',$info['username']);
                session('user_id',$info['user_id']);
                //登录后判断是否有定义回跳地址,并做跳转
                $back_url=session('back_url');
                if (!empty($back_url)) {
                    $this->redirect($back_url);
                }

                //页面跳转到首页
                $this -> redirect('Index/index');
            }
            //把用户名和密码错误的信息传递给模板显示
            $this -> assign('errorinfo','用户名或密码错误');
        }
        $this -> display();
    }
    public function register(){
    	layout(false);//不使用默认布局
        $user=D('user');
        if (IS_POST) {
            //校验短信验证码
            $checkcode=I('post.checkcode');
            $data=session('data');
            $limittime=$data['limittime']*60;//转换限制单位为秒
            $xianzaitime=time();
            if ($xianzaitime-$limittime>$data['nowtime']) {
                //一时间过期验证
                $this->assign('infoerror','短信验证码已经过期');
            } elseif($checkcode!=$data['code']){
                //二验证码是否正确
                $this->assign('infoerror','验证码输入错误');
            }else{
                $shuju=$user->create();
                $shuju['password']=md5($shuju['password']);
                $shuju['user_time']=$shuju['last_time']=time();
                if ($user->add($shuju)) {
                    $this->redirect('User/login');
                }
            }    
        }
        $this->display();
    }
    //会员退出
    function logout(){
        session(null);
        $this -> redirect("User/login");
    }
    //发送短信验证码
    public function sendCont(){
        if(IS_AJAX){
            //获取手机号码
            $tel = I('get.tel');
            //① 制作验证码(4位随机数)
            $data['code'] = mt_rand(1000,9999);
            //② 限制时间
            $data['limittime'] = 3;
            //③ 当前时间
            $data['nowtime'] = time();

            //把①、②、③的信息都存储给session
            session('data',$data);
// dump($tel);
            //发送短信
            $z = sendSms($tel,array($data['code'],$data['limittime']));
            if($z){
                echo json_encode(array('status'=>'100'));
            }else{
                echo json_encode(array('status'=>'101'));
            }
        }
    }
}