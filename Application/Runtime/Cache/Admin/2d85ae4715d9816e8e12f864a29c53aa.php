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

        function dj(obj){
            alert($(obj).val());
        }

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
        <div id="breadcrumb"> <a href="/index.php/Admin/Main/index.html" class="tip-bottom" data-original-title="返回后台首页"><i class="icon-home"></i> 后台首页</a><span>|</span><a href="/index.php/Admin/Unit/communityRevision"> &nbsp;社团管理</a><span>|</span><a href="/index.php/Admin/Unit/communityRevision" class="current"> 社团资料修改</a> </div>
        <h1>社团资料修改</h1>
    </div>
    <!--End-breadcrumbs-->
    <style type="text/css">
        span3 {font-size: 18px;color: #666666; display : inline}
        span4 {font-size: 15px;color: red; display : inline}
        .table th, .table td {
            text-align: left;
        }
        .table td textarea{
            width: 80%;
            height: 100%;
        }
        #checkbox{
            margin-top: -7px;
        }
    </style>
    <!--新增管理员-->
    <div class="container-fluid" style="overflow-y: auto; overflow-x: hidden; height: 460px;">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <th colspan="2">
                    <span class="icon"> <i class='icon-file-alt'></i> </span>&nbsp;
                        <span>修改 社团 资料</span>
                    <span style="float: right;"><a href="/index.php/Admin/Unit/usedActivity">
                        <span class="icon"> <i class="icon-group"></i> </span>
                        <span>社团 曾经 活动</span></a>
                    </span>
                </th>
                </thead>
                <tbody>
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" action="/index.php/Admin/Unit/xiugai" method="post">
                        <tr>
                            <td style="text-align: center;width: 15%;">
                                <span3>社团负责人学号:&nbsp;&nbsp;</span3>
                            </td><td>
                            <input type="hidden" name="id" value="<?php echo ($data['id']); ?>"></input>
                            <input type="text" class="form-control col-md-9" id="" name="usernum" disabled value="<?php echo $_SESSION['usernum'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;text-align: center;">
                                <span3>社团负责人照片:&nbsp;&nbsp;&nbsp;&nbsp;</span3>
                            </td><td>
                                <img src="/Public/<?php echo ($data['peoplethumb']); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;width: 15%;">
                                <span3>社团名称:&nbsp;&nbsp;</span3>
                            </td><td>
                            <input type="text" class="form-control col-md-9" name="unitname" value="<?php echo ($data['unitname']); ?>" disabled>
                            </td>
                        </tr>
                        <tr style="height:150px;">
                            <td style="width: 15%;text-align: center;">
                                <span3>社团介绍:&nbsp;&nbsp;&nbsp;&nbsp;</span3>
                            </td>
                            <td>
                            <textarea type="text" class="form-control col-md-9" name="unitinfo" row="6" id="exampleInputext1" value="123" placeholder="社团介绍" ><?php echo ($data['unitinfo']); ?></textarea>
                            <span4 id="s1"></span4>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;width: 15%;">
                                <span3>社团logo:&nbsp;&nbsp;</span3>
                            </td><td>
                            <input type="file" id="exampleInputext3" name="unitlogo">
                            <span4 id="s3"></span4>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;;">
                                <span3>社团成立时间:&nbsp;&nbsp;</span3>
                            </td><td>
                                <input type="text" name="holdtime" id="J-xl" value="<?php echo ($data['holdtime']); ?>"
                                <?php
 if($data['isfirst'] == '1'){ echo 'disabled'; } ?>
                                >
                            <span4 id="s2">社团成立时间只能修改一次!!(<?php
 if($data['isfirst'] == '1'){ echo '您已经修改过了'; }else{ echo '您尚未修改过'; } ?>)</span4>
                            </td>
                        </tr>
                        <tr>
                            <td><button type="submit" class="btn btn-info"  onclick="return check()" id="submit1
                           ">修&nbsp;&nbsp;改</button>
                           </td>
                           <td>
                               <button type="reset" class="btn btn-warning" id="submit1">重新&nbsp;&nbsp;修改</button>
                           </td>
                        </tr>
                        <tr><td></td></tr>
                        <tr><td></td></tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--end-main-container-part-->
<script src="/Public/js/Mainjs/jquery.min.js"></script>
<script type="text/javascript" src="/Public/js/laydate.dev.js"></script>

<script>
        laydate({
            elem: '#J-xl'
        });
    // function check(){

    //     var i1=$('#exampleInputext1').val();
    //     var i2=$('#exampleInputext2').val();
    //     var i3=$('#exampleInputext3').val();
    //     var i4=$('#exampleInputext4').val();
    //     var i5=$('#exampleInputext5').val();
    //     if (i1=='') {
    //         $('#s1').text('负责人照片不能为空');
    //         return false;
    //     }
    //     if(i2==''){
    //         $('#s2').text('社团名称不能为空');
    //         return false;
    //     }
    //     if (i3==''){
    //         $('#s3').text('社团介绍不能为空');
    //         return false;
    //     }
    //     if(i4==''){
    //         $('#s4').text('策划书名称不能为空');
    //         return false;
    //     }
    //     if(i5==''){
    //         $('#s5').text('策划书不能为空');
    //         return false;
    //     }
        
    // }


</script>

<ul class="typeahead dropdown-menu"></ul>
</body>
</html>