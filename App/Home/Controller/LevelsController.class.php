<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/23
 * Time: 14:27
 * 员工级别控制器
 */
namespace Home\Controller;
use Think\Controller;
class LevelsController extends CommonController {
    public function index() {
        $data = D('Levels')->get_all($map="",$field='*',$page=1,$pagenum=999999);
        foreach($data as &$v) {
            $v['add_time'] = date('Y-m-d H:i:s',$v['add_time']);
        }
        $this->assign('data',$data);
        $this->display();
    }

        //添加级别
    public function addLevels() {
        if(IS_POST) {
            $postdata = I('post.');
            $postdata['add_time'] = time();
            $res = D('Levels')->addLevels($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"添加成功");
            } else {
                $data = array('err'=>0,'msg'=>"添加失败");
            }
            $this->ajaxReturn($data);
        } else {
            $this->display();
        }
    }

    //编辑级别
    public function editLevels() {
        if(IS_POST) {
            $postdata = I('post.');
            $res = D('Levels')->editLevels($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"编辑成功");
            } else {
                $data = array('err'=>0,'msg'=>"编辑失败");
            }
            $this->ajaxReturn($data);
        } else {
            $id = I('get.id');
            $map['id'] = $id;
            $info = D('Levels')->get_one($map);
            $this->assign('info',$info);
            $this->display();
        }
    }

    //删除
    public function delLevels() {
        if(IS_POST) {
            $id = I('post.id');
            $map['id'] = $id;
            $res = D('Levels')->delLevels($map);
            if($res) {
                $data = array('err'=>1,'msg'=>"删除成功");
            } else {
                $data = array('err'=>0,'msg'=>"删除失败");
            }
            $this->ajaxReturn($data);
        }
    }
}