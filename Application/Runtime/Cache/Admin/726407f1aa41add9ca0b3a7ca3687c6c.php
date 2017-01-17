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
</head>
<body>
<!--主体部分-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="/index.php/admin/Main/index.html" class="tip-bottom" data-original-title="返回后台首页"><i class="icon-home"></i> 后台首页</a><span>|</span><a href="/index.php/admin/Student/changeData"> 学生平台</a><span>|</span><a href="/index.php/admin/Student/changeData" class="current"> 修改学生资料</a> </div>
        <h1>学生 修改个人资料</h1>
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
                        <th>
                            <span class="icon"> <i class="icon-pencil"></i> </span>
                            <span>修改学生个人资料</span>
                        </th>
                    </thead>
                    <tbody>
                        <form class="form-horizontal" role="form" action="/index.php/admin/student/changeData" method="post">
                        <tr>
                            <td style="text-align: center;width: 15%;">
                                <span3>学生学号:&nbsp;&nbsp;</span3>
                            </td><td>
                            <input type="text" class="form-control col-md-9" name="num" value="<?php echo ($data['num']); ?>" placeholder="学生学号" disabled>
                                <input type="hidden" name="id" value="<?php echo ($adminId); ?>">
                                <span2 id="sp1"></span2>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;width: 15%;">
                                <span3>学生昵称:&nbsp;&nbsp;</span3>
                            </td><td>
                            <input type="text" class="form-control col-md-9" name="username" id="cg2" onchange="return c2()" value="<?php echo ($data['username']); ?>" placeholder="学生昵称">
                                <span2 id="sp2"></span2>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;text-align: center;">
                                <span3>新的密码:&nbsp;&nbsp;&nbsp;&nbsp;</span3>
                            </td><td>
                                <input type="password" name="password" class="form-control col-md-9" id="cg3" onchange="return c3()" placeholder="新的密码">&nbsp;&nbsp;
                                <a onclick="show()"><span class="icon"> <i class='icon-eye-open'></i> </span></a>

                                <span2 id="sp3"></span2>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;text-align: center;">
                                <span3>请再输一遍密码:&nbsp;&nbsp;&nbsp;&nbsp;</span3>
                            </td><td>
                            <input type="password" class="form-control col-md-9" id="cg4" onchange="return c4()" placeholder="重新输入新的密码">
                            <span2 id="sp4"></span2>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;text-align: center;">
                                <span3>学生具体信息:&nbsp;&nbsp;</span3>
                            </td>
                            <td>
                                <input type="text" class="form-control col-md-9" id="cg5" name="info" value="<?php echo ($data['info']); ?>" placeholder="学生具体信息">
                                <span2 id="sp5"></span2>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;text-align: center;">
                                <span3>学生联系方式:&nbsp;&nbsp;</span3>
                            </td>
                            <td>
                                <input type="text" class="form-control col-md-9"  name="contactway" id="cg6" onchange="return c6()" value="<?php echo ($data['contactway']); ?>" placeholder="联系方式">
                                <span2 id="sp6"></span2>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><button type="submit" class="btn btn-warning"  onclick=" return sbm()" id="submit1
                           ">修  改</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-success">重  置</button>
                            <br>
                            <br>
                           </td>
                        </tr>
                    </tbody>
                </table>
                </form>
            </div>
    </div>
</div>
<!--end-main-container-part-->
<script src="/Public/js/Mainjs/jquery.min.js"></script>
<script>
    function show(){
       if ($("input#cg3").attr('type')=='password') {
            $('input#cg3')[0].type='text';
       }else{
            $('input#cg3')[0].type='password';
       }
    }
    function sbm(){
        var t1=$('#cg1').val();
        if(t1==''){
            $('#sp1').text('学号不能为空');
            return false;
        }else{
            $('#sp1').text('');

        }
        var t3=$('#cg3').val();
        if(t3==''){
            $('#sp3').text('密码不能为空');
            return false;
        }else{
            $('#sp3').text('');
        }
        var t5=$('#cg5').val();
        if(t5==''){
            $('#sp5').text('具体信息不能为空');
            return false;
        }else{
            $('#sp5').text('');
        }
        var t6=$('#cg6').val();
        if(t6==''){
            $('#sp6').text('联系信息不能为空');
            return false;
        }else{
            $('#sp6').text('');
        }
        if(c4() && c6()){
            return true;
        }else{
            return false;
        }
    }
    function c1(){
    }
    function c2(){
    }
    function c3(){
        var t=$('#cg3').val();
        var z= /^[0-9a-zA-Z_]{6,}$/;
        if(z.test(t)){
            $('#sp3').text('');
            return true;
        }else{
            $('#sp3').text('密码必须6位以上');
            return false;
        }
    }
    function c4(){
        var p1=$('#cg3').val();
        var p2=$('#cg4').val();
        if(p1==p2){
            $('#sp4').text('');
            return true;
        }else{
            $('#sp4').text('两次密码必须一样');
            return false;
        }
    }
    function c6(){
        var t=$('#cg6').val();
        var z= /^1\d{10}$/;
        if(z.test(t)){
            $('#sp6').text('');
            return true;
        }else{
            $('#sp6').text('电话号码格式不对');
            return false;
        }
    }
</script>

<ul class="typeahead dropdown-menu"></ul>
</body>
</html>