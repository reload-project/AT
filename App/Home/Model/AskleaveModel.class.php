<?php
/*************************************************

考勤模块-》请假功能模型 - the
Author: reload <18-8-16>

*************************************************/
namespace Home\Model;
use Think\Model\RelationModel;
class AskleaveModel extends RelationModel {
    protected $_msg;
    protected $_err = 0;

    //获取多条数据
    public function get_all($map='',$field='*',$page=1,$pagenum=999999) {
        $data = $this->where($map)->limit(($page-1)*$pagenum,$pagenum)->field($field)->select();
        return $data;
    }

    //获取单条数据
    public function get_one($map){
         $res = $this->where($map)->find();
         if($res){
            return $res;
        }else{
            $this->_err=2;
            $this->_msg="未找到数据";
            return false;
        }
    }

    //添加
    public function addAsk($data) {
        $res = $this->data($data)->add();
        return $res;
    }

    //编辑
    public function editAsk($data) {
        $res = $this->data($data)->save();
        return $res;
    }

    //删除
    public function delAsk($map) {
        $res = $this->where($map)->delete();
        return $res;
    }


    public function err_msg(){
        return array('err'=>$this->_err,'msg'=>$this->_msg);
    }


}