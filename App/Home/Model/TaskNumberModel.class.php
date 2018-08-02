<?php
/*************************************************

提交任务数量模型 - the
Author: reload <18-8-2>

*************************************************/
namespace Home\Model;
use Think\Model\RelationModel;
class TaskNumberModel extends RelationModel {
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
    public function addNumber($data) {
        $res = $this->data($data)->add();
        return $res;
    }


}