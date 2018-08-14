<?php
/**
 * Created by PhpStorm.
 * User: Reload
 * Date: 2018/8/14
 * Time: 17:37
 * 判空
 */
namespace Home\Controller;
use Think\Controller;

class EmptyController extends Controller{
    public function index(){
        //跳转或加载404页
        $this->display("Public/empty");
    }
}