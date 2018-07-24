<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>广东亚齐信息后台系统登录页</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <script src="/App/Home/Common/assets/js/jquery.min.js"></script>
     <script type="text/javascript" src="/App/Home/Common/common/js/jquery.md5.js"></script>
     <script type="text/javascript" src="/App/Home/Common/layer/layer.js"></script>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="/App/Home/Common/assets/css/signin.css" rel="stylesheet">

</head>

<body data-type="login">
<div class="" style="text-align:center; margin-top: 300px;">
    <h3 >亚齐信息后台管理系统</h3>
    <form class="" style="margin-top: 40px;">
        <div class="">
            用户名：<input type="text" class="" id="user-name" placeholder="UserName" style="border-radius: 3px;">

        </div>

        <div class="" style="margin-top: 10px;">
            密&nbsp&nbsp&nbsp&nbsp码：<input type="password" class="" id="password" placeholder="PassWord" style="border-radius: 3px;">

        </div>


        <div class=""style="margin-top: 10px;">

            <button type="button" style="border-radius: 3px; " class="am-btn">登录</button>

        </div>
    </form>

</div>
    <script type="text/javascript">

    $(function(){
        document.onkeydown = function(e){ 
            var ev = document.all ? window.event : e;
            if(ev.keyCode==13) {

                   $('.am-btn').click();

             }
        }
    });


            $('.am-btn').click(function(){
                var name = $('#user-name').val();
                var password = $.md5($('#password').val());
                //console.log(password);
                //console.log(name);return
                $.post('<?php echo U("Admin/checkLogin");?>',{
                    username:name,
                    password:password,
                },function(res){
                    // if(res.err==1){
                        // layer.msg(res.msg,function(){location.href="/"});
                    //}else{
                        // layer.msg(res.msg);
                    //}
                    if(res.err==1) {
                        location.href="/";
                    } else if(res.err==0) {
                        layer.msg("密码输入错误");
                    } else if(res.err==2) {
                        layer.msg("账号被禁用");
                    } else if(res.err==3) {
                        layer.msg("用户名不存在");
                    }
                    
                },'json')
            })
    </script>
</body>

</html>