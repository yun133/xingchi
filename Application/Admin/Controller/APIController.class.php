<?php
/**
*说明:接口类
*@author Sometbody
*@time 2017-04-09
*/
	namespace Admin\Controller;
	use Think\Controller;
	class APIController extends Controller{
		/**
		*说明:根据商品的分类,获得具体的商品,返回json字符串
		*@param string $catName 分类的名称
		*@author Sometbody
		*@return none
		*@time 2017-04-09
		*/
		function getGoodsByCatAPI($catName)
		{
			// $catName=php;
			//1根据分类名称查找分类ID(模糊)
			$cat_ids=M('category')->where(array('cat_name'=>array('like','%{$catName}%')))->select();
		}
	}