<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\AdminController;
class OrderController extends BaseController {
   function showlist(){
        $info=D('Order')->order('order_id desc')->select();
        // dump($info);die;
        $this->assign('info',$info);
        $this->display();
   }
   //查看订单详情信息
    function detail(){
        //获得订单信息
        //(join联表xingchi_user,获得订单会员名称)
        //(join联表xingchi_consignee,获得订单对应的收货人信息)
        $order_id = I('get.order_id');
        $orderinfo = D('Order')
            ->alias('o')
            ->join('user u on o.user_id=u.user_id')
            ->join('__CONSIGNEE__ c on o.cgn_id=c.cgn_id')
            ->field('o.*,u.username,c.*')
            ->find($order_id);
            //SELECT o.*,u.username,c.* FROM xingchi_order o INNER JOIN xingchi_user u on o.user_id=u.user_id INNER JOIN xingchi_consignee c on o.cgn_id=c.cgn_id WHERE `order_id` = '1' 
        // dump($orderinfo);
        $this -> assign('orderinfo',$orderinfo);

        //获得订单关联的商品信息
        //(join联表xingchi_goods获得商品名称)
        $goodsinfo = D('OrderGoods')
            ->alias('og')
            ->join('__GOODS__ g on og.goods_id=g.id')
            ->field('og.*,g.goods_name')
            ->where(array('og.order_id'=>$order_id))
            ->select();
            //SELECT og.*,g.goods_name FROM xingchi_order_goods og INNER JOIN xingchi_goods g on og.goods_id=g.goods_id WHERE og.order_id = '1' 

        // dump($goodsinfo);die;        
        $this -> assign('goodsinfo',$goodsinfo);

        //支付方式定义
        $this -> assign('paymethods',array('0'=>'支付宝','1'=>'微信','2'=>'银行卡'));

        $this -> display();
    }
    /**
     * PHP导出订单数据为excel格式
     */
    public function putExcel(){
        header("Content-type:application/octet-stream");
        header("Accept-Ranges:bytes");
        header("Content-type:application/vnd.ms-excel");//设置输出excel
        header("Content-Disposition:attachment;filename=php02_order_".time().".xls");//设置文件名
        header("Pragma: no-cache");
        header("Expires: 0");
        //导出xls 开始
        $title = array('订单号','总金额','是否付款','是否发货','下单时间');//表头
        if (!empty($title)){
            foreach ($title as $k => $v) {
                $title[$k]=iconv("UTF-8", "GB2312",$v);
            }
            $title= implode("\t", $title);
            echo "$title\n";
        }
        
        
        $data = M('order')->field('order_number,order_price,order_pay,is_send,add_time')->select();
//         $data = array(array(1,2,3,4,5),array('a','b','c','e','f'));//取出数据
        if (!empty($data)){
            foreach($data as $key=>$val){
                foreach ($val as $ck => $cv) {
                    $data[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
                }
                $data[$key]=implode("\t", $data[$key]);
        
            }
            echo implode("\n",$data);
            die;
        }
    }
}