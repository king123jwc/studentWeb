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
                    <!-- <li><a href="/index.php/Admin/Menu/myAdmin"><i class="icon-user"></i> 个人资料</a></li> -->
                    <!-- <li class="divider"></li> -->
                    <li><a href="/index.php/Admin/Main/layout"><i class="icon-key"></i> 退出系统</a></li>
                </ul>
            </li>

            <!--<li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">&nbsp;设置</span></a></li>-->
            <li class=""><a title="layout" href="/index.php"><i class="icon-picture"></i> <span class="text">&nbsp;网站前台</span></a></li>
            <li class=""><a title="layout" href="/index.php/Admin/Main/layout" onclick="return confirm('您确定要退出吗?');"><i class="icon icon-share-alt"></i> <span class="text">&nbsp;退出系统</span></a></li>
        </ul>
    </div>
    <!--close-top-Header-menu-->
    
    <!--start-top-serch-->
     <!--<div id="search">-->
        <!--<form class="form-horizontal" role="form" action="/index.php/Admin/Menu/search" method="get">-->
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
        <ul style="display: block;">
            <li class="submenu open">
            <a class="menu_a" href="/#"><i class="icon icon-home"></i> <span>后台首页</span></a>
            <ul style="display: block;">
                    <li><a class="menu_a" href="/index.php/Admin/Main/index.html"><i class="icon icon-caret-right"></i>后台首页</a></li>
                </ul>
            </li>
            <?php if(is_array($menuList)): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="submenu">
                    <a href="/#">
                        <i class="icon-th-list"></i>
                        <span><?php echo ($key); ?></span>
                    </a>
                    <ul>
                        <?php foreach($vo as $k => $v):?>
                        <li><a class="menu_a" href="<?php echo $v;?>"><i class="icon icon-caret-right"></i><?php echo $k; if($k=='未处理留言'){ echo "&nbsp;&nbsp;&nbsp;<span class='label label-important'>$newmessage</span>"; }?></a></li>
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
        <div id="breadcrumb"> <a href="/index.php/Admin/Main/index.html" class="tip-bottom" data-original-title="返回后台首页"><i class="icon-home"></i> 后台首页</a><span>|</span><a href="/index.php/Admin/Teacher/changeData"> 教师平台</a><span>|</span><a href="/index.php/Admin/Teacher/unitA?id=1" class="current"> 活动处理</a> </div>
        <h1>活动  处理</h1>
    </div>    <!--End-breadcrumbs-->
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
                            <span>活动  处理</span>
                        </th>
                    </thead>
                    <tbody>
                        <form class="form-horizontal" role="form" action="/index.php/Admin/Teacher/unitA?id=1" method="post" ENCTYPE="multipart/form-data">
                        <tr>
                            <td style="width: 15%;">活动举办单位:</td>
                            <input type="hidden" name="activeid" value="<?php echo ($data[0]['id']); ?>"></input>
                            <td><input class="form-control col-md-9" type="hidden" name="unitid" value="<?php echo ($data[0]['unitid']); ?>"></input><span3><?php echo ($data[0]['unitname']); ?></span3>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">活动名称:</td>
                            <td><span3><?php echo ($data[0]['activename']); ?></span3>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">活动简介:</td>
                            <td><span3><?php echo ($data[0]['activeinfo']); ?></span3></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">活动内容:</td>
                            <td><textarea class="form-control col-md-9" name="activecontact" rows="6" id="s3" disabled><?php echo ($data[0]['activecontact']); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">活动负责人名称:</td>
                            <td><span3><?php echo ($data[0]['people']); ?></span3>
                            </td>
                        </tr>
                         <tr>
                            <td style="width: 15%;">活动照片:</td>
                            <td><img src="/Public/<?php echo ($data[0]['thumb']); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">活动申请时间:</td>
                            <td>
                                <span3><?php echo ($data[0]['createtime']); ?></span3>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">活动类型:</td>
                            <td>
                                <span3><?php echo ($data[0]['classifyname']); ?></span3>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">
                                活动开始时间:&nbsp;&nbsp;
                            </td><td>
                            <span3><?php echo ($data[0]['holdtime']); ?></span3>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">申请场地:</td>
                            <td>
                                <span3><?php echo ($data[0]['campusname']); ?></span3>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">活动策划:</td>
                            <td><a href="/Public/<?php echo ($data[0]['planway']); ?>"><span3><?php echo ($data[0]['planname']); ?></span3></a>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;">社团级别:</td>
                            <td><span3><?php if($data[0]['level']==1){ echo "学生社团"; }elseif($data[0]['level']==2){ echo "学校组织"; }?></span3>
                            </td>
                        </tr> 
                        <tr>
                            <td style="width: 15%;"><span3>教师评论:</span3></td>
                            <td>
                                <textarea class="form-control col-md-9"  name="comment" rows="6" placeholder="教师评论"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"><span3>教师申请场地回复:</span3></td>
                            <td>
                                <input type="text" id="s1" class="form-control col-md-9" name="backfield"
                                placeholder="场地回复"></input>
                                <span2 id='sp1'></span2>
                            </td>
                        </tr>
                        <tr>
                        <input type="hidden" id="isapproval" name="isapproval" value=""></input>
                            <td colspan="2"><button type="submit" class="btn btn-warning"  id="submit1
                           " onclick="return c1()">同意  申请</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" onclick="return c2()" class="btn btn-info">暂不处理</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" onclick="return c3()" class="btn btn-success">不同意申请</button>
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
        $('#isapproval').val('1');
        if ($('#s1').val()=='') {
            $('#sp1').html('场地回复不能为空');
            return false;
        }
        return true;
    }
    function c2(){
        $('#isapproval').val('0');
        if ($('#s1').val()=='') {
            $('#sp1').html('场地回复不能为空');
            return false;
        }
        return true;
    }
    function c3(){
        $('#isapproval').val('-1');
        if ($('#s1').val()=='') {
            $('#sp1').html('场地回复不能为空');
            return false;
        }
        return true;
    }

</script>

<ul class="typeahead dropdown-menu"></ul>
</body>
</html>