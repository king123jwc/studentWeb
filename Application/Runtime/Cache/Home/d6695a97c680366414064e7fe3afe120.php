<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>高校学生组织网</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Skate Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap -->
<link href="/Public/Home/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!----font-Awesome----->
<link rel="stylesheet" href="/Public/Home/fonts/css/font-awesome.min.css">
<!----font-Awesome----->
<!-- start plugins -->
<script type="text/javascript" src="/Public/Home/js/jquery.min.js"></script>
<!-- Owl Carousel Assets -->
<link href="/Public/Home/css/owl.carousel.css" rel="stylesheet">
<script src="/Public/Home/js/owl.carousel.js"></script>
		<script>
			$(document).ready(function() {

				$("#owl-demo").owlCarousel({
					items : 4,
					lazyLoad : true,
					autoPlay : true,
					navigation : true,
					navigationText : ["", ""],
					rewindNav : false,
					scrollPerPage : false,
					pagination : false,
					paginationNumbers : false,
				});

			});
		</script>
		<!-- //Owl Carousel Assets -->
</head>
<body>
<div class="header_bg">
<div class="container">
	<div class="header">
		<div class="logo">
			<h3><a href="/index.php/Home/Index/index"><img src="/Public/Home/images/libra-logo1.png"></a></h3>
		</div>
		<div class="h_menu">
		<a id="touch-menu" class="mobile-menu" href="#">menu</a>
		<nav>
		<ul class="menu list-unstyled">
			<li class="activate"><a href="index.html">首页</a></li>
			<li><a href="/index.php/Home/Index/about">学生组织</a></li>
			<li><a href="/index.php/Home/Index/404">申报活动</a></li>
			<li><a href="/index.php/Home/Index/portfolio">活动进行</a></li>
			<li><a href="/index.php/Home/Index/wqhd">往期活动</a></li>
			<li><a href="/index.php/Home/Index/blog">校园新闻</a></li>
            <?php
 if(!isset($_SESSION['username'])){ echo '<li><a href="/index.php/Admin/Admin/admin">登录</a></li>'; }else{ echo "<li><a href='/index.php/Admin/Main/index'><span style='font-size: 15px;color: red;'>欢迎用户:".$_SESSION['username']."登录</span></a></li>"; echo '<li><a href="/index.php/Admin/Main/layout">退出登录</a></li>'; } ?>
		</ul>
		</nav>
		<script src="/Public/Home/js/menu.js" type="text/javascript"></script>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="grid_12">
      <img src="/Public/Home/images/color_stripe.jpg" class="img-responsive" class="c_stripe">
    </div>
</div>
</div>
<div class="main_bg"><!-- start main -->
<div class="container">
	<div class="main_grid1">
		<h3 class="style pull-left">进行中活动</h3>
		<!--<ol class="breadcrumb pull-right">
		  <li><a href="index.html">Home</a></li>
		  <li class="active">about us</li>
		</ol>-->
		<div class="clearfix"></div>
	</div>
</div>
</div>
<div class="main_btm1"><!-- start main_btm -->
<div class="container">
	<div class="about">
		<div class="about-desc">
        <hr color="#000000">
        <?php foreach($data as $k=>$v):?>
			   <h3><?php echo $k+1;?>.正在进行的活动</h3>
               <h3>活动名称:  <?php echo $v['activename'];?></h3>
               <h3>活动时间:  <?php echo $v['holdtime'];?></h3>
			   <h3>活动简介:  <?php echo $v['activeinfo'];?></h3>
               <h3>报名人数:  <?php $count=count(explode(',',$v['enterid']))-2; echo $count;?></h3>
			   <a class="btn btn1 btn3" href="/index.php/Home/Index/baoming?id=<?php echo $v['id'];?>">我也报名</a>	
               <hr color="#000000">
        <?php endforeach;?>        
		</div>
		<div class="about_bottom">
		</div>
	</div><!----//End-img-cursual---->
</div>
</div>
<div class="footer_bg"><!-- start footer -->
<div class="container">
	<div class="footer">
		<div class="col-md-4 footer1_of_3">
			<div class="f_logo">
				<a href="index.html"><img src="/Public/Home/images/1.jpg" alt=""/></a>
                <a href="index.html" style="padding-left:20px; padding-top:20px"><img src="/Public/Home/images/2.png" alt=""/></a>
			</div>		
			
		</div>
		<div class="col-md-2 footer1_of_3">
			<h4>校内链接</h4>
			<ul class="list-unstyled f_list">
                                <li><a href="testimonials.html">网上选课</a></li>
                                <li><a href="http://eol.yzu.edu.cn/meol/homepage/common/">网络教学</a></li>
                                <li><a href="http://www.yzu.edu.cn/col/col37727/index.html">图书馆</a></li>
                                <li><a href="http://jyzd.yzu.edu.cn">招生就业</a></li>
                                <li><a href="http://www.yzu.edu.cn/col/col37637/index.html">校园风光</a></li>
			</ul>
		</div>
		<div class="col-md-2 footer1_of_3">
			<h4>友情链接</h4>
			<ul class="list-unstyled f_list">
				                <li><a href="http://www.sohu.com/">搜狐网</a></li>
                                <li><a href="http://www.sina.com.cn/">新浪网</a></li>
                                <li><a href="http://www.qq.com/">腾讯网</a></li>
                                <li><a href="http://www.chsi.com.cn/">学信网</a></li>
                                <li><a href="http://www.yangzhou.gov.cn/">中国扬州</a></li>
			</ul>
		</div>
		<div class="col-md-4 footer_of_3">
			<h4><span>留言板</span></h4>
			<div class="col-xs-3 f_pic">
					<form action="/index.php/Home/Index/contact" method="post" role="form">
						<div class="col-md-12" style="padding-bottom:10px">
							<input type="text" class="form-control" name="contactname" placeholder="姓名" style="width:300px">
						</div>
						<div class="col-md-12" style="padding-bottom:10px">
							<input type="text" class="form-control" name="contactway" placeholder="联系方式(手机或邮箱)" style="width:300px">
						</div>
						<div class="col-md-12" style="padding-bottom:10px">
							<input type="text" class="form-control" name="subject" placeholder="留言类型" style="width:300px">
						</div>
						<div class="col-md-12" style="padding-bottom:10px">
							<textarea class="form-control" rows="3" name="message" placeholder="留言信息" style="width:300px"></textarea>
						</div>
						<div class="col-md-12" style="padding-bottom:10px">
							<input type="submit" value="留&nbsp;&nbsp;言" class="form-control">
						</div>
					</form>
				<div class="clearfix"></div>
			</div>
			<div class="blog_list">
				
			<div class="blog_list">
				<div class="col-xs-3 f_pic">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<div class="footer1_bg"><!-- start footer1 -->
<div class="container">
	<div class="footer1">
		<div class="copy pull-left">
			<td height="120" bgcolor="#8c1515" style="line-height:20px; text-align:center; vertical-align:middle; color:#f9ebb9;">@2015 扬州大学 版权所有 苏ICP备 12022580 号 校长信箱<br/>
地址：中国·江苏·扬州市大学南路88号 电话(TEL):86-514-87971858 传真(FAX):86-514-87311374<br/>
		</div>
		<div class="soc_icons pull-right">
			<ul class="list-unstyled text-center">
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-rss"></i></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
</body>
</html>