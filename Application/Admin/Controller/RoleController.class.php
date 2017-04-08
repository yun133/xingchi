<?php
namespace Admin\Controller;
use Think\Controller;
class RoleController extends BaseController {
    public function __construct(){
        parent::__construct();
        $this->assign('sel_name','角色管理');
    }
}