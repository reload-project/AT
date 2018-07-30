<?php
/**
 * Created by PhpStorm.
 * User: Reload
 * Date: 2018/7/16
 * Time: 10:20
 */
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $this->display();
    }

    public function noData() {
        $this->display("Public/empty");
    }

}