<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/26
 * Time: 10:50
 * 项目管理控制器
 */
namespace Home\Controller;
use Think\Controller;
class ProjectController extends CommonController {

    //项目信息
    public function index() {

        $this->display();
    }
}