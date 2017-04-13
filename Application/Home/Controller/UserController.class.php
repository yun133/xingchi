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
                if ($info['is_active']=='激活') {
                    //持久化用户信息
                    session('user_name',$info['username']);
                    session('user_id',$info['user_id']);
                    //登录后判断是否有定义回跳地址,并做跳转
                    $back_url=session('back_url');
                    if (!empty($back_url)) {//清除回跳地址
                        $this->redirect($back_url);
                    }
                    //页面跳转到首页
                    $this -> redirect('Index/index');
                } else {
                     $this -> assign('errorinfo','会员账号还没有激活，请登陆邮箱激活');
                } 
            }else{
                //把用户名和密码错误的信息传递给模板显示
                $this -> assign('errorinfo','用户名或密码错误');
            }            
        }
        $this -> display();
    }
    public function register(){
    	layout(false);//不使用默认布局
        $user=D('user');
        if (IS_POST) {
            //校验短信验证码
            // dump($_POST);
            // dump(session());
            $checkcode=I('post.checkcode');
            $data=session('data');
            $limittime=$data['limittime']*60;//转换限制单位为秒
            $xianzaitime=time();
            if (!$xianzaitime-$limittime>$data['nowtime']) {
                //一时间过期验证
                $this->assign('infoerror','短信验证码已经过期');
            } elseif($checkcode!=$data['code']){
                //二验证码是否正确
                $this->assign('infoerror','验证码输入错误');
            }else{
                $shuju=$user->create();
                $shuju['password']=md5($shuju['password']);
                $shuju['user_time']=$shuju['last_time']=time();
                dump($shuju);
                if ($newid=$user->add($shuju)) {
                    //给新会员发送激活账号邮件
                    $emailaddr=$shuju['user_email'];//邮件接受者
                    // dump($emailaddr);die;
                    //生存激活码,截取最后15为
                    $active_code=substr(md5($shuju['user_email'].time()), -15);
                    //把激活码存储给当前的会员
                    $user -> save(array('user_id'=>$newid,'active_code'=>$active_code));
                    //邮件内容
                    $url = "http://www.xingchi.com/index.php/Home/User/Active/user_id/".$newid."/active_code/".$active_code;
                    $cont = "<p>请点击以下超链接激活账号</p>";
                    $cont .= "<p><a href='".$url."'>".$url."</a></p>";
                    $title='激活账号邮件';
                    sendMail($emailaddr,$title,$cont);
                    $this->success('请登录邮箱激活账号',U('User/login'),5);
                }
            }    
        }
        $this->display();
    }
    //新会员邮件激活账号
    function Active(){
        //获取邮件激活信息
        $active_code = I('get.active_code');
        $user_id = I('get.user_id');

        $user = D('user');
        //根据$active_code和$user_id查询是否存在一条记录，存在就激活
        $info = $user->where(array('user_id'=>$user_id,'active_code'=>$active_code))->find();
        if($info){
            //正常激活:修改is_active='激活' active_code=''
            $shuju['user_id'] = $user_id;
            $shuju['active_code'] = '';
            $shuju['is_active'] = '激活';
            if($user -> save($shuju)){
                $this -> success('账号已经激活',U('User/login'),2);
            }
        }else{
            //非法激活
            $this -> error('传递参数有问题，请联系管理员',U('User/regist'),2);
        }
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