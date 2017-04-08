<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends BaseController {
    public function __construct(){
        parent::__construct();
        $this->assign('sel_name','商品管理');
    }
    public function goods_add(){
    	if (IS_POST) {
    		// dump($_POST);die;            
    		$model=D('Goods');
    		if ($model->create()) {
    			// dump($_FILES);die;
    			if ($model->add()) {
    				$this->success('商品添加成功！',U('Goods/goods_list'));die;
    			}    			
    		} else {
    			$error=$model->getError();
    			$this->error($error);
    			die;
    		}
    		die;    		
    	} else {
            $typedata=D('Type')->select();  
            $this->assign('typedata',$typedata);
            $data=D('Category')->getData();
            $this->assign('data',$data);
            $titles=array('name'=>'商品管理','sub'=>'商品添加');
            $this->assign('titles',$titles);
            $this->display();
    	}   	
    }
    public function goods_list(){
        // $lst=M('Goods')->select();        
        $lst=M('Goods')
            ->field("g.*, c.cat_name")
            ->alias('g')
            ->join("LEFT JOIN __CATEGORY__ c ON c.id = g.cat_id")
            ->select();
        // dump($lst);die;    
        $this->assign('lst',$lst);
        $titles=array('name'=>'商品管理','sub'=>'商品列表');
        $this->assign('titles',$titles);
        $this->display();
    }
    public function goods_del(){
        $id=I('get.id');
        if (D('Goods')->delete($id)) {
            $status=1;
        } else {
            $status=0;
        }
        echo json_encode(array('status'=>$status));
        die;
    }
    public function goods_edit(){

        if (IS_POST) {
            // dump($_POST);die;
            $id=I('post.id');
            // dump($id);die;
            $model=D('Goods');
            if ($model->create()) {
                if ($model->save()) {
                    $this->success('修改成功',U('goods_list'));
                    die;
                } else {
                    // echo "到这里2";die;
                    $error=$model->getError();
                    $this->error($error);
                }
                
            } else {
                $error=$model->getError();
                $this->error($error);
            }
            
        } else {
            $id=I('get.id');
            $info=M('goods')->find($id);
            $this->assign('info',$info);
            $pics=M('goods_pic')->field('pic')->where(array('goods_id'=>$id))->select();
            $this->assign('pics',$pics);
            //查询所有分类
            $data=D('Category')->getData();
            $this->assign('data',$data);
            //查询所有的类型
            $typedata=M('Type')->select();
            $this->assign('typedata',$typedata);
// dump($typedata);die;
            $titles=array('name'=>'商品管理','sub'=>'商品修改');
            $this->assign('titles',$titles);
            $this->display();
        }       
    }
        public function goods_ajax_del_pic(){
            $goods_id=I('post.gid');
            $src=I('post.g_p_path');
            $pic_data=M('goods_pic')->where(array('goods_id'=>$goods_id,'pic'=>$src))->find();
            // dump($pic_data);die;
            @unlink(".".$pic_data['pic']);
            @unlink(".".$pic_data['sm_pic']);
            @unlink(".".$pic_data['big_pic']);
            @unlink(".".$pic_data['mid_pic']);
            if (M('goods_pic')->where(array('goods_id'=>$goods_id,'pic'=>$src))->delete()) {
                echo json_encode(array('status'=>1));die;
            }
            echo json_encode(array('status'=>0));
        }
        public function get_attr_by_type(){
            $type_id=I('get.type_id');
            $attr_list=M('Attribute')->where(array('type_id'=>$type_id))->select();
            echo json_encode($attr_list);die;
        }
        public function get_attr_by_type_edit(){
            $type_id=I('get.type_id');
            $goods_id=I('get.goods_id');
            $attr_list=M('Attribute')
            ->alias("a")
            ->field("a.*,(select ga.attr_value  from xingchi_goods_attr ga where ga.attr_id = a.id and ga.goods_id={$goods_id}) as attr_value")
            ->where(array('type_id'=>$type_id))
            ->select();
            echo json_encode($attr_list);die;
        }

}