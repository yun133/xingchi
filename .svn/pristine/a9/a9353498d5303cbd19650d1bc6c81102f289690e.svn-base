<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends BaseController {
    public function __construct(){
        parent::__construct();
        $this->assign('sel_name','分类管理');
    }
    public function cat_add(){
        $cat_model=D('Category');
        if (IS_POST) {
            // dump($_POST);die;
            if ($cat_model->create()) {
                if ($cat_model->add()) {
                    $this->success('分类添加成功',U('cat_list'));die;                    
                }
            }
            $error=$cat_model->getError();
            $this->error($error);die; 
            
        } else {
            $data=$cat_model->getData();
            // dump($data);die;
            $this->assign('data',$data);
            $titles=array('name'=>'分类管理','sub'=>'分类列表');
            $this->assign('titles',$titles);
            $this->display();
        }
    }
    public function cat_list(){
        $data=D('Category')->getData();
        // dump($data);die;
        $this->assign('data',$data);
        $titles=array('name'=>'分类管理','sub'=>'分类列表');
        $this->assign('titles',$titles);
        $this->display();
    }
    public function cat_edit(){
        $edit_model=D('Category');
        if (IS_POST) {
            // dump($_POST);die;
            if ($edit_model->create()) {
                if ($edit_model->save()) {
                    $this->success('分类修改成功',U('cat_list'));die;                    
                }
            }
            $error=$edit_model->getError();
            $this->error($error);die; 
            
        } else {
            $data=$edit_model->getData();        
            $this->assign('data',$data);

            $info=$edit_model->find(I('get.id'));
            $this->assign('info',$info);

            $titles=array('name'=>'分类管理','sub'=>'分类列表');
            $this->assign('titles',$titles);
            $this->display();
        }
    }
    public function cat_del(){
        $del_model=D('Category');
        $id=I('get.id');
        $result=$del_model->isDel($id);
        if ($result) {
            echo json_encode(array('status'=>0,'errMsg'=>'请删除这个分类下的所有子分类后,再进行删除'));die;  
        } else {
            if ($del_model->delete($id)) {
                echo json_encode(array('status'=>1));die;                    
            }
        }
    }
}