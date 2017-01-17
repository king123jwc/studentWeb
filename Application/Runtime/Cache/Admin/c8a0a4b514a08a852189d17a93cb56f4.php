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
        <h1><a href="#">西柚管理平台</a></h1>
    </div>
    <!--close-Header-part-->

    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">

        <!-- <ul class="nav" style="width: auto; margin: 0px;"> -->
        <ul class="nav">
        
            <li class="dropdown" id="profile-messages">
                <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
                    <i class="icon icon-user"></i>&nbsp;
                    <span class="text">欢迎你，<?php echo $_SESSION['username'];?></span>&nbsp;
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/index.php/Admin/Menu/myAdmin"><i class="icon-user"></i> 个人资料</a></li>
                    <li class="divider"></li>
                    <li><a href="/index.php/Admin/Menu/newAdmin"><i class="icon-check"></i> 新增管理员</a></li>
                    <li class="divider"></li>
                    <li><a href="/index.php/Admin/Main/layout"><i class="icon-key"></i> 退出系统</a></li>
                </ul>
            </li>
            <li class="dropdown" id="menu-messages">
                <a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle">
                    <i class="icon icon-envelope"></i>&nbsp;
                    <span class="text">后台消息</span>&nbsp;
                    <span class="label label-important"><?php echo ($newmessage); ?></span>&nbsp; 
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="sAdd" title="newMessage" href="/index.php/Admin/Menu/newMessage"><i class="icon-plus"></i> 未处理&nbsp;&nbsp;&nbsp;<span class="label label-important"><?php echo ($newmessage); ?></span></a></li>
                    <li class="divider"></li>
                    <li><a class="sInbox" title="messageBox" href="/index.php/Admin/Menu/messageBox"><i class="icon-envelope"></i> 留言箱</a></li>
                </ul>
            </li>
            <!--<li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">&nbsp;设置</span></a></li>-->
            <li class=""><a title="layout" href="/index.php/Admin/Main/layout"><i class="icon icon-share-alt"></i> <span class="text">&nbsp;退出系统</span></a></li>
            <li class=""><a title="layout" href="/index.php"><i class="icon-picture"></i> <span class="text">&nbsp;前端</span></a></li>
        </ul>
    </div>
    <!--close-top-Header-menu-->
    
    <!--start-top-serch-->
     <div id="search">
        <form class="form-horizontal" role="form" action="/index.php/Admin/Menu/search" method="get">
           <input type="text" class="form-control" name="searchname" placeholder="搜索联系人名称">
        <button type="submit" class="tip-bottom" data-original-title="Search"><i class="icon-search icon-white"></i></button> 
        </form>
    </div>
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
    <div id="sidebar" style="overflow-y: auto; overflow-x: hidden; height: 100%;">
        <ul style="display: block;">
            <li class="submenu open">
            <a class="menu_a" href="/#"><i class="icon icon-home"></i> <span>后台首页</span></a>
            <ul style="display: block;">
                    <li><a class="menu_a" href="/index.php/Admin/Main/index.html"><i class="icon icon-caret-right"></i>后台首页</a></li>
                </ul>
            </li>
            <li class="submenu"> 
                <a href="/#">
                    <i class="icon icon-envelope"></i> 
                    <span>留言箱&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-important"><?php echo ($newmessage); ?></span></span> 
                </a>
                <ul>
                    <li><a class="menu_a" href="/index.php/Admin/Menu/newMessage"><i class="icon icon-caret-right"></i>未处理留言&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-important"><?php echo ($newmessage); ?></span></a></li>
                    <li><a class="menu_a" href="/index.php/Admin/Menu/handleMessage"><i class="icon icon-caret-right"></i>已处理留言</a></li>
                    <li><a class="menu_a" href="/index.php/Admin/Menu/messageBox"><i class="icon icon-caret-right"></i>留言箱</a></li>
                </ul>
            </li>
            <li class="submenu"> 
                <a href="/#">
                    <i class="icon icon-table"></i> 
                    <span>案例分类</span> 
                </a>
                <ul>
                    <li><a class="menu_a" href="/index.php/Admin/Classify/myClassify"><i class="icon icon-caret-right"></i>分类处理</a></li>
                    <li><a class="menu_a" href="/index.php/Admin/Classify/addClassify"><i class="icon icon-caret-right"></i>增加分类</a></li>
                </ul>
            </li>
            <li class="submenu">
				<a href="/#">
                    <i class="icon icon-th"></i> 
                    <span>成功案例</span>
                </a>
				<ul>
                    <li><a class="menu_a" href="/index.php/Admin/Demo/demoLst"><i class="icon icon-caret-right"></i>案例列表</a></li>
                    <li><a class="menu_a" href="/index.php/Admin/Demo/addDemo"><i class="icon icon-caret-right"></i>添加案例</a></li>
                </ul>
            </li>
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
        <div id="breadcrumb"> <a href="/index.php/Admin/Main/index.html" class="tip-bottom" data-original-title="返回后台首页"><i class="icon-home"></i> 后台首页</a><span>|</span><a href="/index.php/Admin/Classify/myClassify"> &nbsp;案例分类</a><span>|</span><a href="/index.php/Admin/Classify/myClassify"> &nbsp;分类处理</a><span>|</span><a href="/index.php/Admin/Classify/edit?id=9" class="current"> 修改分类</a> </div>
        <h1>修改 分类</h1>
    </div>
    <!--End-breadcrumbs-->
    <style type="text/css">
        span3 {font-size: 18px;color: #666666; display : inline}
        span4 {font-size: 15px;color: red; display : inline}
        .table th, .table td {
            text-align: left;
        }
    </style>
    <!--个人资料-->
    <div class="container-fluid" style="overflow-y: auto; overflow-x: hidden; height: 460px;">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" style="border: 0">
                    <thead>
                        <th>
                            <span class="icon"> <i class="icon-pencil"></i> </span>
                            <span>修改 分类</span>
                        </th>
                    </thead>
                    <tbody>
                        <form class="form-horizontal" role="form" action="/index.php/Admin/Classify/edit" method="post">
                        <tr>
                            <td style="text-align: center;width: 15%;">
                                <span3>分类名称:&nbsp;&nbsp;</span3>
                            </td><td>
                            <input type="text" class="form-control col-md-9" id="exampleInputext1" name="classifyname" value="<?php echo ($data['classifyname']); ?>">
                            <input type="hidden" class="form-control col-md-9" name="id" value="<?php echo ($data['id']); ?>">
                                <span4 id="s40"></span4>
                            </td>
                        </tr>
                            <tr>
                                <td style="text-align: center;width: 15%;">
                                    <span3>分类id名称:&nbsp;&nbsp;</span3>
                                </td><td>
                                <input type="text" class="form-control col-md-9" id="exampleInputext2" name="idname" value="<?php echo ($data['idname']); ?>">
                                <span4 id="s41"></span4>
                            </td>
                            </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-warning"  onclick=" return check()" id="submit1 ">修&nbsp;&nbsp;&nbsp;改</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#" type="submit" class="btn btn-info" id="submit2 ">返&nbsp;&nbsp;&nbsp;回</a>&nbsp;&nbsp;
                            </td>
                        </tr>
                        </form>
                    </tbody>
                </table>
            </div>
    </div>
</div>
<!--end-main-container-part-->
<script src="/Public/js/Mainjs/jquery.min.js"></script>
<script>
    function check(){
        var n1=$('#exampleInputext1').val();
//        alert(n1);
        var n2=$('#exampleInputext2').val();
//        alert(n2);
        var reg=/^[a-zA-Z0-9_]+$/;
        if(n1==''){
//            alert('ok');
            $('#s40').text('分类名称不能为空');
            return false;
        }else{
            if (n2==''){
                $('#s41').text('分类Id名称不能为空');
                return false;
            }else{
                if(!reg.test(n2)){
                    $('#s41').text('分类Id名称必须是英文数字下划线');
                    return false;

                }else{
                    return true;
                }
            }
        }
    }
</script>

<ul class="typeahead dropdown-menu"></ul>
</body>
</html>