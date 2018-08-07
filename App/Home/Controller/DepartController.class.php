<?php
/**
 * Created by PhpStorm.
 * User: Reload
 * Date: 2018/8/7
 * Time: 8:46
 * 部门管理控制器
 */
namespace Home\Controller;
use Think\Controller;
class DepartController extends CommonController {
    public function index() {
        $data = D('Depart')->get_all($map='',$field='*',$page=1,$pagenum=999999,$order="add_time desc");
        foreach($data as &$v) {
            $v['add_time'] = date('Y-m-d H:i:s',$v['add_time']);
        }

        //print_r($data);die;
        $this->assign('data',$data);
        $this->display();
    }

    //添加部门
    public function addDepart() {
        if(IS_POST) {
            $postdata = I('post.');
            $postdata['add_time'] = time();
            $res = D('Depart')->addDepart($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"添加成功");
            } else {
                $data = array('err'=>0,'msg'=>"添加失败");
            }
            $this->ajaxReturn($data);
        } else {
            $data = D('Depart')->get_all($map='',$field='id,name,parent_id',$page=1,$pagenum=999999);
            $this->assign('data',$data);
            $this->display();
        }
    }

    //编辑部门
    public function editDepart() {
        if(IS_POST) {
            $postdata = I('post.');
            // print_r($postdata);die;
            $res = D('Depart')->editDepart($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"编辑成功");
            } else {
                $data = array('err'=>0,'msg'=>"编辑失败");
            }
            $this->ajaxReturn($data);
        } else {
            $id = I('get.id');
            $map['id'] = $id;
            $info = D('Depart')->get_one($map);
            $data = D('Depart')->get_all($map='',$field='id,name,parent_id',$page=1,$pagenum=999999);
            $this->assign('data',$data);
            $this->assign('info',$info);
            $this->display();
        }
    }


    //删除部门
    public function delDepart() {
        if(IS_POST) {
            $id = I('post.id');
            $map['id'] = $id;
            $res = D('Depart')->delDepart($map);
            if($res) {
                $data = array('err'=>1,'msg'=>"删除成功");
            } else {
                $data = array('err'=>0,'msg'=>"删除失败");
            }
            $this->ajaxReturn($data);
        }
    }
}