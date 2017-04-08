<?php
namespace Admin\Controller;
use Think\Controller;
class TypeController extends BaseController {
    public function __construct(){
        parent::__construct();
        $this->assign('sel_name','类型和属性管理');
    }
    public function type_add(){
        $type_model=D('Type');
        if (IS_POST) {
            // dump($_POST);die;
            if ($type_model->create()) {
                if ($type_model->add()) {
                    $this->success('类型添加成功',U('type_list'));die;                    
                }
            }
            $this->error($type_model->getError());die; 
            
        } else {
            $titles=array('name'=>'类型管理','sub'=>'类型列表');
            $this->assign('titles',$titles);
            $this->display();
        }
    }
    public function type_list(){
        $data=D('Type')->select();
        // dump($data);die;
        $this->assign('data',$data);
        $titles=array('name'=>'类型管理','sub'=>'类型列表');
        $this->assign('titles',$titles);
        $this->display();
    }
    public function type_edit(){
        $edit_model=D('Type');
        if (IS_POST) {
            // dump($_POST);die;
            if ($edit_model->create()) {
                if ($edit_model->save()) {
                    $this->success('类型修改成功',U('type_list'));die;                    
                }
            }
            $error=$edit_model->getError();
            $this->error($error);die; 
            
        } else {
            $data=$edit_model->find(I('get.id'));
            $this->assign('data',$data);

            $titles=array('name'=>'类型管理','sub'=>'类型列表');
            $this->assign('titles',$titles);
            $this->display();
        }
    }
     public function type_del(){
        $del_model = D('Type');
        $id=I('get.id');
        if($del_model->delete($id)){
            echo json_encode(array('status'=>1));
            die;
        }
        else{
           echo json_encode(array('status'=>0,'id'=>$id));
            die; 
        }
            
    }
}