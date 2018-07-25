<?php
/**
 * Created by PhpStorm.
 * User: Reload
 * Date: 2018/7/19
 * Time: 8:52
 * 用户管理器
 */
namespace Home\Controller;
use Org\Util\Date;
use Think\Controller;
use Think\Image;
use Think\Upload;

class UserController extends CommonController {
    //用户列表
    public function index() {
        $superUser = $_SESSION['admin']['name'];
        if($superUser!="admin") {

            $map['name'] = array('neq',"admin");
        }
        $data = D('User')->get_all($map,$field='*',$page=1,$pagenum=999999);
        $depart = D('Department')->get_all($map='',$field='id,depart',$page=1,$pagenum=999999);
        $depart = array_column($depart,'depart','id');
        $levels = D('Levels')->get_all($map='',$field='id,level');
        $levels = array_column($levels,'level','id');
        //print_r($depart);die;
        foreach($data as &$v) {
            $v['gender'] = $v['gender']==1?"男":"女";
            $v['add_time'] = date('Y-m-d H:i:s',$v['add_time']);
            $v['update_time'] = $v['update_time']?date('Y-m-d H:i:s',$v['update_time']):"未编辑";
            $v['depart'] = $depart[$v['depart']];
            if($v['level_id']) $v['level_id'] = $levels[$v['level_id']]."级";
            $v['status'] = $v['status']==1?"正常":"禁用";
        }
        $this->assign('data',$data);
        $this->display();
    }

    //添加用户
    public function addUser() {
        if(IS_POST) {
            $postdata = I('post.');
            if($postdata['password']) {
                $postdata['mixs'] = mt_rand(1,999999);
                $postdata['password'] = md5($postdata['password'].$postdata['mixs']);
            } else {
                $this->ajaxReturn(array('err'=>2,'msg'=>"密码不能为空"));
            }
            if($postdata['pic']) {
                $res = R("Common/upload",array($postdata['pic']));
                if($res['err']==1) {
                    $postdata['pic'] = '/'.$res['pic'];
                }
            }
            $postdata['add_time'] = time();
            //print_r($postdata);die;
            $res = D('User')->addUser($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"添加成功");
            } else {
                $data = array('err'=>0,'msg'=>"添加失败");
            }
            $this->ajaxReturn($data);
        } else {
            $levels = D('Levels')->get_all($map,$field='id,level');
            $depart = D('Department')->get_all($map='',$field="id,depart",$page=1,$pagenum=999999);
            $this->assign('depart',$depart);
            $this->assign('levels',$levels);
            $this->display();
        }

    }

    //编辑用户
    public function editUser() {
        if(IS_POST) {
            $postdata = I('post.');
            if($postdata['pic']) {
                $res = R("Common/upload",array($postdata['pic']));
                if($res['err']==1) {
                    $postdata['pic'] = '/'.$res['pic'];
                }
            }
            $postdata['update_time'] = time();
            $res = D('User')->editUser($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"编辑成功");
            } else {
                $data = array('err'=>0,'msg'=>"编辑失败");
            }
            $this->ajaxReturn($data);
        }
        $id = I('get.id');
        $map['id'] = $id;
        $info = D('User')->get_one($map);
        $depart = D('Department')->get_all($map='',$field="id,depart",$page=1,$pagenum=999999);
        $levels = D('Levels')->get_all($map='',$field='id,level');
        $this->assign('levels',$levels);
        $this->assign('depart',$depart);
        $this->assign('info',$info);
        $this->display();
    }

    //删除用户
    public function delUser() {
        if(IS_POST) {
            $id = I('post.id');
            $map['id'] = $id;
            $res = D('User')->delUser($map);
            if($res) {
                $data = array('err'=>1,'msg'=>"删除成功");
            } else {
                $data = array('err'=>0,'msg'=>"删除失败");
            }
            $this->ajaxReturn($data);
            
        }
    }


    //更改状态
    public function userStatus() {
        if(IS_POST) {
            $id = I('post.id');
            $status = I('post.status');
            if($status==1) {
                $status=0;
            } else if($status==0) {
                $status=1;
            }
            $map['id'] = $id;
            $data['status'] = $status;
            $res = D('User')->check_status($map,$data);
            if($res) {
                $data = array('err'=>1,'msg'=>"状态更改成功");
            } else {
                $data = array('err'=>0,'msg'=>"状态更改失败");
            }
            $this->ajaxReturn($data);
        }
    }

    //修改密码
    public function checkPass() {
        if(IS_POST) {
            $password = I('post.passOne');
            $id = $_SESSION['admin']['id'];
            //$passTwo = I('post.passTwo');
            $map['id'] = $id;
            $user = D('User')->get_one($map);
            $postdata['id'] = $id;
            $postdata['password'] = md5($password.$user['mixs']);
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
            $this->display();
        }
    }

}