<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0057)http://www.jq22.com/demo/matrix-admin20150911/login.html# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>西柚工作室</title><meta charset="UTF-8">
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
            color: #B2DFEE;
            padding-left: 4px;
        }
    </style>
</head>
<body onkeydown="keydown()">
    <div id="loginbox">  
        <div class="control-group normal_text"> 
            <h2 style="color:#B2DFEE;font-size:28px;">西柚工作室后台登陆</h2>
            <!--<span style="font-size:14px;color:gray;">版权所有 © iProg网络科技有限公司 2015-2018</span>-->
        </div>
        <form id="loginform" class="form-vertical" action="/index.php/Admin/Main/layout" method="post" style="display: block;">
            <div class="control-group">
                <label class="control-label">登陆账号</label>
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user" style="font-size:16px;"></i></span><input type="text" name="username" placeholder="username">
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
            <div class="form-actions text-center">
                <span class=""><input type="submit" id="checkBtn" class="btn btn-info" style="width:335px;" value=" 登&nbsp;&nbsp;&nbsp;&nbsp;录"/></span>
            </div>
        </form>
        <div class="bs-docs-section text-center" style="margin-top: 2%"><p class="text-warning" style="font-size: 20px;"><?php echo ($warning); ?></p></div>

    </div>

</body></html>