<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="西柚工作室">

    <meta name="author" content="xiyou office">

    <title>西柚工作室</title>

    <!-- Mobile Specific Meta
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />

    <!-- CSS
    ================================================== -->
    <!-- Fontawesome Icon font -->
    <link rel="stylesheet" href="/Public/css/Homecss/font-awesome.min.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="/Public/css/Homecss/bootstrap.min.css">
    <!-- Animate.css -->

    <link rel="stylesheet" href="/Public/css/Homecss/animate.css">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/Public/css/Homecss/owl.carousel.css">
    <!-- Grid Component css -->
    <link rel="stylesheet" href="/Public/css/Homecss/component.css">
    <!-- Slit Slider css -->
    <link rel="stylesheet" href="/Public/css/Homecss/slit-slider.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/Public/css/Homecss/main.css">
    <!-- Media Queries -->
    <link rel="stylesheet" href="/Public/css/Homecss/media-queries.css">

    <!--
    Google Font
    =========================== -->

    <!-- Oswald / Title Font -->
    <link href='/Public/css/Homecss/titlefonts.css' rel='stylesheet' type='text/css'>
    <!-- Ubuntu / Body Font -->
    <link href='/Public/css/Homecss/bodyfonts.css' rel='stylesheet' type='text/css'>

    <!-- Modernizer Script for old Browsers -->
    <script src="/Public/js/Homejs/modernizr-2.6.2.min.js"></script>

</head>
<style type="text/css">
    h1{
        display: inline;
    }
</style>
<body id="body">
<!--导航条-->
<header id="navigation" class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">

            <!-- 标志 -->
            <a class="navbar-brand" href="#body">
                <h1 id="logo">
                    <img src="/Public/images/xiyou2.png" alt="xiyou" />
                </h1>
                <span class="color">西柚工作室</span>
            </a>
            <!-- /logo -->
        </div>

        <nav class="collapse navbar-collapse navbar-right" role="Navigation">
            <ul id="nav" class="nav navbar-nav">
                <li><a href="/index.php/Home/Index/index">网站首页</a></li>
                <li><a href="/index.php/Home/Index/about">关于我们</a></li>
                <li><a href="/index.php/Home/Index/service">服务范围</a></li>
                <li><a href="/index.php/Home/Index/showcase">成功案例</a></li>
                <li><a href="/index.php/Home/Index/team">团队介绍</a></li>
                <!--<li><a href="#pricing">Pricing</a></li>-->
                <li><a href="/index.php/Home/Index/blog">博客</a></li>
                <li><a href="#contact">联系我们</a></li>
                <li><a href="/index.php/Admin/Login/login">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> 登陆
                </a></li>
            </ul>
        </nav>

    </div>
</header>


<!-- 服务范围
        ==================================== -->
        
        <section id="services" class="bg-one">
            <div class="container">
                <div class="row">
                    
                    <!-- section title -->
                    <div class="title text-center wow fadeIn" data-wow-duration="500ms">
                        <h2><span class="color">服务  范围</span></h2>
                        <div class="border"></div>
                    </div>
                    <!-- /section title -->
                    
                    <!-- Single Service Item -->
                    <article class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms">
                        <div class="service-block text-center">
                            <div class="service-icon text-center">
                                <i class="fa fa-wordpress fa-5x"></i>
                            </div>
                            <h3>网页  设计</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur.. Sed id lorem eget orci dictum facilisis vel id tellus. Nullam iaculis arcu at mauris dapibus consectetur.</p>
                        </div>
                    </article>
                    <!-- End Single Service Item -->
                    
                    <!-- Single Service Item -->
                    <article class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="200ms">
                        <div class="service-block text-center">
                            <div class="service-icon text-center">
                                <i class="fa fa-desktop fa-5x"></i>
                            </div>
                            <h3>响应式 设计</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur.. Sed id lorem eget orci dictum facilisis vel id tellus. Nullam iaculis arcu at mauris dapibus consectetur.</p>
                        </div>
                    </article>
                    <!-- End Single Service Item -->
                    
                    <!-- Single Service Item -->
                    <article class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="400ms">
                        <div class="service-block text-center">
                            <div class="service-icon text-center">
                                <i class="fa fa-android fa-5x"></i>
                            </div>
                            <h3>Android APP 开发</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur.. Sed id lorem eget orci dictum facilisis vel id tellus. Nullam iaculis arcu at mauris dapibus consectetur.</p>
                        </div>
                    </article>
                    <!-- End Single Service Item -->
                    
                    <!-- Single Service Item -->
                    <article class="col-md-4 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="200ms">
                        <div class="service-block text-center">
                            <div class="service-icon text-center">
                                <i class="fa fa-apple fa-5x"></i>
                            </div>
                            <h3>IOS APP 开发</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur.. Sed id lorem eget orci dictum facilisis vel id tellus. Nullam iaculis arcu at mauris dapibus consectetur.</p>
                        </div>
                    </article>
                    <!-- End Single Service Item -->
                    
                    <!-- Single Service Item -->
                    <article class="col-md-4 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="400ms">
                        <div class="service-block text-center">
                            <div class="service-icon text-center">
                                <i class="fa fa-eye fa-5x"></i>
                            </div>
                            <h3>平面设计 UI</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur.. Sed id lorem eget orci dictum facilisis vel id tellus. Nullam iaculis arcu at mauris dapibus consectetur.</p>
                        </div>
                    </article>
                    <!-- End Single Service Item -->
                    
                    <!-- Single Service Item -->
                    <article class="col-md-4 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                        <div class="service-block text-center kill-margin-bottom">
                            <div class="service-icon text-center">
                                <i class="fa fa-signal fa-5x"></i>
                                <!--<i class="fa fa-link fa-5x"></i>-->
                            </div>
                            <h3>网 络</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur.. Sed id lorem eget orci dictum facilisis vel id tellus. Nullam iaculis arcu at mauris dapibus consectetur.</p>
                        </div>
                    </article>
                    <!-- End Single Service Item -->
                        
                </div>      <!-- End row -->
            </div>      <!-- End container -->
        </section>   <!-- End section -->


<!--联系我们-->
<section id="contact-us">
    <div class="container">
        <div class="row">
            <div class="title text-center wow fadeIn" data-wow-duration="500ms">
                <h2><span class="color">联系  我们</span></h2>
                <div class="border"></div>
				</div>
				<div class="col-md-12"></div>
				<div class="col-sm-3 col-sm-offset-3 col-md-3 col-md-offset-3">
					<h3>联系 方式</h3>
                    <br>
					<p><img src="/Public/images/Home/xinlang.png"/>&nbsp;官方微博: </p>
					<p><img src="/Public/images/Home/mail.png"/>&nbsp;咨询邮箱: </p>
					<p><img src="/Public/images/Home/tel.png" />&nbsp;咨询热线:</p>
					<p><img src="/Public/images/Home/weixin.png" />&nbsp;微信:</p>
				</div>
				<div class="col-sm-5 col-md-5 ">
                    <h3>&nbsp;留&nbsp;言</h3>
					<form action="/index.php/Home/Index/contact" method="post" role="form">
						<div class="col-md-12">
							<input type="text" class="form-control" name="contactname" placeholder="名称">
						</div>
						<div class="col-md-12">
							<input type="text" class="form-control" name="contactway" placeholder="联系方式(手机或邮箱)">
						</div>
						<div class="col-md-12">
							<input type="text" class="form-control" name="subject" placeholder="项目类型">
						</div>
						<div class="col-md-12">
							<textarea class="form-control" rows="3" name="message" placeholder="留言信息"></textarea>
						</div>
						<div class="col-md-12">
							<input type="submit" value="留&nbsp;&nbsp;言" class="form-control">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>


<footer id="footer" class="bg-one">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-duration="500ms">
            <div class="col-lg-12">
                脚部在这里
            </div> <!-- end col lg 12 -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</footer> <!-- end footer -->

<!-- Back to Top
============================== -->
<a href="javascript:;" id="scrollUp">
    <i class="fa fa-angle-up fa-2x"></i>
</a>

		<!-- Main jQuery -->
		<script src="/Public/js/Homejs/jquery-2.1.1.min.js"></script>
		<!-- Bootstrap 3.1 -->
		<script src="/Public/js/Homejs/bootstrap.min.js"></script>
		<!-- Slitslider -->
		<script src="/Public/js/Homejs/jquery.slitslider.js"></script>
		<script src="/Public/js/Homejs/jquery.ba-cond.min.js"></script>
		<!-- Parallax -->
		<script src="/Public/js/Homejs/jquery.parallax-1.1.3.js"></script>
		<!-- Owl Carousel -->
		<script src="/Public/js/Homejs/owl.carousel.min.js"></script>
		<!-- Portfolio Filtering -->
		<script src="/Public/js/Homejs/jquery.mixitup.min.js"></script>
		<!-- Custom Scrollbar -->
		<script src="/Public/js/Homejs/jquery.nicescroll.min.js"></script>
		<!-- Jappear js -->
		<script src="/Public/js/Homejs/jquery.appear.js"></script>
		<!-- Pie Chart -->
		<script src="/Public/js/Homejs/easyPieChart.js"></script>
		<!-- jQuery Easing -->
		<script src="/Public/js/Homejs/jquery.easing-1.3.pack.js"></script>
		<!-- tweetie.min -->
		<script src="/Public/js/Homejs/tweetie.min.js"></script>
		<!-- Google Map API -->
		
		<!-- Highlight menu item -->
		<script src="/Public/js/Homejs/jquery.nav.js"></script>
		<!-- Sticky Nav -->
		<script src="/Public/js/Homejs/jquery.sticky.js"></script>
		<!-- Number Counter Script -->
		<script src="/Public/js/Homejs/jquery.countTo.js"></script>
		<!-- wow.min Script -->
		<script src="/Public/js/Homejs/wow.min.js"></script>
		<!-- For video responsive -->
		<script src="/Public/js/Homejs/jquery.fitvids.js"></script>
		<!-- Grid js -->
		<script src="/Public/js/Homejs/grid.js"></script>
		<!-- Custom js -->
		<script src="/Public/js/Homejs/custom.js"></script>

</body>
</html>

<script type="text/javascript">
    $('#nav li:eq(2)').addClass('current');
    $('#nav li:eq(6)').addClass('current');
</script>