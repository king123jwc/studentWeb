<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0046)/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>后台管理平台</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Public/css/AdminMain/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/css/AdminMain/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="/Public/css/AdminMain/matrix-style.css">
    <link rel="stylesheet" href="/Public/css/AdminMain/matrix-media.css">
    <link href="/Public/css/AdminMain/font-awesome.css" rel="stylesheet">
</head>
<body>
    <!--Header-part-->
    <div id="header">
        <h1><a href="#">学生组织网</a></h1>
    </div>
    <!--close-Header-part-->

    <!--top-Header-menu-->
    <div id="user-nav" class="navbar ">

        <!-- <ul class="nav" style="width: auto; margin: 0px;"> -->
        <ul class="nav">
        
            <li class="dropdown" id="profile-messages">
                <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
                    <i class="icon icon-user"></i>&nbsp;
                    <span class="text">欢迎你，<?php
 if($_SESSION['username']!==''){ echo $_SESSION['username']; }else{ echo '学号:'.$_SESSION['usernum']; }; ?></span>&nbsp;
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <!-- <li><a href="/index.php/admin/Menu/myAdmin"><i class="icon-user"></i> 个人资料</a></li> -->
                    <!-- <li class="divider"></li> -->
                    <li><a href="/index.php/admin/Main/layout"><i class="icon-key"></i> 退出系统</a></li>
                </ul>
            </li>

            <!--<li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">&nbsp;设置</span></a></li>-->
            <li class=""><a title="layout" href="/index.php"><i class="icon-picture"></i> <span class="text">&nbsp;首页</span></a></li>
            <li class=""><a title="layout" href="/index.php/admin/Main/layout" onclick="return confirm('您确定要退出吗?');"><i class="icon icon-share-alt"></i> <span class="text">&nbsp;退出系统</span></a></li>
        </ul>
    </div>
    <!--close-top-Header-menu-->
    
    <!--start-top-serch-->
     <!--<div id="search">-->
        <!--<form class="form-horizontal" role="form" action="/index.php/admin/Menu/search" method="get">-->
           <!--<input type="text" class="form-control" name="searchname" placeholder="搜索联系人名称">-->
        <!--<button type="submit" class="tip-bottom" data-original-title="Search"><i class="icon-search icon-white"></i></button> -->
        <!--</form>-->
    <!--</div>-->
    <!-- close-top-serch


    <!--end-main-container-part-->
    <!-- <script src="/Public/js/Mainjs/jquery.min.js"></script> -->
    <!-- <script src="/Public/js/Mainjs/excanvas.min.js"></script>
    <script src="/Public/js/Mainjs/jquery.min.js"></script>
    <script src="/Public/js/Mainjs/jquery.ui.custom.js"></script>
    <script src="/Public/js/Mainjs/bootstrap.min.js"></script>
    <script src="/Public/js/Mainjs/jquery.nicescroll.min.js"></script>
    <script src="/Public/js/Mainjs/matrix.js"></script>
 -->

</body>
</html>




<!DOCTYPE html>
<!-- saved from url=(0046)/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>后台管理平台</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Public/css/AdminMain/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/css/AdminMain/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="/Public/css/AdminMain/matrix-style.css">
    <link rel="stylesheet" href="/Public/css/AdminMain/matrix-media.css">
    <link href="/Public/css/AdminMain/font-awesome.css" rel="stylesheet">
</head>
<body>

    <!--sidebar-menu-->
    <div id="sidebar" style="overflow-y: auto; overflow-x: hidden; height: 90%;">
        <ul>
            <li class="submenu open">
            <a class="menu_a" href="/#"><i class="icon icon-home"></i> <span>后台首页</span></a>
            <ul style="display: block;">
                    <li><a class="menu_a" href="/index.php/admin/Main/index.html"><i class="icon icon-caret-right"></i>后台首页</a></li>
                </ul>
            </li>
            <?php if(is_array($menuList)): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="submenu" onclick="dj(this)">
                    <a href="/#" >
                        <i class="icon-th-list"></i>
                        <span class="now" value="<?= $key;?>"><?php echo ($key); ?></span>
                    </a>
                    <ul>
                        <?php foreach($vo as $k => $v):?>
                        <li><a class="menu_a" id="<?php echo $v?>" href="<?php echo $v;?>"><i class="icon icon-caret-right"></i><?php echo $k; if($k=='未处理留言'){ echo "&nbsp;&nbsp;&nbsp;<span class='label label-important'>$newmessage</span>"; }?></a></li>
                        <?php endforeach;?>

                    </ul>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
    <!--sidebar-menu-->


    <!--end-main-container-part-->

    <script src="/Public/js/Mainjs/excanvas.min.js"></script>
    <script src="/Public/js/Mainjs/jquery.min.js"></script>
    <script src="/Public/js/Mainjs/jquery.ui.custom.js"></script>
    <script src="/Public/js/Mainjs/bootstrap.min.js"></script>
    <script src="/Public/js/Mainjs/jquery.nicescroll.min.js"></script>
    <script src="/Public/js/Mainjs/matrix.js"></script>


    <script type="text/javascript">

    //初始化相关元素高度
    function init(){
        $("body").height($(window).height()-80);
        $("#iframe-main").height($(window).height()-90);
        $("#sidebar").height($(window).height()-50);
    }

    $(function(){
        init();
        $(window).resize(function(){
            init();
        });
    });

    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {
        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {
            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();            
            } 
            // else, send page to designated URL            
            else {  
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }

    // uniform使用示例：
    // $.uniform.update($(this).attr("checked", true));
    </script>

</body>
</html>

<!--个人资料-->
<!DOCTYPE html>
<!-- saved from url=(0046)/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>后台管理平台</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/Public/js/jquery.datetimepicker.css"/>
</head>
<body>
<!--主体部分-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="/index.php/admin/Main/index.html" class="tip-bottom" data-original-title="返回后台首页"><i class="icon-home"></i> 后台首页</a><span>|</span><a href="/index.php/admin/Activity/activityData"> 举办活动</a><span>|</span><a href="/index.php/admin/Activity/activityData" class="current"> 活动资料</a> </div>
        <h1>活动  资料</h1>
    </div>
    <!--End-breadcrumbs-->
    <style type="text/css">
        span3 {font-size: 18px;color: #666666; display : inline}
        span2 {font-size: 15px;color: red; display : inline}
        .table th, .table td {
            text-align: left;
        }
    </style>
    <!--个人资料-->
    <div class="container-fluid" style="overflow-y: auto; overflow-x: hidden; height: 400px;">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" style="border: 0">
                    <thead>
                        <th colspan="2">
                            <span class="icon"> <i class="icon-pencil"></i> </span>
                            <span>活动  资料</span>
                        </th>
                    </thead>
                    <tbody>
                        <form class="form-horizontal" role="form" action="/index.php/admin/Activity/activityData" method="post" ENCTYPE="multipart/form-data">
                        <tr>
                            <td style="width: 15%;">活动举办单位:</td>
                            <td><input class="form-control col-md-9" type="hidden" name="unitid" value="<?php echo ($unit['id']); ?>"></input><?php echo ($unit['unitname']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">活动名称:</td>
                            <td><input id="s1" class="form-control col-md-9" type="text" name="activename" placeholder="活动名称"></input>
                            <span2 id="sp1"></span2>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">活动简介:</td>
                            <td><input class="form-control col-md-9" type="text" name="activeinfo" id="s2" placeholder="活动简介"></input>
                            <span2 id='sp2'></span2></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">活动内容:</td>
                            <td><textarea class="form-control col-md-9" name="activecontact" rows="6" id="s3" placeholder="活动内容"></textarea><span2 id='sp3'></span2>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">活动负责人名称:</td>
                            <td><input class="form-control col-md-9" type="text" id="s4" name="people" placeholder="活动负责人名称"></input>
                            <span2 id='sp4'></span2>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">活动照片:</td>
                            <td><input class="form-control col-md-9" type="file" id="s5" name="pic"></input>
                            <span2 id='sp5'></span2>
                            </td>
                        </tr>  
                        <tr>
                            <td style="width: 15%;">缩略图尺寸:</td>
                            <td>
                                <select class="form-control" name="thumbsize" style="width: 20%;">
                                    <option value="50">--默认50X50--</option>
                                    <option value="100">100X100</option>
                                    <option value="150">150X150</option>
                                    <option value="200">200X200</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">活动类型:</td>
                            <td>
                                <select id="s6" class="form-control" name="classifyid" style="width: 20%;">
                                    <option value="">----请选择----</option>
                                    <?php foreach($classify as $k=>$v):?>
                                        <option value="<?php echo ($v['id']); ?>"><?php echo ($v['classifyname']); ?></option>
                                    <?php endforeach;?>
                                </select>
                                <span2 id='sp6'></span2>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">
                                活动开始时间:&nbsp;&nbsp;
                            </td><td>
                            <input name="holdtime" type="text" value="0000-00-00 00:00" id="datetimepicker"/><br><br>
                                <span2 id="sp7"></span2>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">审批单位:</td>
                            <td>
                                <select id="s8" class="form-control" name="approvalunitid" style="width: 20%;">
                                    <option value="">----请选择----</option>
                                    <?php foreach($sc as $k=>$v):?>
                                        <option value="<?php echo ($v['id']); ?>"><?php echo ($v['unitname']); ?></option>
                                    <?php endforeach;?>
                                </select>
                                <span2 id='sp8'></span2>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">申请场地:</td>
                            <td>
                                <select id="s9" class="form-control" name="fieldid" style="width: 20%;">
                                    <option value="">----请选择----</option>
                                    <?php foreach($campus as $k=>$v):?>
                                        <option value="<?php echo ($v['id']); ?>"><?php echo ($v['campusname']); ?></option>
                                    <?php endforeach;?>
                                </select>
                                <span2 id='sp9'></span2>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">策划名称:</td>
                            <td><input class="form-control col-md-9" type="text" id="s10" name="planname"></input>
                            <span2 id='sp10'></span2>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">活动策划:</td>
                            <td><input class="form-control col-md-9" type="file" id="s11" name="planway"></input>
                            <span2 id='sp11'></span2>
                            </td>
                        </tr> 
                        <tr>
                        <input type="hidden" id="status" name="status" value=""></input>
                            <td colspan="2"><button type="submit" class="btn btn-warning"  id="submit1
                           " onclick="return c1()">即刻  申请</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" onclick="return c2()" class="btn btn-info">不申请,存入草稿箱</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-success">重  写</button>
                            <br>
                            <br>
                           </td>
                        </tr>
                            </form>
                    </tbody>
                </table>
            </div>
    </div>
</div>
<!--end-main-container-part-->
<script src="/Public/ueditor/ueditor.config.js"></script>
<script src="/Public/ueditor/ueditor.all.min.js"></script>
<script src="/Public/js/Mainjs/jquery.min.js"></script>
<script src="/Public/js/Mainjs/jquery.min.js"></script>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/jquery.datetimepicker.js"></script>
<script>
$('#datetimepicker').datetimepicker();
$('#datetimepicker').datetimepicker({value:'2016-03-01 00:00',step:10});
</script>
<script type="text/javascript" src="/Public/js/laydate.dev.js"></script>
<script>
    function c1(){
        $('#status').val('0');
        if ($('#s1').val()=='') {
            $('#sp1').html('活动名称不能为空');
            return false;
        }else if($('#s2').val()==''){
            $('#sp2').html('活动简介不能为空');
            return false;
        }else if($('#s3').val()==''){
            $('#sp3').html('活动内容不能为空');
            return false;
        }else if($('#s4').val()==''){
            $('#sp4').html('负责人姓名不能为空');
            return false;
        }else if($('#s5').val()==''){
            $('#sp5').html('活动照片不能为空');
            return false;
        }else if($('#s6').val()==''){
            $('#sp6').html('活动类型不能为空');
            return false;
        }else if($('#s8').val()==''){
            $('#sp8').html('审批单位不能为空');
            return false;
        }else if($('#s9').val()==''){
            $('#sp9').html('申请场地不能为空');
            return false;
        }else if($('#s10').val()==''){
            $('#sp10').html('策划名称不能为空');
            return false;
        }else if($('#s11').val()==''){
            $('#sp11').html('活动策划不能为空');
            return false;
        }
        return true;
    }
    function c2(){
        $('#status').val('-1');
        if ($('#s1').val()=='') {
            $('#sp1').html('活动名称不能为空');
            return false;
        }else if($('#s2').val()==''){
            $('#sp2').html('活动简介不能为空');
            return false;
        }else if($('#s3').val()==''){
            $('#sp3').html('活动内容不能为空');
            return false;
        }else if($('#s4').val()==''){
            $('#sp4').html('负责人姓名不能为空');
            return false;
        }else if($('#s5').val()==''){
            $('#sp5').html('活动照片不能为空');
            return false;
        }else if($('#s6').val()==''){
            $('#sp6').html('活动类型不能为空');
            return false;
        }else if($('#s8').val()==''){
            $('#sp8').html('审批单位不能为空');
            return false;
        }else if($('#s9').val()==''){
            $('#sp9').html('申请场地不能为空');
            return false;
        }else if($('#s10').val()==''){
            $('#sp10').html('策划名称不能为空');
            return false;
        }else if($('#s11').val()==''){
            $('#sp11').html('活动策划不能为空');
            return false;
        }
        return true;
    }

</script>

<ul class="typeahead dropdown-menu"></ul>
</body>
</html>