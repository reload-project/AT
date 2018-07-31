<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>亚齐信息管理系统</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                <?php if((in_array('User',$rr)) || (in_array('Levels',$rr)) || (in_array('Department',$rr)) || (in_array('Rules',$rr))): if($controller == 'User' || $controller == 'Levels' || $controller == 'Department' || $controller == 'Rules'): ?><li class="active">
                        <?php else: ?>
                        <li><?php endif; ?>
                        <a href="javascript:;" class="  <?php if(CONTROLLER_NAME == 'User'): ?>active-menu<?php endif; ?>  <?php if(CONTROLLER_NAME == 'Levels'): ?>active-menu<?php endif; ?>  <?php if(CONTROLLER_NAME == 'Department'): ?>active-menu<?php endif; ?>  <?php if(CONTROLLER_NAME == 'Rules'): ?>active-menu<?php endif; ?>  waves-effect waves-dark"><i class="fa fa-sitemap"></i> 员工管理<span class="fa arrow"></span></a>
                    <?php if($controller == 'User' || $controller == 'Levels' || $controller == 'Department' || $controller == 'Rules'): ?><ul class="nav nav-second-level collapse in ">
                    <?php else: ?>
                        <ul class="nav nav-second-level"><?php endif; ?>
                            <?php if((in_array('User',$rr))): ?><li>
                                    <a href="<?php echo U('User/index');?>" class=" <?php if(CONTROLLER_NAME == 'User'): ?>active-menu<?php endif; ?>  "> 员工资料</a>
                                </li><?php endif; ?>
                            <?php if((in_array('Levels',$rr))): ?><li>
                                    <a href="<?php echo U('Levels/index');?>" class=" <?php if(CONTROLLER_NAME == 'Levels'): ?>active-menu<?php endif; ?> "> 员工级别</a>
                                </li><?php endif; ?>
                            <?php if((in_array('Department',$rr))): ?><li>
                                    <a href="<?php echo U('Department/index');?>" class=" <?php if(CONTROLLER_NAME == 'Department'): ?>active-menu<?php endif; ?>"> 部门管理</a>
                                </li><?php endif; ?>
                            <?php if((in_array('Rules',$rr))): ?><li>
                                    <a href="<?php echo U('Rules/index');?>" class=" <?php if(CONTROLLER_NAME == 'Rules'): ?>active-menu<?php endif; ?>"> 规则管理</a>
                                </li><?php endif; ?>
                        </ul>
                    </li><?php endif; ?>
            <?php if((in_array('Project',$rr)) || (in_array('ProjectCate',$rr))): if($controller == 'Project' || $controller == 'ProjectCate'): ?><li class="active">
                        <?php else: ?>
                    <li><?php endif; ?>
                    <a href="javascript:;" class="waves-effect <?php if(CONTROLLER_NAME == 'TaskInfo'): ?>active-menu<?php endif; ?> <?php if(CONTROLLER_NAME == 'Task'): ?>active-menu<?php endif; ?>  <?php if(CONTROLLER_NAME == 'Project'): ?>active-menu<?php endif; ?>  <?php if(CONTROLLER_NAME == 'ProjectCate'): ?>active-menu<?php endif; ?>  waves-dark"><i class="fa fa-sitemap"></i> 项目管理<span class="fa arrow"></span></a>
                <?php if($controller == 'Project' || $controller == 'ProjectCate' || $controller == 'Task' || $controller == 'TaskInfo'): ?><ul class="nav nav-second-level collapse in ">
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
                            编辑员工级别
                        </div>
                        <div class="card-content">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s6">
                                        员工级别:<input id="level" type="text" class="validate" value="<?php echo ($info["level"]); ?>">
                                        <!--<label for="username">姓名</label>-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        基本工资:<input id="basic_salary" type="text" class="validate" value="<?php echo ($info["basic_salary"]); ?>">
                                        <!--<label for="nickname">昵称</label>-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        岗位工资:<input id="post_salary" type="text" class="validate" value="<?php echo ($info["post_salary"]); ?>">
                                        <!--<label for="password">密码</label>-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        岗位职责:<input id="responsibility" type="text" class="validate" value="<?php echo ($info["responsibility"]); ?>">
                                        <!--<label for="phone">手机号</label>-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        工资架构:<input id="salary_structure" type="text" class="validate" value="<?php echo ($info["salary_structure"]); ?>">
                                        <!--<label for="phone">手机号</label>-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        备注:<textarea id="note" class="materialize-textarea" ><?php echo ($info["note"]); ?></textarea>
                                        <!--<label for="textarea1">Textarea</label>-->
                                    </div>
                                </div>
                                <div class="btn " role="group" aria-label="..." onclick="addLevels()">
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


    

    <script type="text/javascript">
        function addLevels() {
            var id = "<?php echo ($_GET['id']); ?>";
            var level = $("#level").val();
            var basic_salary = $("#basic_salary").val();
            var post_salary = $("#post_salary").val();
            var responsibility = $("#responsibility").val();
            var salary_structure = $("#salary_structure").val();
            var note = $("#note").val();
            if(!level) {
                layer.msg("级别不能为空");return;
            }
            $.post("<?php echo U('Levels/editLevels');?>",{id:id,level:level,basic_salary:basic_salary,post_salary:post_salary,responsibility:responsibility,salary_structure:salary_structure,note:note},function(res) {
                if(res.err==1) {

                    location.href="<?php echo U('Levels/index');?>";
                }
            });
        }
    </script>

</body>

</html>