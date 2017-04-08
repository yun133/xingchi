<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function __construct(){
        parent::__construct();
        $admin_id=session('admin_id');
        if (!$admin_id) {
            $this->error('请登录!',U('Admin/Login/login'));die;
        }
        //管理员进入系统，需要根据自己的ID，判断是否在session已经存入了权限，如果有，则直接使用，没有，进行查询

        $pris=session('admin_pri_'.$admin_id);
      
        if (empty($pris)) {
        	if ($admin_id==1) {
        		$pris=M('Privilege')->select();
        	}else{
        		//查询当前管理员拥有的角色ID们
        		$role_ids=M('Admin')->where(array('id'=>$admin_id))->getField('role_ids');
        		//查询角色拥有的权限ID们
        		$roles=M('Role')->where(array('id'=>array('in',$role_ids)))->getField('group_concat(pri_ids)');
        		$roles=array_unique(explode(',',$roles));//去重
        		//根据角色表中的这些权限ID,取出所拥有的权限
        		$pris=M('Privilege')->where(array('id'=>array('in',$roles)))->select();
        		//dump($pris);die;
        		session('admin_allow_pri_'.$admin_id,$roles);
        	}
        	session('admin_pri_'.$admin_id,$pris);
        }
        if (CONTROLLER_NAME !='Index') {
        	if ($admin_id!=1) {//超级管理员拥有所有权限
        		//拿到该管理员所拥有的权限
        		$pri_ids_ad=session('admin_allow_pri_'.$admin_id);
        		//根据用户所访问的页面，得到模块名、控制器名、方法名，去权限表中，能够确认唯一一条数据---我们要得到这条数据的ID
        		$p_id=M('Privilege')->where(array('module_name'=>MODULE_NAME,'controller_name'=>CONTROLLER_NAME,'action_name'=>ACTION_NAME))->getField('id');
        		//拿到这个ID后，和这个管理员所拥有的权限进行比对，如果在拥有的权限里面，说明没问题，反之，则越权访问
        		if (!in_array($p_id,$pri_ids_ad)) {
        			$this->error('请登陆',U("Admin/Login/login"));die;
        		}
        	}
        }
 // dump($pris);die;
        $pris=$this->_getMenu($pris);
        // dump($pris);die;
        $this->assign('menu',$pris);//把所有的权限分配到页面，做为菜单使用
    }
    /*
     * 取出权限的前两级
     */
    private function _getMenu($menus){
        $ret = array();        
        foreach($menus as $k=>$v){
            if($v['parent_id'] == 0){//第一级
                foreach($menus as $k1=>$v1){
                   if($v1['parent_id'] == $v['id']){
                       $v['children'][] = $v1;
                   }
                }
                $ret[]=$v;
            }
        }        
        return $ret;
    }
}