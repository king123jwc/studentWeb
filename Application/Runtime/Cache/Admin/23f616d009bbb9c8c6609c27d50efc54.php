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

<!---->
<!DOCTYPE html>
<!-- saved from url=(0046)/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>申请状态</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!---->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="/index.php/admin/Main/index.html" class="tip-bottom" data-original-title="返回后台首页"><i class="icon-home"></i> 后台首页</a><span>|</span><a href="/index.php/admin/applyback/newApply"> &nbsp;申请回复</a><span>|</span><a href="/index.php/Admin/Applyback/allApply" class="current"> 所有申请</a> </div>
        <h1>所有申请</h1>
    </div>
    <!--End-breadcrumbs-->
    <style type="text/css">
        span3 {font-size: 15px;color: #666666; display : inline}
        span4 {font-size: 20px;color: red; display : inline}
        .table th, .table td {
            text-align: center;
        }
        .mycolor{
            background-color: #D9EDF7;
        }
    </style>
    <!---->
    <div class="container-fluid" style="overflow-y: auto; overflow-x: hidden; height: 460px;">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th style="text-align: left;" colspan='10'>
                        <span class="icon"> <i class='icon-paste'></i> </span>
                        <span>所有 申请</span>
                    </th>
                </tr>
                </thead>
                <tr>
                    <td style="background-color: #EEEEEE; border: 0px" colspan="1"></td>
                </tr>
                <tbody>
                <tr>
                    <thead>
                    <tr>
                        <th style="text-align: left;"colspan='9'>
                            <span>申请社团管理员</span>
                        </th>
                    </tr>
                    </thead>
                </tr>
                    <tr>
                        <th>申请人学号</th>
                        <th>申请人昵称</th>
                        <th>申请人照片</th>
                        <th>申请人联系方式</th>
                        <th>申请人自述</th>
                        <th>申请的社团</th>
                        <th>申请&nbsp;&nbsp;状态</th>
                        <th>申请&nbsp;&nbsp;时间</th>
                        <th>申请&nbsp;&nbsp;处理</th>
                    </tr>
                    <?php foreach($data2 as $k=>$v):?>
                        <tr>
                            <td><?php echo ($v['num']); ?></td>
                            <td><?php echo ($v['username']); ?></td>
                            <td><img src="/Public/<?php echo ($v['adminpicthumb']); ?>"/></td>
                            <td><?php echo ($v['contactway']); ?></td>
                            <td><?php echo ($v['instruction']); ?></td>
                            <td><?php echo ($v['unitname']); ?></td>
                            <td> 
                            <?php
 if($v['status']==0){ echo "<span><i class='icon-eye-close'></i> 申请未处理</span>"; }elseif($v['status']==-1){ echo "<span><i class='icon-remove'></i> 申请未通过</span>"; }elseif($v['status']==1){ echo "<span><i class='icon-ok'></i> 申请已通过</span>"; } ?>
                            </td>
                            <td><?php echo ($v['createtime']); ?></td>
                            <td>
                                <a href="/index.php/admin/applyback/editApply?id=<?php echo $v['id'];?>"><span>
                                <?php
 if($v['status']==0){ echo "处&nbsp;&nbsp;理"; }else{ echo "查&nbsp;&nbsp;看"; } ?></span></a>&nbsp;&nbsp;
                            </td>
                        </tr>
                    <?php endforeach;?>

                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <thead>
                    <tr>
                        <th style="text-align: left;"colspan='10'>
                            <span>申请成立社团</span>
                        </th>
                    </tr>
                    </thead>
                </tr>
                <tr>
                        <th>申请人学号</th>
                        <th>申请人昵称</th>
                        <th>申请人照片</th>
                        <th>申请人联系方式</th>
                        <th>申请建立的社团</th>
                        <th>社团描述</th>
                        <th>申请策划</th>
                        <th>申请&nbsp;&nbsp;状态</th>
                        <th>申请&nbsp;&nbsp;时间</th>
                        <th>申请&nbsp;&nbsp;操作</th>
                    </tr>
                    <?php foreach($data1 as $k=>$v):?>
                        <tr>
                            <td><?php echo ($v['num']); ?></td>
                            <td><?php echo ($v['username']); ?></td>
                            <td><img src="/Public/<?php echo ($v['peoplethumb']); ?>"/></td>
                            <td><?php echo ($v['contactway']); ?></td>
                            <td><?php echo ($v['unitname']); ?></td>
                            <td><?php echo ($v['unitinfo']); ?></td>
                            <td><a href="/Public/<?php echo ($v['cehua']); ?>"><?php echo ($v['cehuaname']); ?></a></td>
                            <td>
                            <?php
 if($v['level']==0){ echo "<span><i class='icon-eye-close'></i> 申请尚未处理</span>"; }elseif($v['level']==-1){ echo "<span><i class='icon-remove'></i> 申请未通过</span>"; }elseif($v['level']== 1){ echo "<span><i class='icon-ok'></i> 申请通过,社团成立</span>"; } ?>
                            </td>
                            <td><?php echo ($v['createtime']); ?></td>
                            <td>
                                <a href="/index.php/admin/applyback/editUnit?id=<?php echo $v['id'];?>"><span>
                                <?php
 if($v['level']==0){ echo "处&nbsp;&nbsp;理"; }else{ echo "查&nbsp;&nbsp;看"; } ?></span></a>&nbsp;&nbsp;
                            </td>
                        </tr>
                    <?php endforeach;?>
                    
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr><tr>
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