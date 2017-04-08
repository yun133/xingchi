<?php
namespace Admin\Controller;
use Think\Controller;
class PrivilegeController extends BaseController {
    public function __construct(){
        parent::__construct();
        $this->assign('sel_name','权限管理');
    }
}