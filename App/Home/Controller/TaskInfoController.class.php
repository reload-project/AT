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
        $name = $_SESSION['admin']['name'];
        $depart = $_SESSION['admin']['depart'];
        if($name != 'admin' && $depart == 2) {
            $map['user_id'] = array('like','%'.$name.'%');
        }
        $data = D('TaskInfo')->get_all($map);
        // echo D('TaskInfo')->_sql();die;
        //print_r($data);die;
        $map = array();
        /*$user = D('User')->get_all($map,$field="id,name");
        $user = array_column($user,'name','id');*/
        $task = D('Task')->get_all($map,$field="id,number");
        $task = array_column($task,'number','id');
        $project = D('Project')->get_all($map,$field="id,name");
        $project = array_column($project,'name','id');
        foreach($data as &$v) {
            // $v['user_id'] = $user[$v['user_id']];
            $v['task_num_id'] = $task[$v['task_num_id']];
            $v['pro_num_id'] = $project[$v['pro_num_id']];
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
            } else if($v['unit']==11) {
                $v['unit'] = "条";
            }
            $v['add_time'] = date('Y-m-d',$v['add_time']);
            if($v['expected_start_time']>0) {
                $v['expected_start_time'] = date('Y-m-d',$v['expected_start_time']);
            } else {
                $v['expected_start_time'] = "";
            }
            if($v['expected_finish_time']>0) {
                $v['expected_finish_time'] = date('Y-m-d',$v['expected_finish_time']);
            } else {
                $v['expected_finish_time'] = "";
            }

            if($v['actual_start_time']) {
                $v['actual_start_time'] = date('Y-m-d',$v['actual_start_time']);
            }
            if($v['actual_finish_time']) {
                $v['actual_finish_time'] = date('Y-m-d', $v['actual_finish_time']);
            }
            if($v['status']==0) {
                $v['status'] = "未启动";
            } else if($v['status']==1) {
                $v['status'] = "启动";
            } else if($v['status']==2) {
                $v['status'] = "结束";
            }
        }
        $this->assign('depart',$depart);
        $this->assign('data',$data);
        $this->display();
    }

    public function addTask() {
        if(IS_POST) {
            $postdata = I('post.');
            $map['id'] = $postdata['name'];
            $postdata['task_num_id'] = $postdata['name'];
            $tasks = D('Task')->get_one($map);
            $postdata['name'] = $tasks['name'];
            //print_r($postdata);die;
/*            $map['id'] = $postdata['task_num_id'];
            $task = D('Task')->get_one($map);
            $postdata['task_num_id'] = $task['number'];
            $map = array();
            $map['id'] = $postdata['pro_num_id'];
            $project = D('Project')->get_one($map);
            $postdata['pro_num_id'] = $project['number'];*/
            $postdata['number'] = mt_rand(1000,9999);
            if($postdata['expected_start_time']) {
                $postdata['expected_start_time'] = strtotime($postdata['expected_start_time']);
            }
            if($postdata['expected_finish_time']) {
                $postdata['expected_finish_time'] = strtotime($postdata['expected_finish_time']);
            }
            $postdata['add_time'] = time();
            //print_r($postdata);die;
            $res = D('TaskInfo')->addTask($postdata);
            //$res = 1;
            if($res) {
                //完成数量自增1
/*                $map = array();
                $map['id'] = $task['id'];
                $map['project_id'] = $project['id'];
                $tasks = D('Task')->get_one($map);
                print_r($tasks);die;
                if($tasks) {
                    $datas['id'] = $tasks['id'];
                    $datas['finish_count'] = $tasks['finish_count']+1;
                }
                D('Task')->editTask($datas);*/
                //print_r($tasks);die;
                $data = array('err'=>1,'msg'=>"添加成功");
            } else {
                $data = array('err'=>0,'msg'=>"添加失败");
            }
            $this->ajaxReturn($data);
        } else {
            $project = D('Project')->get_all($map,$field="id,name");
            $map['name'] = array('neq',"admin");
            $user = D('User')->get_all($map,$field="id,name");
            $tasks = D('Task')->get_all();
            $this->assign('project',$project);
            $this->assign('tasks',$tasks);
            $this->assign('user',$user);
            $this->display();
        }
    }

    public function editTask() {
        if(IS_POST) {
            $postdata = I('post.');
            $map['id'] = $postdata['name'];
            $postdata['task_num_id'] = $postdata['name'];
            $tasks = D('Task')->get_one($map);
            $postdata['name'] = $tasks['name'];
/*            $map['id'] = $postdata['task_num_id'];
            $task = D('Task')->get_one($map);
            $postdata['task_num_id'] = $task['number'];
            $map = array();
            $map['id'] = $postdata['pro_num_id'];
            $project = D('Project')->get_one($map);
            $postdata['pro_num_id'] = $project['number'];*/
            if($postdata['expected_start_time']) {
                $postdata['expected_start_time'] = strtotime($postdata['expected_start_time']);
            }
            if($postdata['expected_finish_time']) {
                $postdata['expected_finish_time'] = strtotime($postdata['expected_finish_time']);
            }
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
            if($info['expected_start_time']){
                $info['expected_start_time'] = date('Y-m-d',$info['expected_start_time']);
            } else {
                $info['expected_start_time'] = '';
            }
            if($info['expected_finish_time']) {
                $info['expected_finish_time'] = date('Y-m-d',$info['expected_finish_time']);
            } else {
                $info['expected_finish_time'] = '';
            }
            $map = array();
            $project = D('Project')->get_all($map,$field="id,name");
            $map = array();
            $map['name'] = array('neq',"admin");
            $user = D('User')->get_all($map,$field="id,name");
            $this->assign('user',$user);
            $this->assign('info',$info);
            $tasks = D('Task')->get_all();
            $this->assign('tasks',$tasks);
            $this->assign('project',$project);
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

    //启动
    public function startUp() {
        if(IS_POST) {
            $postdata = I('post.');
            if(!$postdata['actual_start_time']) {
                $postdata['actual_start_time'] = time();
            } else {
                $postdata['actual_start_time'] = strtotime($postdata['actual_start_time']);
            }
            $postdata['status'] = 1;
            //print_r($postdata);die;
            $res = D('TaskInfo')->editTask($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"启动成功");
            } else {
                $data = array('err'=>0,'msg'=>"启动失败");
            }
            $this->ajaxReturn($data);
        }
    }

    //结束
    public function ending() {
        if(IS_POST) {
            $postdata = I('post.');
            if(!$postdata['actual_finish_time']) {
                $postdata['actual_finish_time'] = time();
            } else {
                $postdata['actual_finish_time'] = strtotime($postdata['actual_finish_time']);
            }
            $postdata['status'] = 2;
            $res = D('TaskInfo')->editTask($postdata);
            if ($res) {
                $data = array('err' => 1, 'msg' => "结束成功");
            } else {
                $data = array('err' => 0, 'msg' => "结束失败");
            }
            $this->ajaxReturn($data);
        }
    }

    //任务提交数量页面
    public function taskNumber() {
        if(IS_POST) {
            $name = $_SESSION['admin']['name'];
            $postdata = I('post.');
            $data = array();
            foreach($postdata['result'] as $k=>$v) {
                $data[$k]['pro_num_id'] = $postdata['pro_num_id'];
                $data[$k]['result'] = $v;
                $data[$k]['number'] = $postdata['number'][$k];
            }
            $map['user_id'] = array('like','%'.$name.'%');
            $tasks = D('TaskInfo')->get_all($map,$field="id,name");
            $tasks = array_column($tasks,'id','name');
            foreach($data as $k=>$v) {
                $datas['user_id'] = $name;
                $datas['pro_num_id'] = $v['pro_num_id'];
                $datas['task_num_id'] = $tasks[$v['number']];
                $datas['amount'] = $v['result'];
                $datas['add_time'] = time();
                $map['id'] = $datas['task_num_id'];
                $map['pro_num_id'] = $datas['pro_num_id'];
                $taskInfo = D('TaskInfo')->get_one($map);
                $da['id'] = $taskInfo['id'];
                $da['finish_count'] = $taskInfo['finish_count']+$datas['amount'];
                D('TaskInfo')->editTask($da);
                $res = D('TaskNumber')->addNumber($datas);
            }
            if($res) {
                $datasss = array('err'=>1,'msg'=>"添加成功");
            } else {
                $datasss = array('err'=>0,'msg'=>"添加失败");
            }
            $this->ajaxReturn($datasss);


        } else {
            $userId = $_SESSION['admin']['id'];
            $name = $_SESSION['admin']['name'];
            $map['user_id'] = array('like','%'.$name.'%');
            $tasks = D('TaskInfo')->get_all($map,$field="id,name,number,pro_num_id");
            $map = array();
            $map['director'] = $userId;
            $project = D('Project')->get_all($map,$field="id,name,number");
            $this->assign('project',$project);
            $this->assign('tasks',$tasks);
            $this->display();
        }
    }

}