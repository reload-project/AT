<?php
/**
 * Created by PhpStorm.
 * User: Reload
 * Date: 2018/7/30
 * Time: 15:38
 */
namespace Home\Controller;

class TaskInfoController extends CommonController {
    public function index() {
        $data = D('TaskInfo')->get_all();
        foreach($data as &$v) {
            if($v['unit']==1) {
                $v['unit'] = "页";
            } else if($v['unit']==2) {
                $v['unit'] = "件";
            } else if($v['unit']==3) {
                $v['unit'] = "卷";
            } else if($v['unit']==4) {
                $v['unit'] = "盒";
            } else if($v['unit']==5) {
                $v['unit'] = "户";
            } else if($v['unit']==6) {
                $v['unit'] = "张";
            } else if($v['unit']==7) {
                $v['unit'] = "册";
            } else if($v['unit']==8) {
                $v['unit'] = "天";
            } else if($v['unit']==9) {
                $v['unit'] = "箱";
            } else if($v['unit']==10) {
                $v['unit'] = "套";
            }
            $v['add_time'] = date('Y-m-d H:i:s',$v['add_time']);
            $v['expected_start_time'] = date('Y-m-d H:i:s',$v['expected_start_time']);
            $v['expected_finish_time'] = date('Y-m-d H:i:s',$v['expected_finish_time']);
            if($v['status']==0) {
                $v['status'] = "未启动";
            } else if($v['status']==1) {
                $v['status'] = "启动";
            } else if($v['status']==2) {
                $v['status'] = "结束";
            }
        }
        $this->assign('data',$data);
        $this->display();
    }

    public function addTask() {
        if(IS_POST) {
            $postdata = I('post.');
            $map['id'] = $postdata['task_num_id'];
            $task = D('Task')->get_one($map);
            $postdata['task_num_id'] = $task['number'];
            $map = array();
            $map['id'] = $task['project_id'];
            $project = D('Project')->get_one($map);
            $postdata['pro_num_id'] = $project['number'];
            $postdata['number'] = mt_rand(1000,9999);
            $postdata['expected_start_time'] = strtotime($postdata['expected_start_time']);
            $postdata['expected_finish_time'] = strtotime($postdata['expected_finish_time']);
            $postdata['add_time'] = time();
            $res = D('TaskInfo')->addTask($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"添加成功");
            } else {
                $data = array('err'=>0,'msg'=>"添加失败");
            }
            $this->ajaxReturn($data);
        } else {
            $tasks = D('Task')->get_all();
            $this->assign('tasks',$tasks);
            $this->display();
        }
    }

    public function editTask() {
        if(IS_POST) {
            $postdata = I('post.');
            $map['id'] = $postdata['task_num_id'];
            $task = D('Task')->get_one($map);
            $postdata['task_num_id'] = $task['number'];
            $map = array();
            $map['id'] = $task['project_id'];
            $project = D('Project')->get_one($map);
            $postdata['pro_num_id'] = $project['number'];
            $postdata['expected_start_time'] = strtotime($postdata['expected_start_time']);
            $postdata['expected_finish_time'] = strtotime($postdata['expected_finish_time']);
            $res = D('TaskInfo')->editTask($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"编辑成功");
            } else {
                $data = array('err'=>0,'msg'=>"编辑失败");
            }
            $this->ajaxReturn($data);
        } else {
            $id = $_GET['id'];
            $map['id'] = $id;
            $info = D('TaskInfo')->get_one($map);
            $info['expected_start_time'] = date('Y-m-d H:i:s',$info['expected_start_time']);
            $info['expected_finish_time'] = date('Y-m-d H:i:s',$info['expected_finish_time']);
            $this->assign('info',$info);
            $tasks = D('Task')->get_all();
            $this->assign('tasks',$tasks);
            $this->display();
        }
    }

    public function delTask() {
        if(IS_POST) {
            $id = I('post.id');
            $map['id'] = $id;
            $res = D('taskInfo')->delTask($map);
            if($res) {
                $data = array('err'=>1,'msg'=>"删除成功");
            } else {
                $data = array('err'=>0,'msg'=>"删除失败");
            }
            $this->ajaxReturn($data);
        }
    }
}