<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/23
 * Time: 16:20
 */
namespace Home\Controller;
use Think\Controller;
class RulesController extends CommonController {
    public function index() {
        $data = D('Rules')->get_all($map='',$field='*',$page=1,$pagenum=999999);
        foreach($data as &$v) {
            $v['add_time'] = date('Y-m-d H:i:s',$v['add_time']);
        }
        $this->assign('data',$data);
        $this->display();
    }


    //添加
    public function addRules() {
        if(IS_POST) {
            $postdata = I('post.');
            $postdata['add_time'] = time();
            $res = D('Rules')->addRules($postdata);
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

    //编辑
    public function editRules() {
        if(IS_POST) {
            $postdata = I('post.');
            $postdata['id'] = I('post.id');
            $res = D('Rules')->editRules($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"编辑成功");
            } else {
                $data = array('err'=>0,'msg'=>"编辑失败");
            }
            $this->ajaxReturn($data);
        } else {
            $id = I('get.id');
            $map['id'] = $id;
            $info = D('Rules')->get_one($map);
            $this->assign('info',$info);
            $this->display();
        }
    }

    //删除
    public function delRules() {
        if(IS_POST) {
            $id = I('post.id');
            $map['id'] = $id;
            $res = D('Rules')->delRules($map);
            if($res) {
                $data = array('err'=>1,'msg'=>"删除成功");
            } else {
                $data = array('err'=>0,'msg'=>"删除失败");
            }
            $this->ajaxReturn($data);
        }
    }
}