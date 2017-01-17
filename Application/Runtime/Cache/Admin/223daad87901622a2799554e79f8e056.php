<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!DOCTYPE html>
<!-- saved from url=(0046)/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>后台管理模板</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Public/css/AdminMain/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/css/AdminMain/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="/Public/css/AdminMain/matrix-style.css">
    <link rel="stylesheet" href="/Public/css/AdminMain/matrix-media.css">
    <link href="/Public/css/AdminMain/font-awesome.css" rel="stylesheet">
</head>
<body style="height: 437px;">
    <!--Header-part-->
    <div id="header">
        <h1><a href="/dashboard.html">西柚管理平台</a></h1>
    </div>
    <!--close-Header-part-->

    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">

        <ul class="nav" style="width: auto; margin: 0px;">
            <li class="dropdown" id="profile-messages">
                <a title="" href="/#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
                    <i class="icon icon-user"></i>&nbsp;
                    <span class="text">欢迎你，<?php echo $_SESSION['username'];?></span>&nbsp;
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/index.php/Admin/Menu/myAdmin"><i class="icon-user"></i> 个人资料</a></li>
                    <li class="divider"></li>
                    <li><a href="/index.php/Admin/Menu/addAdmin"><i class="icon-check"></i> 新增管理员</a></li>
                    <li class="divider"></li>
                    <li><a href="/index.php/Admin/Main/layout"><i class="icon-key"></i> 退出系统</a></li>
                </ul>
            </li>
            <li class="dropdown" id="menu-messages">
                <a href="/#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle">
                    <i class="icon icon-envelope"></i>&nbsp;
                    <span class="text">后台消息</span>&nbsp;
                    <span class="label label-important">4</span>&nbsp; 
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="sAdd" title="" href=""><i class="icon-plus"></i> 新留言</a></li>
                    <li class="divider"></li>
                    <li><a class="sInbox" title="" href="____"><i class="icon-envelope"></i> 留言箱</a></li>
                    <li class="divider"></li>
                    <li><a class="sOutbox" title="" href="____"><i class="icon-arrow-up"></i> 发件箱</a></li>
                    <li class="divider"></li>
                    <li><a class="sTrash" title="" href="/#"><i class="icon-trash"></i> 回收站</a></li>
                </ul>
            </li>
            <!--<li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">&nbsp;设置</span></a></li>-->
            <li class=""><a title="layout" href="/index.php/Admin/Main/layout"><i class="icon icon-share-alt"></i> <span class="text">&nbsp;退出系统</span></a></li>
        </ul>
    </div>
    <!--close-top-Header-menu-->

    <!--start-top-serch-->
    <div id="search">
        <input type="text" placeholder="搜索...">
        <button type="submit" class="tip-bottom" data-original-title="Search"><i class="icon-search icon-white"></i></button>
    </div>
    <!--close-top-serch-->

    <!--sidebar-menu-->
    <div id="sidebar" style="overflow-y: auto; overflow-x: hidden; height: 467px;">
        <ul style="display: block;">
            <li class="submenu active">
                <a class="menu_a" link="index2.html"><i class="icon icon-home"></i> <span>后台首页</span></a>
            </li>
            <li class="submenu open"> 
                <a href="/#">
                    <i class="icon icon-table"></i> 
                    <span>表单</span> 
                    <span class="label label-important">3</span>
                </a>
                <ul style="display: block;">
                    <li><a class="menu_a" link="form-common.html"><i class="icon icon-caret-right"></i>基本表单</a></li>
                    <li><a class="menu_a" link="form-validation.html"><i class="icon icon-caret-right"></i>校验表单</a></li>
                    <li><a class="menu_a" link="form-wizard.html"><i class="icon icon-caret-right"></i>密码修改样式表单</a></li>
                </ul>
            </li>
            <li class="submenu">
				<a href="/#">
                    <i class="icon icon-th"></i> 
                    <span>布局表格组件</span> 
                    <span class="label label-important">6</span>
                </a>
				<ul>
                    <li><a class="menu_a" link="buttons.html"><i class="icon icon-caret-right"></i> 按钮 &amp; 图标</a></li>
                    <li><a class="menu_a" link="grid.html"><i class="icon icon-caret-right"></i>页面布局</a></li>
                    <li><a class="menu_a" link="tables.html"><i class="icon icon-caret-right"></i>表格</a></li>
                    <li><a class="menu_a" link="widgets.html"><i class="icon icon-caret-right"></i>插件</a></li>
					<li><a class="menu_a" link="charts.html"><i class="icon icon-caret-right"></i>曲线图 &amp; 统计图</a></li>
					<li><a class="menu_a" link="interface.html"><i class="icon icon-caret-right"></i>元素</a></li>
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


<ul class="typeahead dropdown-menu"></ul></body></html>

</body>
</html>