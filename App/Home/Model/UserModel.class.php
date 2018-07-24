<?php
/*************************************************

用户模型 - the
Author: reload <18-7-17>

*************************************************/
namespace Home\Model;
use Think\Model\RelationModel;
class UserModel extends RelationModel {
    protected $_msg;
    protected $_err = 0;

    //获取多条数据
    public function get_all($map,$field='*',$page=1,$pagenum=999999) {
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
    public function addUser($data) {
        $res = $this->data($data)->add();
        return $res;
    }

    //编辑
    public function editUser($data) {
        $res = $this->data($data)->save();
        return $res;
    }

    //删除
    public function delUser($map) {
        $res = $this->where($map)->delete();
        return $res;
    }

    //更改状态
    public function check_status($map,$data) {
        $res = $this->where($map)->data($data)->save();
        return $res;
    }


    public function err_msg(){
        return array('err'=>$this->_err,'msg'=>$this->_msg);
    }

    //计算总数
    public function count($map) {
        $res = M('User')->where($map)->count();
        return $res;
    }

}