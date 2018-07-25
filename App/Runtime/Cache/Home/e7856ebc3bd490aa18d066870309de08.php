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
                <?php if((in_array('User',$rr)) || (in_array('Levels',$rr)) || (in_array('Department',$rr)) || (in_array('Rules',$rr))): ?><li>
                        <a href="javascript:;" class="  <?php if(CONTROLLER_NAME == 'User'): ?>active-menu<?php endif; ?>  <?php if(CONTROLLER_NAME == 'Levels'): ?>active-menu<?php endif; ?>  <?php if(CONTROLLER_NAME == 'Department'): ?>active-menu<?php endif; ?>  <?php if(CONTROLLER_NAME == 'Rules'): ?>active-menu<?php endif; ?>  waves-effect waves-dark"><i class="fa fa-sitemap"></i> 员工管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <?php if((in_array('User',$rr))): ?><li>
                                    <a href="<?php echo U('User/index');?>" class=" <?php if(CONTROLLER_NAME == 'User'): ?>active-menu<?php endif; ?>  waves-effect waves-dark"><i class="fa fa-desktop"></i> 员工资料</a>
                                </li><?php endif; ?>
                            <?php if((in_array('Levels',$rr))): ?><li>
                                    <a href="<?php echo U('Levels/index');?>" class=" <?php if(CONTROLLER_NAME == 'Levels'): ?>active-menu<?php endif; ?>  waves-effect waves-dark"><i class="fa fa-desktop"></i> 员工级别</a>
                                </li><?php endif; ?>
                            <?php if((in_array('Department',$rr))): ?><li>
                                    <a href="<?php echo U('Department/index');?>" class=" <?php if(CONTROLLER_NAME == 'Department'): ?>active-menu<?php endif; ?> waves-effect waves-dark"><i class="fa fa-bar-chart-o"></i> 部门管理</a>
                                </li><?php endif; ?>
                            <?php if((in_array('Rules',$rr))): ?><li>
                                    <a href="<?php echo U('Rules/index');?>" class=" <?php if(CONTROLLER_NAME == 'Rules'): ?>active-menu<?php endif; ?> waves-effect waves-dark"><i class="fa fa-bar-chart-o"></i> 规则管理</a>
                                </li><?php endif; ?>
                        </ul>
                    </li><?php endif; ?>
                 <!--                   <li>
                                        <a href="tab-panel.html" class="waves-effect waves-dark"><i class="fa fa-qrcode"></i> Tabs & Panels</a>
                                    </li>

                                    <li>
                                        <a href="table.html" class="waves-effect waves-dark"><i class="fa fa-table"></i> Responsive Tables</a>
                                </li>
                                    <li>
                                        <a href="form.html" class="waves-effect waves-dark"><i class="fa fa-edit"></i> Forms </a>
                                    </li>


                                    <li>
                                        <a href="#" class="waves-effect waves-dark"><i class="fa fa-sitemap"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="#">Second Level Link</a>
                                            </li>
                                            <li>
                                                <a href="#">Second Level Link</a>
                                            </li>
                                            <li>
                                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                                <ul class="nav nav-third-level">
                                                    <li>
                                                        <a href="#">Third Level Link</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Third Level Link</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Third Level Link</a>
                                                    </li>

                                                </ul>

                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="empty.html" class="waves-effect waves-dark"><i class="fa fa-fw fa-file"></i> Empty Page</a>
                                    </li>-->
            </ul>

        </div>

    </nav>
    
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		
            <div id="page-inner"> 
               
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="card">
                            <div class="card-action">
                                员工级别列表
                                <a  href="<?php echo U('Levels/addLevels');?>"  style="margin-left: 10px;">
                                    <div class="btn " role="group" aria-label="..." >
                                    添加员工级别

                                    </div>
                                </a>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#id</th>
                                                <th>员工级别</th>
                                                <th>基本工资</th>
                                                <th>岗位工资</th>
                                                <th>岗位职责</th>
                                                <th>工资架构</th>
                                                <th>备注</th>
                                                <th>添加时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="odd gradeX">
                                                    <td><?php echo ($v['id']); ?></td>
                                                    <td style="width: 80px;"><?php echo ($v['level']); ?>/级</td>
                                                    <td><?php echo ($v['basic_salary']); ?></td>
                                                    <td><?php echo ($v['post_salary']); ?></td>
                                                    <td><?php echo ($v['responsibility']); ?></td>
                                                    <td><?php echo ($v['salary_structure']); ?></td>
                                                    <td><?php echo ($v['note']); ?></td>
                                                    <td><?php echo ($v['add_time']); ?></td>
                                                    <td>
                                                        <div class="btn " role="group" aria-label="..." >
                                                            <a  href='<?php echo U("Levels/editLevels?id=$v[id]" );?>' style="color: #0D47A1;">编辑</a>
                                                        </div>
                                                        <div class="btn " role="group" aria-label="..." onclick='delLevels("<?php echo ($v[id]); ?>")'>
                                                            <a  href="javascript:" style="color: #843534;">删除</a>
                                                        </div><!--
                                                        <div class="btn " role="group" aria-label="..." onclick='statusMaster("<?php echo ($v[id]); ?>","<?php echo ($v[status]); ?>")'>
                                                            <a  href="javascript:" style="color: #0D47A1;">更改状态</a>
                                                        </div>-->
                                                    </td>
                                                </tr><?php endforeach; endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
            </div>
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

    
    <!-- jQuery Js -->
    <!--<script src="/App/Home/Common/assets/js/jquery-1.10.2.js"></script>-->
    <!-- DATA TABLE SCRIPTS -->
<!--    <script src="/App/Home/Common/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="/App/Home/Common/assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>-->


    <script type="text/javascript">

        //删除
        function delLevels(id) {
            layer.confirm('是否删除该级别？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post('<?php echo U("Levels/delLevels");?>',{id:id},function(res) {
                    if(res.err==1) {
                        location=location;
                    } else {
                        layer.msg('删除失败', {icon: 1});
                    }
                });

            });
        }
/*
        //更改状态
        function statusMaster(id,status) {
            layer.confirm('是否更改状态？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                if(status=='正常') {
                    status = 1;
                } else if(status=='禁用') {
                    status = 0;
                }
                $.post('<?php echo U("Master/master_status");?>',{id:id,status:status},function(res) {
                    if(res.err==1) {
                        location=location;
                    } else {
                        layer.msg('更改失败', {icon: 1});
                    }
                });

            });
        }*/


    </script>

</body>

</html>