<?php
/**
 * Created by PhpStorm.
 * User: Reload
 * Date: 2018/7/30
 * Time: 10:18
 */
namespace Home\Controller;

class TaskController extends CommonController {
    public function index() {
        $data = D('Task')->get_all();
        $project = D('Project')->get_all($map="",$field="id,name");
        $project = array_column($project,'name','id');
        $cate = D('ProjectCate')->get_all();
        $cate = array_column($cate,'name','id');
        foreach($data as &$v) {
            $v['add_time'] = date('Y-m-d H:i:s',$v['add_time']);
            $v['project_id'] = $project[$v['project_id']];
            $v['cate'] = $cate[$v['cate']];
        }
        $this->assign('data',$data);
        $this->display();
    }

    public function addTask() {
        if(IS_POST) {
            $postdata = I('post.');
            $postdata['number'] = mt_rand(1000,9999);
            $postdata['add_time'] = time();
            $res = D('Task')->addTask($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"添加成功");
            } else {
                $data = array('err'=>0,'msg'=>"添加失败");
            }
            $this->ajaxReturn($data);
        } else {
            $project = D('Project')->get_all($map="",$field="id,name");
            $this->assign('project',$project);
            $cate = D('ProjectCate')->get_all();
            $this->assign('cate',$cate);
            $this->display();
        }
    }

    public function editTask() {
        if(IS_POST) {
            $postdata = I('post.');
            $res = D('Task')->editTask($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"编辑成功");
            } else {
                $data = array('err'=>0,'msg'=>"编辑失败");
            }
            $this->ajaxReturn($data);
        } else {
            $id = $_GET['id'];
            $map['id'] = $id;
            $info = D('Task')->get_one($map);
            $this->assign('info',$info);
            $project = D('Project')->get_all($map="",$field="id,name");
            $this->assign('project',$project);
            $cate = D('ProjectCate')->get_all();
            $this->assign('cate',$cate);
            $this->display();
        }
    }

    public function delTask() {
        if(IS_POST) {
            $id = I('post.id');
            $map['id'] = $id;
            $res = D('Task')->delTask($map);
            if($res) {
                $data = array('err'=>1,'msg'=>"删除成功");
            } else {
                $data = array('err'=>0,'msg'=>"删除失败");
            }
            $this->ajaxReturn($data);
        }
    }
}