<?php
/*************************************************

公共控制器 - the
Author: reload <18-7-16>

 *************************************************/
namespace Home\Controller;//命名空间,防止类名相同冲突
use Think\Controller;//文件引用
class CommonController extends Controller {
    public function _initialize(){

        if(empty($_SESSION['admin'])){
            header("location:".U('Admin/login'));
        }
        //权限规则
        session_start();
        $admin = $_SESSION['admin'];
        $map['id'] = $admin['depart'];
        $department = D('Role')->get_one($map);
        $arr = explode(',',$department['rules_id']);
        foreach($arr as &$v) {
            $map['id'] = $v;
            $rules[] = D('Rules')->get_one($map);

        }
        session('rules',$rules);
        $ruless = session('rules');
        //$path = CONTROLLER_NAME."/".ACTION_NAME;  //Index/index
        $controller = CONTROLLER_NAME;  //Index
        $rr[] = 'Index';
        foreach($ruless as $k => $v) {
            $userRules = FALSE;
            $r = explode('/',$v['url']);
            $rr[] = $r[0];
            if(!in_array($controller,$rr)) {
                $userRules = TRUE;
            }

        }
        //print_r($ruless);die;
        if($userRules == TRUE) {
            header("location:".U("Index/noData"));
        }
        //$this->assign('path',$path);
        $this->assign('controller',$controller);
        $this->assign('rr',$rr);
    }


    //上传图片
    public function upload($file){
        // $path = I('post.path'); //路径
        // $file = I('post.file'); //文件base64
        //图片处理
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $file, $result)){
            $type = $result[2];
            $new_file = "Public/upload/";
            if(!file_exists($new_file))
            {
                //检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir($new_file, 0777);
            }
            $new_file = $new_file.time().".{$type}";
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $file)))){//base64转码

                $data = array('err'=>1,'msg'=>'上传成功！','pic'=>$new_file);

            }else{
                $data = array('err'=>0,'msg'=>'图片上传失败');
            }
        }
        return $data;
    }


}
