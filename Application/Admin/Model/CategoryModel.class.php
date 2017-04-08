<?php
	namespace Admin\Model;
	use Think\Model;
	class CategoryModel extends Model{
		protected $insertFields="id,cat_name,parent_id";
		protected $updateFields="id,cat_name";

		protected $validate=array(
			array('cat_name','require','分类名称必须填写')
		);

		public function getData(){
			$data=$this->select();
			return $this->getTree($data);
		}
		public function getTree($data,$parent_id=0,$level=0){
			static $arr=array();
			foreach ($data as $k => $v) {
				if ($v['parent_id']==$parent_id) {
					$v['level']=$level;
					$arr[]=$v;
					unset($data[$k]);//从数组移除已分级的,提高效率
					$this->getTree($data,$v['id'],$level+1);//这里不能是$level++
				}
			}
			return $arr;			
		}
		public function isDel($id){
			$count=$this->where(array('parent_id'=>$id))->count();
			return $count;
		}
	}