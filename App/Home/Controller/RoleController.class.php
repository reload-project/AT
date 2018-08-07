<?php
/**
 * Created by PhpStorm.
 * User: reload
 * Date: 2018/7/23
 * Time: 9:16
 * 角色管理控制
 */
namespace Home\Controller;
use Think\Controller;
class RoleController extends CommonController {
    public function index() {
        $data = D('Role')->get_all($map='',$field='*',$page=1,$pagenum=999999,$order="add_time desc");
        //echo D('Department')->_sql();die;
        $rules = D('Rules')->get_all($map='',$field='id,rules',$page=1,$pagenum=999999);
        $rules = array_column($rules,'rules','id');
        foreach($data as &$v) {
            $v['add_time'] = date('Y-m-d H:i:s',$v['add_time']);
            $map = array();
            if($v['parent_id']==0) {
                $v['parent_id']="顶级";
            } else {
                $map['id'] = $v['parent_id'];
                $de = D('Role')->get_one($map);
                $v['parent_id'] = $de['depart'];
            }
            $rulesId = explode(',',$v['rules_id']);
            foreach($rulesId as &$vv) {
                $r = $rules[$vv];
                $v['rules'][] = $r;
            }
            $v['rules_id'] = implode(',',$v['rules']);
            unset($v['rules']);
        }

        //$res=self::tree($data);


        //print_r($data);die;
        //$this->assign('res',$res);
        $this->assign('data',$data);
        $this->display();
    }


    //定义一个空的数组
    static public $treeList = array();
    //接收$data二维数组,$pid默认为0，$level级别默认为1
    static public function tree($data,$pid=0,$level = 1){
        foreach($data as $v){
            if($v['parent_id']==$pid){
                $v['level']=$level;
                self::$treeList[]=$v;//将结果装到$treeList中
                self::tree($data,$v['id'],$level+1);
            }
        }
        return self::$treeList ;
    }




    //添加部门
    public function addDepart() {
        if(IS_POST) {
            $postdata = I('post.');
            //print_r($postdata);die;
            $postdata['add_time'] = time();
            $postdata['rules_id'] = implode(',',$postdata['rules_id']);
            //print_r($postdata);die;
            $res = D('Role')->addDepart($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"添加成功");
            } else {
                $data = array('err'=>0,'msg'=>"添加失败");
            }
            $this->ajaxReturn($data);
        } else {
            $rules = D('Rules')->get_all($map='',$field='id,rules',$page=1,$pagenum=999999);
            $data = D('Role')->get_all($map='',$field='id,depart,parent_id',$page=1,$pagenum=999999);
            $this->assign('data',$data);
            $this->assign('rules',$rules);
            $this->display();
        }
    }

    //编辑部门
    public function editDepart() {
        if(IS_POST) {
            $postdata = I('post.');
            $postdata['rules_id'] = implode(',',$postdata['rules_id']);
           // print_r($postdata);die;
            $res = D('Role')->editDepart($postdata);
            if($res) {
                $data = array('err'=>1,'msg'=>"编辑成功");
            } else {
                $data = array('err'=>0,'msg'=>"编辑失败");
            }
            $this->ajaxReturn($data);
        } else {
            $id = I('get.id');
            $map['id'] = $id;
            $info = D('Role')->get_one($map);
            $rules = D('Rules')->get_all($map='',$field='id,rules',$page=1,$pagenum=999999);
            //$rules = array_column($rules,'rules','id');
            $info['rules_id'] = explode(',',$info['rules_id']);
           // print_r($info);die;
            $data = D('Role')->get_all($map='',$field='id,depart,parent_id',$page=1,$pagenum=999999);
            $this->assign('data',$data);
            $this->assign('rules',$rules);
            $this->assign('info',$info);
            $this->display();
        }
    }

    //删除部门
    public function delDepart() {
        if(IS_POST) {
            $id = I('post.id');
            $map['id'] = $id;
            $res = D('Role')->delDepart($map);
            if($res) {
                $data = array('err'=>1,'msg'=>"删除成功");
            } else {
                $data = array('err'=>0,'msg'=>"删除失败");
            }
            $this->ajaxReturn($data);
        }
    }
}