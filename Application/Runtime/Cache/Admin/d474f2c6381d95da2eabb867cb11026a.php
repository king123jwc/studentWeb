<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0057)http://www.jq22.com/demo/matrix-admin20150911/login.html# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>学生组织网</title><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="/Public/css/AdminLogin/bootstrap.min.css">
	<link rel="stylesheet" href="/Public/css/AdminLogin/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="/Public/css/AdminLogin/matrix-login.css">
    <link href="/Public/css/AdminLogin/font-awesome.css" rel="stylesheet">
	<link href="/Public/css/AdminLogin/login-fonts.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        input{
            font-family: "Microsoft Yahei";
        }
        .control-label{
            color: #2EB4D8;
            padding-left: 4px;
        }
        span2{
            color: red;
            font-size: 10px;
        }
        span3{
            color: black;
            font-size: 15px;
        }
        a:hover{
            color: red;
        }
    </style>
</head>

<body onkeydown="keydown()">
<div id="loginbox" class="login" value="2">
    <div class="control-group normal_text">
        <h2 style="color:#2EB4D8;font-size:28px;">学生组织网后台登陆</h2>
    </div>
    <form id="loginform" class="form-vertical" action="/index.php/Admin/Admin/admin" method="post">
        <div class="control-group">
            <label class="control-label">学号登陆</label>
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user" style="font-size:16px;"></i></span><input type="text" name="num" placeholder="No.">
                </div>
            </div>
        </div>
        <div class="control-group2">
            <label class="control-label">登陆密码</label>
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock" style="font-size:16px;"></i></span><input type="password" name="password" placeholder="password">
                </div>
            </div>
        </div>
        <div class="control-group3">
            <label class="control-label">请输入验证码</label>
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lr"><i class="icon-picture" style="font-size:16px;"></i></span><input type="text" name="checkcode" placeholder="">
                    <img onclick="this.src='/index.php/Admin/Admin/authCode/'+Math.random();" style="cursor:pointer;" src="/index.php/Admin/Admin/authCode"/>
                </div>
            </div>
        </div><br><br>
        <div class="form-actions text-center">
                <span class="">
                    <input type="submit" id="checkBtn" class="btn btn-info" style="width:30%;" value=" 登&nbsp;&nbsp;录 "/>
                    <input type="reset" id="" class="btn btn-warning" style="width:30%;" value=" 重&nbsp;&nbsp;置 "/>
                    <br/><br>
                    <span><a href="#" onclick="sign()">我还没有账号,我要注册</a></span>

                    <br><br>
                    <span3> <a href="/index.php">返回首页面</a></span3>
                </span>
        </div>
    </form>
</div>

<div id="loginbox" class="sign" style="display: none;">
    <div class="control-group normal_text">
        <h2 style="color:#2EB4D8;font-size:28px;">注册新账号</h2>
    </div>
    <form id="loginform" class="form-vertical" action="/index.php/Admin/Admin/sign" method="post">
        <div class="control-group">
            <label class="control-label">学号</label>
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-cog" style="font-size:16px;"></i></span><input type="text" name="num" id="cg1" onchange="return c1()" placeholder="用户学号">
                    <span2 id="sp1"></span2>
                </div>
            </div>
        </div>
        <div class="control-group2">
            <label class="control-label">昵称</label>
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lb"><i class="icon-user" style="font-size:16px;"></i></span><input type="text" name="username" id="cg2" onchange="return c2()" placeholder="用户昵称">
                    <span2 id="sp2"></span2>
                </div>
            </div>
        </div>
        <div class="control-group3">
            <label class="control-label">新的密码</label>
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock" style="font-size:16px;"></i></span><input type="password" id="cg3" onchange="return c3()" name="password" placeholder="密码">
                    <span2 id="sp3"></span2>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">重新输入密码</label>
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock" style="font-size:16px;"></i></span><input type="password" id="cg4" onchange="return c4()" placeholder="重新输入密码">
                    <span2 id="sp4"></span2>
                </div>
            </div>
        </div>
        <div class="control-group2">
            <label class="control-label">具体信息(学院班级)</label>
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lv"><i class="icon-paste" style="font-size:16px;"></i></span><input type="text" id="cg5" name="info" placeholder="学院班级">
                    <span2 id="sp5"></span2>
                </div>
            </div>
        </div>
        <div class="control-group3">
            <label class="control-label">联系方式</label>
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="icon-phone" style="font-size:16px;"></i></span><input type="text" name="contactway" id="cg6" onchange="return c6()" placeholder="联系方式(电话)">
                    <span2 id="sp6"></span2>
                </div>
            </div>
        </div>
        <div class="form-actions text-center">
                <span class="">
                    <input type="submit" onclick="return sbm()" id="checkBtn" class="btn btn-info" style="width:30%;" value=" 注&nbsp;&nbsp;册 "/>
                    <input type="reset" id="" class="btn btn-warning" style="width:30%;" value=" 重&nbsp;&nbsp;置 "/>
                    <br/><br>
                    <span><a href="" onclick="login()">返回登陆页面</a></span>
                    <br><br>
                    <span3> <a href="/index.php">返回首页面</a></span3>
                </span>
        </div>
    </form>
</div>
<div></div>
</body>

<script src="/Public/js/jq.js"></script>
<script>
    function sign(){
        $('.login').hide();
        $('.sign').show();
    }
    function login(){
        $('.login').show();
        $('.sign').hide();
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
        if(c1() && c4() && c6()){
            return true;
        }else{
            return false;
        }
    }
    function c1(){
        var t=$('#cg1').val();
        var z= /\d{9}/;
        if(z.test(t)){
            $('#sp1').text('');
            return true;
        }else{
            $('#sp1').text('学号必须是九位数字');
            return false;
        }
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

</html>