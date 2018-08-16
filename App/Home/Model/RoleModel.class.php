<?php
/*************************************************

角色模型 - the
Author: reload <18-7-23>

*************************************************/
namespace Home\Model;
use Think\Model\RelationModel;
class RoleModel extends RelationModel {
    protected $_msg;
    protected $_err = 0;

    //获取多条数据
    public function get_all($map,$field='*',$page=1,$pagenum=999999,$order="add_time asc") {
        $data = $this->where($map)->limit(($page-1)*$pagenum,$pagenum)->field($field)->order($order)->select();
        return $data;
    }

    //获取单条数据
    public function get_one($map){
//         print_r($map);die;
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
    public function addDepart($data) {
        $res = $this->data($data)->add();
        return $res;
    }

    //编辑
    public function editDepart($data) {
        $res = $this->data($data)->save();
        return $res;
    }

    //删除
    public function delDepart($map) {
        $res = $this->where($map)->delete();
        return $res;
    }

}