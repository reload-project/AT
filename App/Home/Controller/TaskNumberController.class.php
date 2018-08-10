<?php
/**
 * Created by PhpStorm.
 * User: Reload
 * Date: 2018/8/6
 * Time: 11:49
 */
namespace Home\Controller;
use Think\Controller;
class TaskNumberController extends CommonController {
    public function index() {
    	$data = D('TaskNumber')->get_all();
        $user = D('User')->get_all($map,$field="id,name");
        $user = array_column($user,'name','id');
        $task = D('TaskInfo')->get_all($map,$field="id,name");
        $task = array_column($task,'name','id');
        $project = D('Project')->get_all($map,$field="id,name");
        $project = array_column($project,'name','id');
        foreach($data as &$v) {
            $v['user_id'] = $user[$v['user_id']];
            $v['task_num_id'] = $task[$v['task_num_id']];
            $v['pro_num_id'] = $project[$v['pro_num_id']];
            $v['add_time'] = date('Y-m-d H:i:s',$v['add_time']);
            $v['number_str'] = mb_substr($v['number_str'],0,100);
        }
    	$this->assign('data',$data);
    	$this->display();
	}


    public function showInfo() {
        $id = I('post.id');
        $map['id'] = $id;
        $taskInfo = D('TaskNumber')->get_one($map);
        if($taskInfo) {
            $taskInfo['number_str'] = json_decode($taskInfo['number_str']);
            $data = array('err'=>1,'data'=>$taskInfo);
            $this->ajaxReturn($data);
        }
    }
}