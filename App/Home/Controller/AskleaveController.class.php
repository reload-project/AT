<?php
/**
 * Created by PhpStorm.
 * User: Reload
 * Date: 2018/8/15
 * Time: 16:22
 * 考勤管理--请假信息控制器
 */
namespace Home\Controller;
use Think\Controller;
class AskleaveController extends CommonController {
    public function index() {
        $userId = $_SESSION['admin']['id'];
        if($userId!=1) {
            $map['user_id'] = $userId;
        }
        $data = D('Askleave')->get_all($map);
        $map = array();
        $user = D('User')->get_all($map,$field="id,name");
        $user = array_column($user,'name','id');
        $project = D('Project')->get_all($map,$field="id,name");
        $project = array_column($project,'name','id');
        foreach($data as &$v) {
            $v['user_id'] = $user[$v['user_id']];
            $v['project_id'] = $project[$v['project_id']];
            $v['apply_time'] = date('Y-m-d',$v['apply_time']);
            $v['induction_time'] = date('Y-m-d',$v['induction_time']);
            if($v['type']==1) {
                $v['type'] = '事假';
            } else if($v['type']==2) {
                $v['type'] = '病假';
            } else if($v['type']==3) {
                $v['type'] = '调休';
            } else if($v['type']==4) {
                $v['type'] = '年休假';
            } else if($v['type']==5) {
                $v['type'] = '其他';
            }
            $v['add_time'] = date('Y-m-d',$v['add_time']);
        }
        $this->assign('data',$data);
        $this->display();
    }

    public function addAsk() {
        $userId = $_SESSION['admin']['id'];
        if(IS_POST) {
            $postdata = I('post.');
            $postdata['askleave_time'] = '从 '.$postdata['apply_time'].' 到 '.$postdata['induction_time'];
            if($postdata['apply_time']) {
                $postdata['apply_time'] = strtotime($postdata['apply_time']);
            }
            if($postdata['induction_time']) {
                $postdata['induction_time'] = strtotime($postdata['induction_time']);
            }
            $askleave_time = sprintf("%.1f",($postdata['induction_time']-$postdata['apply_time'])/24/60/60);
            $floats = explode('.',$askleave_time);
            if($floats[1]<=0) {
                $floats[1] = 0;
            } else if(0<$floats[1] && $floats[1]<=5) {
                $floats[1] = 5;
            } else {
                $floats[1] = 0;
                $floats[0] = $floats[0]+1;
            }
            $askleave_time = implode('.',$floats);
            $postdata['day_number'] = $askleave_time.'天';
            unset($postdata['apply_time']);
            unset($postdata['induction_time']);
            if($postdata['pic']) {
                $res = R("Common/upload",array($postdata['pic']));
                if($res['err']==1) {
                    $postdata['pic'] = '/'.$res['pic'];
                }
            }
            $postdata['user_id'] = $userId;
            $postdata['add_time'] = time();
            //print_r($postdata);die;
            $res = D('Askleave')->addAsk($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"添加成功");
            } else {
                $data = array('err'=>0,'msg'=>"添加失败");
            }
            $this->ajaxReturn($data);
        } else {
            if($userId!=1) {
                $where['director'] = $userId;
                $where['area_manager'] = $userId;
                $where['_logic'] = 'or';
                $map['_complex'] = $where;
            }
            $project = D('Project')->get_all($map,$field='id,name');
            $this->assign('project',$project);
            $this->display();
        }
    }


    public function editAsk() {
        $userId = $_SESSION['admin']['id'];
        if(IS_POST) {
            $postdata = I('post.');
            $postdata['askleave_time'] = '从 '.$postdata['apply_time'].' 到 '.$postdata['induction_time'];
            if($postdata['apply_time']) {
                $postdata['apply_time'] = strtotime($postdata['apply_time']);
            }
            if($postdata['induction_time']) {
                $postdata['induction_time'] = strtotime($postdata['induction_time']);
            }
            $askleave_time = sprintf("%.1f",($postdata['induction_time']-$postdata['apply_time'])/24/60/60);
            $floats = explode('.',$askleave_time);
            if($floats[1]<=0) {
                $floats[1] = 0;
            } else if(0<$floats[1] && $floats[1]<=5) {
                $floats[1] = 5;
            } else {
                $floats[1] = 0;
                $floats[0] = $floats[0]+1;
            }
            $askleave_time = implode('.',$floats);
            $postdata['day_number'] = $askleave_time.'天';
            unset($postdata['apply_time']);
            unset($postdata['induction_time']);
            //print_r($postdata);die;
            if($postdata['pic']) {
                $res = R("Common/upload",array($postdata['pic']));
                if($res['err']==1) {
                    $postdata['pic'] = '/'.$res['pic'];
                }
            }
            $res = D('Askleave')->editAsk($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"编辑成功");
            } else {
                $data = array('err'=>0,'msg'=>"编辑失败");
            }
            $this->ajaxReturn($data);
        } else {
            $id = $_GET['id'];
            $map['id'] = $id;
            $info = D('Askleave')->get_one($map);
            $info['askleave_time'] = explode(' ',$info['askleave_time']);
            $one[] = $info['askleave_time'][1];
            $one[] = $info['askleave_time'][2];
            $two[] = $info['askleave_time'][4];
            $two[] = $info['askleave_time'][5];
            $info['apply_time'] = implode(' ',$one);
            $info['induction_time'] = implode(' ',$two);
            unset($info['askleave_time']);
            //print_r($info);die;
            $this->assign('info',$info);
            $map = array();
            if($userId!=1) {
                $where['director'] = $userId;
                $where['area_manager'] = $userId;
                $where['_logic'] = 'or';
                $map['_complex'] = $where;
            }
            $project = D('Project')->get_all($map,$field='id,name');
            $this->assign('project',$project);
            $this->display();
        }
    }


    public function delAsk() {
        if(IS_POST) {
            $id = I('post.id');
            $map['id'] = $id;
            $res = D('Askleave')->delAsk($map);
            if($res) {
                $data = array('err'=>1,'msg'=>"删除成功");
            } else {
                $data = array('err'=>0,'msg'=>"删除失败");
            }
            $this->ajaxReturn($data);
        }
    }

    public function showPic() {
        $id = I('post.id');
        $map['id'] = $id;
        $info = D('Askleave')->get_one($map);
        $this->ajaxReturn($info);
    }

}