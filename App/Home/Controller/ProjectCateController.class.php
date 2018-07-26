<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/26
 * Time: 11:07
 * 项目分类控制器
 */
namespace Home\Controller;
use Think\Controller;
class ProjectCateController extends CommonController {
    public function index() {
        $data = D('ProjectCate')->get_all();
        foreach($data as &$v) {
            $v['add_time'] = date('Y-m-d H:i:s',$v['add_time']);
        }
        $this->assign('data',$data);
        $this->display();
    }

    //添加项目分类
    public function addCate() {
        if(IS_POST) {
            $postdata['name'] = I('post.name');
            $postdata['add_time'] = time();
            $res = D('ProjectCate')->addCate($postdata);
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

    //编辑分类
    public function editCate() {
        if(IS_POST) {
            $postdata = I('post.');
            $res = D('ProjectCate')->editCate($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"编辑成功");
            } else {
                $data = array('err'=>0,'msg'=>"编辑失败");
            }
            $this->ajaxReturn($data);
        } else {
            $id = I('get.id');
            $map['id'] = $id;
            $info = D('ProjectCate')->get_one($map);
            $this->assign('info',$info);
            $this->display();
        }
    }

    //删除
    public function delCate() {
        if(IS_POST) {
            $id = I('post.id');
            $map['id'] = $id;
            $res = D('ProjectCate')->delCate($map);
            if($res) {
                $data = array('err'=>1,'msg'=>"删除成功");
            } else {
                $data = array('err'=>0,'msg'=>"删除失败");
            }
            $this->ajaxReturn($data);
        }
    }
}