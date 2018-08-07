<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>亚齐信息管理系统</title>
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <link href="/App/Home/Common/assets/css/material-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/App/Home/Common/assets/materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="/App/Home/Common/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="/App/Home/Common/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="/App/Home/Common/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="/App/Home/Common/assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->
    <link href="/App/Home/Common/assets/css/open-sans.css" rel="stylesheet" />
    <link rel="stylesheet" href="/App/Home/Common/assets/js/Lightweight-Chart/cssCharts.css">
    <script src="/App/Home/Common/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/App/Home/Common/layer/layer.js"></script>
    


</head>

<body>
<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand waves-effect waves-dark" href="/"><i class="large material-icons">track_changes</i> <strong>亚齐信息管理系统</strong></a>

            <div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <!--<li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown4"><i class="fa fa-envelope fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown3"><i class="fa fa-tasks fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown2"><i class="fa fa-bell fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>-->
            <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> 欢迎您：<b><?php echo ($_SESSION['admin']['name']); ?></b> <i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </nav>
    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
        <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>
        </li>-->
        <li><a href="<?php echo U('User/checkPass');?>"><i class="fa fa-gear fa-fw"></i> 修改密码</a>
        </li>
        <li><a href="<?php echo U('Admin/outLogin');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
        </li>
    </ul>
    <!--<ul id="dropdown2" class="dropdown-content w250">
      <li>
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 min</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 min</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 min</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 min</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 min</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
    </ul>
    <ul id="dropdown3" class="dropdown-content dropdown-tasks w250">
    <li>
            <a href="#">
                <div>
                    <p>
                        <strong>Task 1</strong>
                        <span class="pull-right text-muted">60% Complete</span>
                    </p>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                            <span class="sr-only">60% Complete (success)</span>
                        </div>
                    </div>
                </div>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="#">
                <div>
                    <p>
                        <strong>Task 2</strong>
                        <span class="pull-right text-muted">28% Complete</span>
                    </p>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
                            <span class="sr-only">28% Complete</span>
                        </div>
                    </div>
                </div>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="#">
                <div>
                    <p>
                        <strong>Task 3</strong>
                        <span class="pull-right text-muted">60% Complete</span>
                    </p>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                            <span class="sr-only">60% Complete (warning)</span>
                        </div>
                    </div>
                </div>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="#">
                <div>
                    <p>
                        <strong>Task 4</strong>
                        <span class="pull-right text-muted">85% Complete</span>
                    </p>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                            <span class="sr-only">85% Complete (danger)</span>
                        </div>
                    </div>
                </div>
            </a>
        </li>
        <li class="divider"></li>
        <li>
    </ul>
    <ul id="dropdown4" class="dropdown-content dropdown-tasks w250 taskList">
      <li>
                                    <div>
                                        <strong>John Doe</strong>
                                        <span class="pull-right text-muted">
                                            <em>Today</em>
                                        </span>
                                    </div>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                    <div>
                                        <strong>John Smith</strong>
                                        <span class="pull-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                                    </div>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</p>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <strong>John Smith</strong>
                                        <span class="pull-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                                    </div>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the...</p>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>Read All Messages</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
    </ul>  -->
    <!--/. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <a class="" href="javascript:"><i class=""></i>Page & AT </a>
                </li>
                <!--<li>
                    <a class=" <?php if(CONTROLLER_NAME == 'Master'): ?>active-menu<?php endif; ?>  waves-effect waves-dark" href="<?php echo U('Master/index');?>"><i class="fa fa-dashboard"></i> 管理员</a>
                </li>-->
<!--                <?php if((in_array('User',$rr))): ?><li>
                    <a href="<?php echo U('User/index');?>" class=" <?php if(CONTROLLER_NAME == 'User'): ?>active-menu<?php endif; ?>  waves-effect waves-dark"><i class="fa fa-desktop"></i> 员工管理</a>
                </li><?php endif; ?>
                <?php if((in_array('Levels',$rr))): ?><li>
                    <a href="<?php echo U('Levels/index');?>" class=" <?php if(CONTROLLER_NAME == 'Levels'): ?>active-menu<?php endif; ?>  waves-effect waves-dark"><i class="fa fa-desktop"></i> 员工级别</a>
                </li><?php endif; ?>
                <?php if((in_array('Department',$rr))): ?><li>
                    <a href="<?php echo U('Department/index');?>" class=" <?php if(CONTROLLER_NAME == 'Department'): ?>active-menu<?php endif; ?> waves-effect waves-dark"><i class="fa fa-bar-chart-o"></i> 部门管理</a>
                </li><?php endif; ?>
                <?php if((in_array('Rules',$rr))): ?><li>
                    <a href="<?php echo U('Rules/index');?>" class=" <?php if(CONTROLLER_NAME == 'Rules'): ?>active-menu<?php endif; ?> waves-effect waves-dark"><i class="fa fa-bar-chart-o"></i> 规则管理</a>
                </li><?php endif; ?>-->
                <?php if((in_array('User',$rr)) || (in_array('Levels',$rr)) || (in_array('Role',$rr)) || (in_array('Rules',$rr)) || (in_array('Depart',$rr))): if($controller == 'User' || $controller == 'Levels' || $controller == 'Role' || $controller == 'Rules' || $controller == 'Depart'): ?><li class="active">
                        <?php else: ?>
                        <li><?php endif; ?>
                        <a href="javascript:;" class="  <?php if(CONTROLLER_NAME == 'Role'): ?>active-menu<?php endif; ?>  <?php if(CONTROLLER_NAME == 'User'): ?>active-menu<?php endif; ?>  <?php if(CONTROLLER_NAME == 'Levels'): ?>active-menu<?php endif; ?>  <?php if(CONTROLLER_NAME == 'Depart'): ?>active-menu<?php endif; ?>  <?php if(CONTROLLER_NAME == 'Rules'): ?>active-menu<?php endif; ?>  waves-effect waves-dark"><i class="fa fa-sitemap"></i> 员工管理<span class="fa arrow"></span></a>
                    <?php if($controller == 'User' || $controller == 'Levels' || $controller == 'Role' || $controller == 'Rules' || $controller == 'Depart'): ?><ul class="nav nav-second-level collapse in ">
                    <?php else: ?>
                        <ul class="nav nav-second-level"><?php endif; ?>
                            <?php if((in_array('User',$rr))): ?><li>
                                    <a href="<?php echo U('User/index');?>" class=" <?php if(CONTROLLER_NAME == 'User'): ?>active-menu<?php endif; ?>  "> 员工资料</a>
                                </li><?php endif; ?>
                    <?php if((in_array('Depart',$rr))): ?><li>
                            <a href="<?php echo U('Depart/index');?>" class=" <?php if(CONTROLLER_NAME == 'Depart'): ?>active-menu<?php endif; ?> "> 部门管理</a>
                        </li><?php endif; ?>
                            <?php if((in_array('Levels',$rr))): ?><li>
                                    <a href="<?php echo U('Levels/index');?>" class=" <?php if(CONTROLLER_NAME == 'Levels'): ?>active-menu<?php endif; ?> "> 员工级别</a>
                                </li><?php endif; ?>
                            <?php if((in_array('Role',$rr))): ?><li>
                                    <a href="<?php echo U('Role/index');?>" class=" <?php if(CONTROLLER_NAME == 'Role'): ?>active-menu<?php endif; ?>"> 角色管理</a>
                                </li><?php endif; ?>
                            <?php if((in_array('Rules',$rr))): ?><li>
                                    <a href="<?php echo U('Rules/index');?>" class=" <?php if(CONTROLLER_NAME == 'Rules'): ?>active-menu<?php endif; ?>"> 规则管理</a>
                                </li><?php endif; ?>
                        </ul>
                    </li><?php endif; ?>
            <?php if((in_array('Project',$rr)) || (in_array('ProjectCate',$rr)) || (in_array('Task',$rr)) || (in_array('TaskInfo',$rr)) || (in_array('TaskNumber',$rr))): if($controller == 'Project' || $controller == 'ProjectCate' || $controller == 'Task' || $controller == 'TaskInfo' || $controller == 'TaskNumber'): ?><li class="active">
                        <?php else: ?>
                    <li><?php endif; ?>
                    <a href="javascript:;" class="waves-effect <?php if(CONTROLLER_NAME == 'TaskNumber'): ?>active-menu<?php endif; ?> <?php if(CONTROLLER_NAME == 'Project'): ?>active-menu<?php endif; ?>  <?php if(CONTROLLER_NAME == 'ProjectCate'): ?>active-menu<?php endif; ?> <?php if(CONTROLLER_NAME == 'TaskInfo'): ?>active-menu<?php endif; ?> <?php if(CONTROLLER_NAME == 'Task'): ?>active-menu<?php endif; ?>  waves-dark"><i class="fa fa-sitemap"></i> 项目管理<span class="fa arrow"></span></a>
                <?php if($controller == 'Project' || $controller == 'ProjectCate' || $controller == 'Task' || $controller == 'TaskInfo' || $controller == 'TaskNumber'): ?><ul class="nav nav-second-level collapse in ">
                <?php else: ?>
                    <ul class="nav nav-second-level"><?php endif; ?>
                    <?php if((in_array('Project',$rr))): ?><li>
                            <a href="<?php echo U('Project/index');?>" class=" <?php if(CONTROLLER_NAME == 'Project'): ?>active-menu<?php endif; ?> " >项目信息</a>
                        </li><?php endif; ?>
                    <?php if((in_array('ProjectCate',$rr))): ?><li>
                            <a href="<?php echo U('ProjectCate/index');?>" class=" <?php if(CONTROLLER_NAME == 'ProjectCate'): ?>active-menu<?php endif; ?> " >项目分类</a>
                        </li><?php endif; ?>
                    <?php if((in_array('Task',$rr))): ?><li>
                            <a href="<?php echo U('Task/index');?>" class=" <?php if(CONTROLLER_NAME == 'Task'): ?>active-menu<?php endif; ?> " >任务名称</a>
                        </li><?php endif; ?>
                <?php if((in_array('TaskInfo',$rr))): ?><li>
                        <a href="<?php echo U('TaskInfo/index');?>" class=" <?php if(CONTROLLER_NAME == 'TaskInfo'): ?>active-menu<?php endif; ?> " >任务信息</a>
                    </li><?php endif; ?>
                <?php if((in_array('TaskNumber',$rr))): ?><li>
                        <a href="<?php echo U('TaskNumber/index');?>" class=" <?php if(CONTROLLER_NAME == 'TaskNumber'): ?>active-menu<?php endif; ?> " >完成数量</a>
                    </li><?php endif; ?>
                    </ul>

                </li><?php endif; ?>
            </ul>

        </div>

    </nav>
    
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >

            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-action">
                                编辑用户
                            </div>
                            <div class="card-content">
                                <form class="col s12">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            姓名:<input id="name" type="text" class="validate" value="<?php echo ($info["name"]); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            昵称:<input id="nickname" type="text" class="validate" value="<?php echo ($info["nickname"]); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="select-field col s6">
                                            角色:<select class="form-control" id="depart">
                                            <option value="">选择角色</option>
                                            <?php if(is_array($depart)): foreach($depart as $key=>$v): ?><option <?php if($v[id] == $info[depart]): ?>selected<?php endif; ?> value="<?php echo ($v["id"]); ?>"><?php echo ($v['depart']); ?></option><?php endforeach; endif; ?>
                                        </select>
                                        </div>
                                    </div>
<!--                                    <div class="row">
                                        <div class="input-field col s6">
                                            性别:<input id="gender" type="text" class="validate">
                                        </div>
                                    </div>-->
                                    <div class="row">
                                        <div class="input-field col s6">
                                            性别:
                                            <p>
                                                <input name="gender" type="radio" <?php if($info["gender"] == 1): ?>checked<?php endif; ?> value="1" id="test1" />
                                                <label for="test1">男</label>
                                            </p>
                                            <p>
                                                <input name="gender" type="radio" <?php if($info["gender"] == 2): ?>checked<?php endif; ?>  value="2" id="test2" />
                                                <label for="test2">女</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            民族:<input id="national" type="text" class="validate" value="<?php echo ($info["national"]); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="select-field col s6">
                                            部门:<select class="form-control" id="department">
                                            <option value="">选择部门</option>
                                            <?php if(is_array($department)): foreach($department as $key=>$v): ?><option <?php if($v[id] == $info[department]): ?>selected<?php endif; ?> value="<?php echo ($v["id"]); ?>"><?php echo ($v['name']); ?></option><?php endforeach; endif; ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            职位:<input id="position" type="text" class="validate" value="<?php echo ($info["position"]); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="select-field col s6">
                                            员工关系:<select class="form-control" id="relation">
                                            <option value="">选择</option>
                                            <option <?php if($info["relation"] == '全日制合同工'): ?>selected<?php endif; ?> value="全日制合同工">全日制合同工</option>
                                            <option <?php if($info["relation"] == '非全日制合同工'): ?>selected<?php endif; ?> value="非全日制合同工">非全日制合同工</option>
                                            <option <?php if($info["relation"] == '实习生'): ?>selected<?php endif; ?> value="实习生">实习生</option>
                                            <option <?php if($info["relation"] == '暑假工'): ?>selected<?php endif; ?> value="暑假工">暑假工</option>
                                            <option <?php if($info["relation"] == '劳务派遣'): ?>selected<?php endif; ?> value="劳务派遣">劳务派遣</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="select-field col s6">
                                            员工级别:<select class="form-control" id="level">
                                            <option value="">选择级别</option>
                                            <?php if(is_array($levels)): foreach($levels as $key=>$v): ?><option <?php if($v[id] == $info[level]): ?>selected<?php endif; ?> value="<?php echo ($v["id"]); ?>"><?php echo ($v['level']); ?>级</option><?php endforeach; endif; ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            手机号:<input id="phone" type="text" class="validate" value="<?php echo ($info["phone"]); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            邮箱:<input id="email" type="text" class="validate" value="<?php echo ($info["email"]); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            住址:<input id="address" type="text" class="validate" value="<?php echo ($info["address"]); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            学历:<input id="school" type="text" class="validate" value="<?php echo ($info["school"]); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">

                                            <div id="img">
                                                <img id="pic" src="<?php echo ($info["pic"]); ?>" width="200px;" pod="0">
                                            </div>
                                            <input id="myfile" type="file" multiple="" onclick="checkPod()"/>


                                        </div>
                                    </div>
                                    <div class="btn " role="group" aria-label="..." onclick="editMaster()">
                                        提交

                                    </div>
                                </form>
                                <div class="clearBoth"></div>
                            </div>
                        </div>
                    </div>
                 </div>

            </div>
             <!-- /. PAGE INNER  -->
        </div>



</div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="/App/Home/Common/assets/js/jquery-1.10.2.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="/App/Home/Common/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="/App/Home/Common/assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- Bootstrap Js -->
    <script src="/App/Home/Common/assets/js/bootstrap.min.js"></script>

    <script src="/App/Home/Common/assets/materialize/js/materialize.min.js"></script>

    <!-- Metis Menu Js -->
    <script src="/App/Home/Common/assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="/App/Home/Common/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="/App/Home/Common/assets/js/morris/morris.js"></script>


    <script src="/App/Home/Common/assets/js/easypiechart.js"></script>
    <script src="/App/Home/Common/assets/js/easypiechart-data.js"></script>

    <script src="/App/Home/Common/assets/js/Lightweight-Chart/jquery.chart.js"></script>

    <!-- Custom Js -->
    <script src="/App/Home/Common/assets/js/custom-scripts.js"></script>


    
    <script src="/App/Home/Common/assets/js/filereader.js"></script>
    <script>
        $('#myfile').filereader({
            type:['jpg','jpeg','png'],
            max_size:1024,
            preview:$('#img'),
            success:function(){},
            preview_attr:{id:'pic', height:'200px'}
        });

        function checkPod() {
            $("#pic").attr("pod","1");
        }

    </script>
    <script type="text/javascript">
        function editMaster() {
            var id = "<?php echo ($_GET['id']); ?>";
            var name = $("#name").val();
            var nickname = $("#nickname").val();
            var gender = $('input[name="gender"]:checked').val();
            var national = $("#national").val();
            var position = $("#position").val();
            var phone = $("#phone").val();
            var email = $("#email").val();
            var address = $("#address").val();
            var school = $("#school").val();
            var depart = $("#depart").val();
            var relation = $("#relation").val();
            var department = $("#department").val();
            var levels = $("#level").val();
            var upPod = $("#pic").attr('pod');
            //console.log(upPod);return

            //console.log(pic);return
            if(!name) {
                layer.msg("姓名不能为空");return;
            }
            if(!phone) {
                layer.msg("手机号不能为空");return;
            }
            /*if(!depart) {
                layer.msg("部门不能为空");return;
            }*/
            if(!upPod) {
                var pic = $("#pic").attr('src');
                var data = {id:id,name:name,nickname:nickname,gender:gender,national:national,position:position,phone:phone,email:email,address:address,school:school,pic:pic,depart:depart,relation:relation,level_id:levels,department:department};
            } else {
                var data = {id:id,name:name,nickname:nickname,gender:gender,national:national,position:position,phone:phone,email:email,address:address,school:school,depart:depart,relation:relation,level_id:levels,department:department};
            }
            $.post("<?php echo U('User/editUser');?>",data,function(res) {
                if(res.err==1) {

                    location.href="<?php echo U('User/index');?>";
                } else {
                    layer.msg(res.msg);
                }
            });
        }
    </script>

</body>

</html>