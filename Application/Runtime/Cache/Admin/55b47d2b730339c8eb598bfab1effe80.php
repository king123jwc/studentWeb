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
        <div id="breadcrumb"> <a href="/index.php/admin/Main/index.html" class="tip-bottom" data-original-title="返回后台首页"><i class="icon-home"></i> 后台首页</a><span>|</span><a href="/index.php/admin/apply/createUnit"> &nbsp;我的申请</a><span>|</span><a href="/index.php/admin/Apply/applyInfo" class="current"> 申请社团管理员</a> </div>
        <h1>申请  社团管理员</h1>
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
                    <span class="icon"> <i class="icon-plus"></i> </span>
                    <span>申请  管理员</span>
                    <span style="float: right;"><a href="/index.php/admin/apply/applyStatus">
                        <span class="icon"> <i class='icon-eye-open'></i> </span>&nbsp;
                        <span>申请  状态</span></a>
                    </span>
                </th>
                </thead>
                <tbody>
                        <form class="form-horizontal" role="form" enctype="multipart/form-data" action="/index.php/admin/Apply/applyInfo" method="post">
                        <tr>
                            <td style="text-align: center;width: 15%;">
                                <span3>申请人学号:&nbsp;&nbsp;</span3>
                            </td><td>
                            <input type="hidden" name="adminid" value="<?php echo $_SESSION['userid'];?>"></input>
                            <input type="text" class="form-control col-md-9" id="exampleInputext1" name="username" disabled value="<?php echo $_SESSION['usernum'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;text-align: center;">
                                <span3>申请人照片:&nbsp;&nbsp;&nbsp;&nbsp;</span3>
                            </td><td>
                                <input type="file" name="adminpicthumb" class=" col-md-9" id="exampleInputext2" onchange="return newpd()">
                                <span4 id="s4"></span4>
                            </td>
                        </tr>
                        <tr style="height:150px;">
                            <td style="width: 15%;text-align: center;">
                                <span3>申请说明:&nbsp;&nbsp;&nbsp;&nbsp;</span3>
                            </td>
                            <td>
                            <textarea type="text" class="form-control col-md-9" name="instruction" row="6" id="exampleInputext3" placeholder="申请理由"></textarea>
                            <span4 id="span4"></span4>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%;text-align: center;">
                                <span3>申请社团:&nbsp;&nbsp;&nbsp;&nbsp;</span3>
                            </td><td>
                                <select id="s1" class="form-control" name="unitid" style="width: 20%">
                                    <option value="0">----请选择社团----</option>
                                    <?php foreach($unit as $k=>$v):?>
                                    <option value="<?php echo ($v['id']); ?>"><?php echo ($v['unitname']); ?></option>
                                    <?php endforeach;?>
                                </select>
                                <span4 id="span5"></span4> 
                            </td>
                         </tr>
                        
                        <tr>
                            <td style="width: 15%;text-align: center;">
                                <span3>请求哪个单位老师批准:&nbsp;&nbsp;</span3>
                            </td>
                            <td>
                                <select id="s2" class="form-control" name="answerunitid" style="width: 20%">
                                    <option value="0">--请选择批准单位--</option>
                                    <?php foreach($tunit as $k=>$v):?>
                                        <option value="<?php echo ($v['aid']); ?>"><?php echo ($v['unitname']); ?></option>
                                    <?php endforeach;?>
                                </select>
                                <span4 id="span6"></span4>                              
                            </td>
                        </tr>
                        <tr>
                            <td><button type="submit" class="btn btn-info"  onclick=" return check()" id="submit1
                           ">提出&nbsp;&nbsp;申请</button>
                           </td>
                           <td>
                               <button type="reset" class="btn btn-warning" id="submit1">重新&nbsp;&nbsp;填写</button>
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
<script>
    function newpd(){
        var nn=$('#exampleInputext2').val();
        if(nn==''){
            $('#s4').text('申请人头像不能为空');
            return false;
        }else{
            $('#s4').text('');
            return true;
        }
    }
    function check(){
        var i3=$('#exampleInputext3').val();
        var s1=$('#s1').val();
        var s2=$('#s2').val();
        if(s1==0){
            $('#span5').text('申请社团不能为空');
            return false;
        }else{
            $('#span5').text('');
            return true;
        }
        if(s2==0){
            $('#span6').text('提交单位不能为空');
            return false;
        }else{
            $('#span6').text('');
            return true;
        }
        return false;
        if(i3==''){
            $('#span4').text('申请理由不能为空');
            return false;
        }else{
            if (!newpd()){
                return false;
            }else{
                if(!nname()){
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