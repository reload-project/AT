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


    //修改密码
    public function checkPass() {
        if(IS_POST) {
            $password = I('post.passOne');
            $id = $_SESSION['admin']['id'];
            //$passTwo = I('post.passTwo');
            $postdata['id'] = $id;
            if($password) {
                $postdata['mixs'] = mt_rand(1,999999);
                $postdata['password'] = md5($password.$postdata['mixs']);
            } else {
                $this->ajaxReturn(array('err'=>2,'msg'=>"密码不能为空"));
            }
            //$postdata['password'] = md5($password.$user['mixs']);
            //print_r($postdata);die;
            $res = D('User')->editUser($postdata);
            if($res) {
                session('[destroy]');
                $data = array('err'=>1,'msg'=>"密码修改成功");
            } else {
                $data = array('err'=>0,'msg'=>"密码修改失败");
            }
            $this->ajaxReturn($data);

        } else {
            $this->display("Public/checkPass");
        }
    }




}