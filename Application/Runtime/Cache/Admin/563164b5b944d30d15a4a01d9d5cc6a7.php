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
        <ul>
            <li class="submenu open">
            <a class="menu_a" href="/#"><i class="icon icon-home"></i> <span>后台首页</span></a>
            <ul style="display: block;">
                    <li><a class="menu_a" href="/index.php/Admin/Main/index.html"><i class="icon icon-caret-right"></i>后台首页</a></li>
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
</head>
<body>
<!--主体部分-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="/index.php/Admin/Main/index.html" class="tip-bottom" data-original-title="返回后台首页"><i class="icon-home"></i> 后台首页</a><span>|</span><a href="/index.php/Admin/Unit/communityRevision"> 社团管理</a><span>|</span><a href="/index.php/Admin/Unit/usedActivity" class="current"> 社团曾经活动</a> </div>
        <h1>社团管理 社团曾经活动</h1>
    </div>
    <!--End-breadcrumbs-->
    <style type="text/css">
        span3 {font-size: 15px;color: #666666; display : inline}
        span4 {font-size: 20px;color: red; display : inline}
        .table th, .table td {
            text-align: left;
        }
        .mycolor{
            background-color: #D9EDF7;
        }
    </style>
    <!--个人资料-->
    <div class="container-fluid" style="overflow-y: auto; overflow-x: hidden; height: 460px;">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th style="text-align: left;" colspan="2">
                        <span class="icon"> <i class='icon-group'></i> </span>
                        <span>社团举办的活动(社团共举办过<?php echo ($count); ?>个活动)</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
 if(!empty($kon)){ echo "<tr>
                <td style='width:20%; text-align: center;' colspan='2'><span4>$kon</span4></td>
                </tr>"; } ?>
                    <?php foreach($data as $k=>$v):?>
                        <tr>
                            <td style="width:20%;" colspan="2"><span3>社团举办的第<?php echo ($k+1); ?>个活动:</span3></td>
                        </tr>
                        <tr>
                            <td style="width:20%;">活动名称:</td>
                            <td><?php echo ($v['activename']); ?></td>
                        </tr>
                        <tr>
                            <td style="width:20%;">活动举办社团:</td>
                            <td><?php echo ($v['unitname']); ?></td>
                        </tr>
                        <tr>
                            <td style="width:20%;">活动负责人:</td>
                            <td><?php echo ($v['people']); ?></td>
                        </tr>
                        <tr>
                            <td style="width:20%;">活动举办时间:</td>
                            <td><?php echo ($v['holdtime']); ?></td>
                        </tr>
                        <tr>
                            <td style="width:20%;">活动类型:</td>
                            <td><?php echo ($v['classifyname']); ?></td>
                        </tr>
                        <tr>
                            <td style="width:20%;">活动举办场地:</td>
                            <td><?php echo ($v['backfield']); ?></td>
                        </tr>
                        <tr>
                            <td style="width:20%;">活动简介:</td>
                            <td><?php echo ($v['activeinfo']); ?></td>
                        </tr>
                        <tr>
                            <td style="width:20%;">活动具体内容:</td>
                            <td><?php echo ($v['activecontact']); ?></td>
                        </tr>
                        <tr>
                            <td style="width:20%;">活动缩略图:</td>
                            <td><img src="/Public/<?php echo ($v['thumb']); ?>"/></td>
                        </tr>
                        <tr>
                            <td style="width:20%;">活动参加人数:</td>
                            <td><?php echo ($lv[$v['id']]['count']); ?>个</td>
                        </tr>
                        <tr>
                            <td style="width:20%;">活动好评率:</td>
                            <td>好评:<?php echo ($lv[$v['id']]['lv1']); ?>%
                                <div class="progress">
                                    <div class="progress-bar active progress-bar-info progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($lv[$v['id']]['lv1']); ?>%;">
                                        好评:<?php echo ($lv[$v['id']]['lv1']); ?>%
                                    </div>
                                    <div class="progress-bar active progress-bar-success progress-bar-striped" style="width: <?php echo ($lv[$v['id']]['lv2']); ?>%">
                                        差评:<?php echo ($lv[$v['id']]['lv2']); ?>%
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">删除活动</td>
                            <td>
                                <button><a href="/index.php/Admin/Unit/delActive?id=<?php echo ($v['id']); ?>" onclick="confirm('您确定要删除活动?')">删除活动</a></button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><br><br></td>
                        </tr>
                    <?php endforeach;?>

                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="/Public/jS/jq.js"></script>
<script type="text/javascript" src="/Public/jS/jquery-2.1.1.min.js"></script>
<script type="text/javascript">

    $("input[name=selall]").click(function(){
        $('.delids').attr("checked",$("input[name=selall]").attr('checked'));
    })
</script>
<ul class="typeahead dropdown-menu"></ul>
</body>
</html>