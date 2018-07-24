<?php
/*************************************************

登录控制器 - the
Author: reload <18-7-16>

*************************************************/
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {

    /**
    * 默认显示登录页
    **/
    public function login()
    {
        $this->display();
    }

    //验证登录
    public function checkLogin(){
        $username = I('post.username');
        $password = I('post.password');
        $map['name'] = $username;
        $res = D('User')->get_one($map);
        if(!$res){
            $data = array('err'=>3,'msg'=>"用户名不存在");
        }else{
            if($res['status']==1) {
               if(md5($password.$res['mixs']) == $res['password']){
                    $_SESSION['admin']['id'] = $res['id'];
                    $_SESSION['admin']['name'] = $res['name'];
                    $_SESSION['admin']['relation'] = $res['relation'];
                    $_SESSION['admin']['depart'] = $res['depart'];
                    $_SESSION['admin']['nickname'] = $res['nickname'];
                    $_SESSION['admin']['gender'] = $res['gender'];
                    $_SESSION['admin']['national'] = $res['national'];
                    $_SESSION['admin']['phone'] = $res['phone'];
                    $_SESSION['admin']['email'] = $res['email'];
                    $_SESSION['admin']['position'] = $res['position'];
                    $_SESSION['admin']['pic'] = $res['pic'];
                    $_SESSION['admin']['address'] = $res['address'];
                    $_SESSION['admin']['school'] = $res['school'];
                    $_SESSION['admin']['status'] = $res['status'];
                    $_SESSION['admin']['add_time'] = $res['add_time'];
                    $_SESSION['admin']['update_time'] = $res['update_time'];
                    $_SESSION['admin']['level_id'] = $res['level_id'];
                    $data = array('err'=>1,'msg'=>"登陆成功");
               }else{
                    $data = array('err'=>0,'msg'=>"密码错误");
               }
            } else {
                $data = array('err'=>2,'msg'=>"账号被禁用");
            }
        }
        $this->ajaxReturn($data);

    }

    /**
     * 退出登录
    */
    public function outLogin()
    {
        session('[destroy]');
        header("location:".U('Admin/login'));
    }

}