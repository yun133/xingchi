<?php
	namespace Admin\Model;
	use Think\Model;
	class AttributeModel extends Model{
		protected $insertFields="attr_name,attr_type,attr_option_value,type_id";
		protected $updateFields="id,attr_name,attr_type,attr_option_value,type_id";
		protected $validate=array(
			array('attr_name','require','属性名称必须填写')
		);
		public function _before_insert(&$data,$option){
			$data['attr_option_value']=str_replace(',',',',$data['attr_option_value']);
			if ($data['attr_type']=='唯一') {
				$data['attr_option_value']='';
			}
		}
		public function _before_update(&$data,$option){
			$data['attr_option_value']=str_replace(',',',',$data['attr_option_value']);
			if ($data['attr_type']=='唯一') {
				$data['attr_option_value']='';
			}
		}
	}