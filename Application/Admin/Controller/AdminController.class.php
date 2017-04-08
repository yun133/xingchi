<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends BaseController {
    public function __construct(){
        parent::__construct();
        $this->assign('sel_name','管理员管理');
    }
    public function admin_add(){
        $model=D('Admin');
        if (IS_POST) {
            // dump($_POST);die;
            // dump($_FILES);die;
            if ($model->create()) {
                if ($model->add()) {
                    $this->success('管理员添加成功',U('Admin/admin_list'));die;
                }
            }
            $this->error($model->getError());die;
        } else {
            $roles=M('Role')->select();
            $this->assign('roles',$roles);
            $titles=array('name'=>'管理员管理','sub'=>'管理员添加');
            $this->assign('titles',$titles);
            $this->display();
        }        
    }
    public function admin_list(){
        $lst=M('Admin')->select();
        $r_model=M('Role');
        // dump($lst);die;
        foreach ($lst as $k => $v) {
            $lst[$k]['rols']=$r_model->where(array('id'=>array('in',$v['role_ids'])))->getField("group_concat(role_name)");
            // echo $r_model->getLastSql();die;
        }
        
        $this->assign('lst',$lst);
        $titles=array('name'=>'管理员管理','sub'=>'管理员添加');
        $this->assign('titles',$titles);
        $this->display();      
    }
    public function admin_edit(){
        $model=D('Admin');
        if (IS_POST) {
            // dump($_POST);
            // dump($_FILES);die;
            if ($model->create()) {
                if ($model->save()) {
                    $this->success('管理员修改成功',U('Admin/admin_list'));die;
                }
            }
            $this->error($model->getError());die;
        } else {
            $info=$model->find(I('get.id'));
            // dump($info);die;
            $this->assign('info',$info);
            $titles=array('name'=>'管理员管理','sub'=>'管理员添加');
            $this->assign('titles',$titles);
            $this->display();
        }        
    }
    public function admin_del(){
        $model=D('Admin');
        if ($model->delete(I('get.id'))) {
            echo json_encode(array('status'=>1));die;
        }
            echo json_encode(array('status'=>0)); 
    }
    public function logout(){
        session(null);
        $this->redirect('Admin/Login/login');die;
    }
}