<?php
/*************************************************

管理员控制器 - the
Author: reload <18-7-16> ***

*************************************************/
namespace Home\Controller;
use Think\Controller;
class MasterController extends CommonController {

    //管理员列表
    public function index() {
        //if(IS_POST) {

            /*if($res['keyword']) {
                $map['username'] = array('like','%'.$res['keyword'].'%');
            }
            if($res['role']) {
                $map['role_id'] = array('like','%'.$res['role'].'%');
            }*/
            $field = 'id,username,nickname,time_login_last,phone,status,role_id';
            //$count = D('Admin')->count($map="");
            $data = D('Admin')->get_all($map="",$field,$page=1,$pagenum=999999);
            foreach($data as $k => $v) {
                $data[$k]['time'] = date('Y-m-d H:i:s',$v['time_login_last']);
                $data[$k]['status'] = $v['status']==1?"正常":"禁用";
            }
            //print_r($data);die;
            //$this->ajaxReturn(array('status'=>'success','data'=>$data));
        //} else {
            $this->assign('data',$data);
            $this->display();
        //}
    }

    public function addMaster() {
        $this->display();
    }

    public function editMaster() {
        $id = I('get.id');
        $map['id'] = $id;
        $info = D('Admin')->get_one($map);
        $this->assign('id',$id);
        $this->assign('info',$info);
        $this->display();
    }

    //添加
    public function add_master() {
        if(IS_POST) {
            $postdata = I('post.');
            //print_r($postdata);die;
            $postdata['mixs'] = mt_rand(1,999999);
            $postdata['password'] = md5($postdata['password'].$postdata['mixs']);
            $postdata['time_login_last'] = time();
            $res = D('Admin')->add_master($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"添加成功");
            } else {
                $data = array('err'=>0,'msg'=>"添加失败");
            }
            $this->ajaxReturn($data);
        }
    }

    //编辑
    public function edit_master() {
        if(IS_POST) {
            $postdata = I('post.');
            $id = $postdata['id'];
            $map['id'] = $id;
            $data = D('Admin')->get_one($map);
            $postdata['password'] = md5($postdata['password'].$data['mixs']);
            $postdata['time_login_last'] = time();
            //print_r($postdata);die;
            $res = D('Admin')->edit_master($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"编辑成功");
            } else {
                $data = array('err'=>0,'msg'=>"编辑失败");
            }
            $this->ajaxReturn($data);
        }
    }



    //删除
    public function del_master() {
        if(IS_POST) {
            $id = I('post.id');
            $map['id'] = $id;
            $res = D('Admin')->del_master($map);
            if($res) {
                $data = array('err'=>1,'msg'=>"删除成功");
            } else {
                $data = array('err'=>0,'msg'=>"删除失败");
            }
            $this->ajaxReturn($data);
        }
    }


    //更改状态
    public function master_status() {
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
            $res = D('Admin')->master_status($map,$data);
            if($res) {
                $data = array('err'=>1,'msg'=>"状态更改成功");
            } else {
                $data = array('err'=>0,'msg'=>"状态更改失败");
            }
            $this->ajaxReturn($data);
        }
    }

}