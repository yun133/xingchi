<?php
namespace Home\Controller;
use Think\Controller;
class ShopController extends Controller {
   function addCart(){
    if(IS_AJAX){
        $id=I('get.goods_id');//被添加商品的id
        //获得被添加商品的相关信息
        $info=D('Goods')->find($id);
        // dump($info);die;//通过firebug查看
        //把被添加的商品信息组织为array数组形式
        //array('id'=>'商品id','goods_name'=>'名称','goods_price'=>'单价','goods_buy_number'=>'购买数量','goods_total_price'=>数量*单价)
        $shuju['goods_id']          = $info['id'];
        $shuju['goods_name']        = $info['goods_name'];
        $shuju['goods_price']       = $info['goods_price'];
        $shuju['goods_buy_number']  = 1;
        $shuju['goods_total_price'] = $info['goods_price'];
        //给购物车添加商品
        $cart = new \Home\Common\Cart();
        $cart -> add($shuju);

        //把更新后的购物车商品总数量和总价格获得并返回
        $number_price = $cart -> getNumberPrice();
        //array('number'=>xx,'price'=>xx)
        echo json_encode($number_price);
    }
   }
   //购物车信息列表展示
   function flow1(){
    //获取购物车商品信息
        $cart=new \Home\Common\Cart();
        $cartinfo=$cart->getCartInfo();//获取购物车商品信息        
        foreach ($cartinfo as $k => $v) {            
            $logo=D('Goods')->where(array('id'=>$cartinfo[$k]['goods_id']))->field('sm_logo')->select();
            $cartinfo[$k]['logo']=$logo[0]['sm_logo'];
        }
        // dump($cartinfo);
        $this->assign('cartinfo',$cartinfo);
        //获取购物车商品总金额
        $number_price=$cart->getNumberPrice();
        $this->assign('number_price',$number_price);
        $this->display();
   }
   //生成订单展示界面
   function flow2(){
        if (IS_POST) {
            // dump($_POST);
            // dump($_SESSION);
            //1) 生成订单信息，对两个表(sp_order/sp_order_goods)进行数据维护
            //① 维护订单信息sp_order
            $cart = new \Home\Common\Cart();
            $number_price = $cart -> getNumberPrice();

            $shuju = I('post.');
            $shuju['user_id']       = session('user_id');
            $shuju['order_number']  = "itcast-shop-".date("YmdHis")."-".mt_rand(1000,9999);
            $shuju['order_price']   = $number_price['price'];
            $shuju['user_id']       = session('user_id');
            $shuju['add_time']      = $shuju['upd_time'] = time();
            // dump($shuju);
            $order_id = D('Order')->add($shuju); //形成订单记录

            //② 维护订单关联的商品信息sp_order_goods
            //获取购物车信息
            $cartinfo = $cart -> getCartInfo();
            $shuju2 = array();
            foreach($cartinfo as $k => $v){
                $shuju2['order_id']         = $order_id;
                $shuju2['goods_id']         = $k;
                $shuju2['goods_price']      = $v['goods_price'];
                $shuju2['goods_number']     = $v['goods_buy_number'];
                $shuju2['goods_total_price'] = $v['goods_total_price'];
                //给sp_order_goods表形成记录
                D('OrderGoods')->add($shuju2);
            }
            //2) 清除购物车信息
            $cart -> delAll();

            //echo "订单形成中....";
            //实现支付宝支付效果(订单号码、商品名称、付款金额、商品描述)
            $WIDout_trade_no = $shuju['order_number'];
            $WIDsubject      = $shuju['order_number'];
            $WIDtotal_fee    = $number_price['price'];
    $fm = <<<eof
        <form action="/Application/Common/Plugins/alipay/alipayapi.php" method="post">
            <input type="hidden" name="WIDout_trade_no" value="$WIDout_trade_no" />
            <input type="hidden" name="WIDsubject" value="$WIDsubject" />
            <input type="hidden" name="WIDtotal_fee" value="$WIDtotal_fee" />
            <input type="hidden" name="WIDbody" value="" />
        </form>
        <script type="text/javascript">
            document.getElementsByTagName('form')[0].submit();
        </script>
eof;
    echo $fm;
        } else {
            //判断用户是否有登录系统
            $user_name=session('user_name');
            if (empty($user_name)) {
                //用户没有登录系统
                //定义回跳地址
                session('back_url','Shop/flow2');
                //使其跳转到登录页
                $this->redirect('User/login');
            }
            //获取购物车商品信息
            $cart=new \Home\Common\Cart();
            $cartinfo=$cart->getCartInfo();//获取购物车商品信息 
            //获得购物车商品的图片信息       
            foreach ($cartinfo as $k => $v) {            
                $logo=D('Goods')->where(array('id'=>$cartinfo[$k]['goods_id']))->field('sm_logo')->select();
                //整合，使得$logoinfo的图片信息添加进$cartinfo 里边去 
                $cartinfo[$k]['logo']=$logo[0]['sm_logo'];          
            }
            // dump($cartinfo);
            $this->assign('cartinfo',$cartinfo);
            //获取购物车商品总金额
            $number_price=$cart->getNumberPrice();
            $this->assign('number_price',$number_price);

            //收货人信息展示
            $user_id=session('user_id');
            $consignee=M('Consignee')->where(array('user_id'=>$user_id))->select();
            $this->assign('consignee',$consignee);
            $this->display();
        }        
   }

   //使得购物车商品数量发生变化
   function changeNumber(){
    if (IS_AJAX) {
        //获得客户端传递过来的goods_id和num
        $goods_id=I('post.goods_id');
        $num=I('post.num');
        //使得购物车数量发生变化
        $cart=new \Home\Common\Cart();
        $xiaoji_price=$cart->changeNumber($num,$goods_id);
        //获得目前购物车商品总价格
        $number_price=$cart->getNumberPrice();
        echo json_encode(array(
            'total_price'=>$number_price['price'],
            'xiaoji_price'=>$xiaoji_price
        ));
    }
   }

    //删除购物车商品
    function delGoods(){
        $goods_id = I('get.goods_id');//获得被删除商品的goods_id

        //删除购物车指定的商品
        $cart=new \Home\Common\Cart();
        $cart->del($goods_id);
        //获得删除后的购物车商品总金额
        $number_price=$cart->getNumberPrice();
        // dump($number_price);
        echo json_encode($number_price);
    }
}