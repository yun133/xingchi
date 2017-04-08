<?php
namespace Admin\Controller;
use Think\Controller;
class AttributeController extends BaseController {
    public function __construct(){
        parent::__construct();
        $this->assign('sel_name','类型和属性管理');
    }
    public function attr_add(){
        $attr_model=D('Attribute');
        if (IS_POST) {
            // dump($_POST);die;
            if ($attr_model->create()) {
                if ($attr_model->add()) {
                    $this->success('属性添加成功',U('attr_list',array('type_id'=>I('post.type_id'))));die;                    
                }
            }
            $this->error($attr_model->getError());die; 
            
        } else {
            $titles=array('name'=>'属性管理','sub'=>'属性列表');
            $this->assign('titles',$titles);
            $this->display();
        }
    }
    public function attr_list(){        
        $data=M('Attribute')->where(array('type_id'=>I('get.type_id')))->select();
        // dump($data);die;
        $this->assign('data',$data);
        $titles=array('name'=>'属性管理','sub'=>'属性列表');
        $this->assign('titles',$titles);
        $this->display();
    }
    public function attr_edit(){
        $edit_model=D('Attribute');
        if (IS_POST) {
            // dump($_POST);die;
            if ($edit_model->create()) {
                if ($edit_model->save()) {
                    $this->success('属性修改成功',U('attr_list',array('type_id'=>I('post.type_id'))));die;
                }
            }
            $error=$edit_model->getError();
            $this->error($error);die; 
            
        } else {
            $data=$edit_model->find(I('get.id'));
            $this->assign('data',$data);

            $titles=array('name'=>'属性管理','sub'=>'属性列表');
            $this->assign('titles',$titles);
            $this->display();
        }
    }
    public function attr_del(){
        $del_model=D('Attribute');
        $id=I('get.id');
        $result=$del_model->delete($id);
        if ($result) {
            echo json_encode(array('status'=>1));die;  
        } else {
            echo json_encode(array('status'=>0));die;                 
        }
    }
}