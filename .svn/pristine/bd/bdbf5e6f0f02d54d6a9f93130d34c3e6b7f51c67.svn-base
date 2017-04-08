<?php
	namespace Admin\Model;
	use Think\Model;
	class GoodsModel extends Model{
		protected $insertFields="cat_id,goods_name,goods_price,logo,sm_logo,mid_logo,goods_desc";
		protected $updateFields="id,cat_id,goods_name,goods_price,logo,sm_logo,mid_logo,goods_desc";

		protected $_validate=array(
			array('goods_name','require',"商品名称尚未填写！",1),
			array('cat_id','require',"商品分类尚未填写！",1),
			array('goods_price','currency',"商品价格为数字格式！",1)
		);
		protected function _before_insert(&$data,$option){
			// dump($_FILES);die;
			$data['goods_desc']=guolv($_POST['goods_desc']);
			$data['add_time']=time();
			$data['upd_time']=time();

			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->rootPath  =      './Public/Uploads/'; // 设置附件上传根目录
			$upload->savePath  =      'Admin/Goods/Logo/'; // 设置附件上传目录    
			// 上传单个文件     
			$info   =   $upload->uploadOne($_FILES['goods_logo']); 
			// dump($info);  die;
			if($info) {
				$data['logo']="/Public/Uploads/".$info['savepath'].$info['savename']; 
			}
			if ($data['logo']) {
				$image=new \Think\Image();
				$image->open('.'.$data['logo']);//打开图片

				$data['sm_logo']="/Public/Uploads/".$info['savepath']."sm_".$info['savename'];
				$data['mid_logo']="/Public/Uploads/".$info['savepath']."mid_".$info['savename'];
				$image->thumb(130,130,6)->save(".".$data['sm_logo']);
				$image->thumb(650,650,6)->save(".".$data['mid_logo']);
			}


		}
		protected function _after_insert($data){
			$id=$data['id'];
			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->rootPath  =      './Public/Uploads/'; // 设置附件上传根目录
			$upload->savePath  =      'Admin/Goods/Goods_pic/'; // 设置附件上传目录    
			// 上传文件     
			$info   =   $upload->upload(array($_FILES['goods_pics'])); 
			// dump($info);die;
			$image=new \Think\Image();
			$gpModel=M('goods_pic');
			foreach ($info as $v) {
				$image->open($upload->rootPath.$v['savepath'].$v['savename']);//打开图片
				$datainfo['goods_id']=$id;
				$datainfo['pic']="/Public/Uploads/".$v['savepath'].$v['savename'];
				$datainfo['sm_pic']="/Public/Uploads/".$v['savepath'].'sm_'.$v['savename'];
				$datainfo['mid_pic']="/Public/Uploads/".$v['savepath'].'mid_'.$v['savename'];
				$datainfo['big_pic']="/Public/Uploads/".$v['savepath'].'big_'.$v['savename'];
				$image->thumb(50,50,6)->save(".".$datainfo['sm_pic']);
				$image->thumb(350,350,6)->save(".".$datainfo['mid_pic']);
				$image->thumb(800,800,6)->save(".".$datainfo['big_pic']);
				$gpModel->add($datainfo);
			}			
        	/* **************处理商品属性******************/
        	$goods_attr_model=M('goods_attr');
        	$g_a_data['goods_id']=$id;
        	//在修改之前,把该商品对应的属性从goods_attr表中删除,再进行添加
        	$goods_attr_model->where(array('goods_id'=>$option['where']['id']))->delete();
        	//取出提交的属性值
        	$attr_val=I('post.attr_val');
        	foreach ($attr_val as $k => $v) {
        		//如果用户所选属性不为空,则进行操作
        		if (!empty($v)) {
        			$g_a_data['attr_id']=$k;
        			//处理属性值
        			$v=array_unique($v);
        			$attr_v_b='';
        			foreach ($v as $k1 => $v1) {
        				if (!empty($v1)) {
        					//用逗号拼装属性值
        					$attr_v_b.=$v1.",";
        				}
        			}
        			//把管理员选的值，存入attr_value字段中
        			$g_a_data['attr_value']=rtrim($attr_v_b,",");
        			if ($g_a_data['attr_value']) {
        				$goods_attr_model->add($g_a_data);
        			}
        		}
        	}
        /* ************** end处理商品属性******************/  
		}
		public function _before_delete($options){
			// print_r($options);die;
			$logo_pic=M('goods')->field('logo,sm_logo,mid_logo')->find($options['where']['id']);
			foreach ($logo_pic as $v) {
				@unlink(".".$v);
			}
			$goods_pics=M('goods_pic')->where(array('goods_id'=>$options['where']['id']))->select();
			foreach ($goods_pics as $v) {
				@unlink(".".$v['pic']);
				@unlink(".".$v['sm_pic']);
				@unlink(".".$v['mid_pic']);
				@unlink(".".$v['big_pic']);
			}
			M('goods_pic')->where(array('goods_id'=>$options['where']['id']))->delete();
		}
		protected function _before_update(&$data,$option){
			// dump($data);die;
			$data['goods_desc']=guolv($_POST['goods_desc']);
			$data['upd_time']=time();

			if ($_FILES['goods_logo']['error']===0) {
				$pic=M('goods')->field('logo,sm_logo,mid_logo')->find($option['where']['id']);
				// dump($pic);die;
				foreach ($pic as $v) {
					@unlink(".".$v);
				}
				$upload = new \Think\Upload();// 实例化上传类    
				$upload->maxSize   =     3145728 ;// 设置附件上传大小
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath  =      './Public/Uploads/'; // 设置附件上传根目录
				$upload->savePath  =      'Admin/Goods/Logo/'; // 设置附件上传目录    
				// 上传单个文件     
				$info   =   $upload->uploadOne($_FILES['goods_logo']); 
				// dump($info);  die;
				if($info) {
					$data['logo']="/Public/Uploads/".$info['savepath'].$info['savename']; 
				}
				if ($data['logo']) {
					$image=new \Think\Image();
					$image->open('.'.$data['logo']);//打开图片

					$data['sm_logo']="/Public/Uploads/".$info['savepath']."sm_".$info['savename'];
					$data['mid_logo']="/Public/Uploads/".$info['savepath']."mid_".$info['savename'];
					$image->thumb(130,130,6)->save(".".$data['sm_logo']);
					$image->thumb(650,650,6)->save(".".$data['mid_logo']);
				}
			}
			/* **处理商品相册************/
           
            
            /* ****************商品相册******************/
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =      './Public/Uploads/'; // 设置附件上传的根路径
            $upload->savePath  =      'Admin/Goods/Goods_pic/'; // 设置附件上传目录
            
            $info   =   $upload->upload(array($_FILES['goods_pics']));//上传多张图片（图片的数组）
            
            //循环结果$info，每次循环，生成缩略图，并且把数据入库
            $image = new \Think\Image();
            $gpModel = M('goods_pic');
            foreach($info as $v){
                $image->open($upload->rootPath.$v['savepath'].$v['savename']);//打开图片
                $datainfo['goods_id'] = $option['where']['id'];
                $datainfo['pic'] = "/Public/Uploads/".$v['savepath'].$v['savename'];
                $datainfo['sm_pic'] = "/Public/Uploads/".$v['savepath'].'sm_'.$v['savename'];
                $datainfo['mid_pic'] = "/Public/Uploads/".$v['savepath'].'mid_'.$v['savename'];
                $datainfo['big_pic'] = "/Public/Uploads/".$v['savepath'].'big_'.$v['savename'];
                $image->thumb(50, 50,6)->save(".".$datainfo['sm_pic']);//生成小的缩略图 save后面是新图片的路径
                $image->thumb(350, 350,6)->save(".".$datainfo['mid_pic']);//
                $image->thumb(800, 800,6)->save(".".$datainfo['big_pic']);//
                $gpModel->add($datainfo);
            }
            /* ******** end 商品相册****************/   
            /* **************处理商品属性******************/
            $goods_attr_model = M('goods_attr');
            $g_a_data['goods_id'] =$option['where']['id'];
            
            //在修改属性之前，把该商品对应的属性从goods_attr表中都删除，再进行添加
            $goods_attr_model->where(array('goods_id'=>$option['where']['id']))->delete();
            
            //取出提交的属性值：
            $attr_val = I('post.attr_val');
            foreach($attr_val as $k=>$v){
                //如果用户所选属性不为空，则进行操作
                if(!empty($v)){
                    $g_a_data['attr_id'] = $k;
            
                    //处理属性值
                    $v = array_unique($v);//把用户所选属性值去重
                    $attr_v_b = '';
                    foreach($v as $k1=>$v1){
                        //如果所选的属性值不为空
                        if(!empty($v1)){
                            //用逗号拼装属性值
                            $attr_v_b .= $v1.",";//形如： 5.5英寸，5.6英寸，5.7英寸，
                        }
                    }
                    //把管理员选的值，存入attr_value字段中
                    $g_a_data['attr_value']=rtrim($attr_v_b,",");//去掉最右边的逗号
                    //trim在JS中，去除字符串两端的空格  在PHP中，trim(原字符串，要去掉的符号）去掉原字符串中，左右两端指定的符号
                    //如果不指定要去掉的符号，默认去除字符串左右两端的空格  ltrim  rtrim
                    // strrpos()查找最右边的逗号  substr()
            
            
                    //把数据存入goods_attr表
                    if($g_a_data['attr_value']){//如果attr_value有东西，则添加，否则不添加
                        $goods_attr_model->add($g_a_data);
                    }
                }
            }
            /* ************** end处理商品属性******************/   	
		}
		
	}