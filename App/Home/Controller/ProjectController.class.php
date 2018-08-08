<?php
/**
 * Created by PhpStorm.
 * User: Reload
 * Date: 2018/7/26
 * Time: 10:50
 * 项目管理控制器
 */
namespace Home\Controller;
use Think\Controller;
class ProjectController extends CommonController {

    //项目信息
    public function index() {
        $data = D('Project')->get_all();
        $user = D('User')->get_all($map="",$field="id,name");
        $user = array_column($user,'name','id');
        $cate = D('ProjectCate')->get_all();
        $cate = array_column($cate,'name','id');
        foreach($data as &$v) {
            $v['cate'] = $cate[$v['cate']];
            // $v['follow'] = $user[$v['follow']];
            $v['area_manager'] = $user[$v['area_manager']];
            $v['create'] = $user[$v['create']];
            $v['create_time'] = date('Y-m-d',$v['create_time']);
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
            if($v['status']==1) {
                $v['status']="新建";
            } elseif($v['status']==2) {
                $v['status']="立项";
            } elseif($v['status']==3) {
                $v['status']="招标";
            } elseif($v['status']==4) {
                $v['status']="实施";
            } elseif($v['status']==5) {
                $v['status']="验收";
            } elseif($v['status']==6) {
                $v['status']="完结";
            }
        }
        $map = array();
        $map['name'] = array('neq',"admin");
        $map['position'] = array(array('eq',"总经理"),array('eq',"副总"),array('eq',"总监"),array('eq',"区域经理"),array('eq',"项目经理"),array('eq',"项目组长"),'or');
        $director = D('User')->get_all($map,$field="id,name");
        //echo D('User')->_sql();die;
        $map['position'] = array(array('eq',"总经理"),array('eq',"副总"),array('eq',"总监"),array('eq',"区域经理"),'or');
        $manager = D('User')->get_all($map,$field="id,name");
        $this->assign('director',$director);
        $this->assign('manager',$manager);
        $this->assign('data',$data);
        $this->display();
    }

        //添加项目信息
    public function addProject() {
        if(IS_POST) {
            $postdata = I('post.');
            $create = $_SESSION['admin']['id'];
            $postdata['create'] = $create;
            $postdata['number'] = mt_rand(1000,9999);
            $postdata['create_time'] = time();
            $postdata['status'] = 1;
            if($postdata['expected_start_time']) {
                $postdata['expected_start_time'] = strtotime($postdata['expected_start_time']);
            }
            if($postdata['expected_finish_time']) {
                $postdata['expected_finish_time'] = strtotime($postdata['expected_finish_time']);
            }
            $res = D('Project')->addPro($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"添加成功");
            } else {
                $data = array('err'=>0,'msg'=>"添加失败");
            }
            $this->ajaxReturn($data);
        } else {
            $map['name'] = array('neq',"admin");
            $user = D('User')->get_all($map,$field="id,name");
            $cate = D('ProjectCate')->get_all();
            $this->assign('cate',$cate);
            $this->assign('user',$user);
            $this->display();
        }

    }

    //编辑项目信息
    public function editProject() {
        if(IS_POST) {
            $postdata = I('post.');
            if($postdata['expected_start_time']) {
                $postdata['expected_start_time'] = strtotime($postdata['expected_start_time']);
            }
            if($postdata['expected_finish_time']) {
                $postdata['expected_finish_time'] = strtotime($postdata['expected_finish_time']);
            }
            $res = D('Project')->editPro($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"编辑成功");
            } else {
                $data = array('err'=>0,'msg'=>"编辑失败");
            }
            $this->ajaxReturn($data);
        } else {
            $id = I('get.id');
            $map['id'] = $id;
            $info = D('Project')->get_one($map);
            if($info['expected_start_time']){
                $info['expected_start_time'] = date('Y-m-d H:i:s',$info['expected_start_time']);
            } else {
                $info['expected_start_time'] = '';
            }
            if($info['expected_finish_time']) {
                $info['expected_finish_time'] = date('Y-m-d H:i:s',$info['expected_finish_time']);
            } else {
                $info['expected_finish_time'] = '';
            }
            $map = array();
            $map['name'] = array('neq',"admin");
            $user = D('User')->get_all($map,$field="id,name");
            $cate = D('ProjectCate')->get_all();
            $this->assign('cate',$cate);
            $this->assign('user',$user);
            $this->assign('info',$info);
            $this->display();
        }
    }


    //删除
    public function delProject() {
        if(IS_POST) {
            $id = I('post.id');
            $map['id'] = $id;
            $res = D('Project')->delPro($map);
            if($res) {
                $data = array('err'=>1,'msg'=>"删除成功");
            } else {
                $data = array('err'=>0,'msg'=>"删除失败");
            }
            $this->ajaxReturn($data);
        }
    }

    //启动项目
    public function startUp() {
        if(IS_POST) {
            $postdata = I('post.');
            //print_r($postdata);die;
            if(!$postdata['actual_start_time']) {
                $postdata['actual_start_time'] = time();
            } else {
                $postdata['actual_start_time'] = strtotime($postdata['actual_start_time']);
            }
            $postdata['line'] = 1;
            //print_r($postdata);die;
            $res = D('Project')->editPro($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"启动成功");
            } else {
                $data = array('err'=>0,'msg'=>"启动失败");
            }
            $this->ajaxReturn($data);
        }
    }

    //结束项目
    public function ending() {
        if(IS_POST) {
            $postdata = I('post.');
            if(!$postdata['actual_finish_time']) {
                $postdata['actual_finish_time'] = time();
            } else {
                $postdata['actual_finish_time'] = strtotime($postdata['actual_finish_time']);
            }
            $postdata['line'] = 2;
            $postdata['status'] = 6;
           // print_r($postdata);die;
            $res = D('Project')->editPro($postdata);
            if ($res) {
                $data = array('err' => 1, 'msg' => "结束成功");
            } else {
                $data = array('err' => 0, 'msg' => "结束失败");
            }
            $this->ajaxReturn($data);
        }
    }


    //更改状态
    public function checkStatus() {
        if(IS_POST) {
            $id = I('post.id');
            $status = I('post.status');
            $map['id'] = $id;
            $data['status'] = $status;
            $res = D('Project')->checkStatus($map,$data);
            if($res) {
                $data = array('err'=>1,'msg'=>"状态更改成功");
            } else {
                $data = array('err'=>0,'msg'=>"状态更改失败");
            }
            $this->ajaxReturn($data);
        }
    }

}