<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function showlist(){
    	$goodsinfo = D('Goods')
            ->order('id desc')
            ->field('id,goods_name,goods_price,sm_logo')
            ->select();
        // dump($goodsinfo);die;
        $this -> assign('goodsinfo',$goodsinfo);
        $this->display();
    }
    public function detail(){
        $id=I('get.id');
        // dump($id);
        $goodsinfo=D('Goods')->find($id);
        $this->assign('goodsinfo',$goodsinfo);
        $onlyinfo=D('Attribute')
        ->alias('a')
        ->join('xingchi_goods_attr b on a.id=b.attr_id')
        ->where(array('b.goods_id'=>$id,'a.attr_type'=>'唯一'))
        ->field('b.attr_id,a.attr_name,b.attr_value')
        ->select();
        // dump($onlyinfo);
        $this->assign('onlyinfo',$onlyinfo);

        $manyinfo=D('Attribute')
        ->alias('a')
        ->join('xingchi_goods_attr b on a.id=b.attr_id')
        ->where(array('b.goods_id'=>$id,'a.attr_type'=>'可选'))
        ->field('b.attr_id,a.attr_name,b.attr_value,group_concat(b.attr_value) attr_values')
        ->group('b.attr_id')
        ->select();
        // dump($manyinfo);
        foreach ($manyinfo as $k => $v) {
            $manyinfo[$k]['values']=explode(',',$v['attr_values']);
        }
        // dump($manyinfo);
        $this->assign('manyinfo',$manyinfo);

        $picsinfo=D('Goods_pic')->where(array('goods_id'=>$id))->select();
        // dump($picsinfo);
        $this->assign('picsinfo',$picsinfo);        
        $this->display();
    }
}