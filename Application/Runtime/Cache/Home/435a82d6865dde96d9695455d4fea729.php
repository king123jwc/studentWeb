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
                <li><a href="/index.php/Home/Index/index1">关于我们</a></li>
                <li><a href="/index.php/Home/Index/index2">服务范围</a></li>
                <li><a href="/index.php/Home/Index/index3">成功案例</a></li>
                <li><a href="/index.php/Home/Index/index4">团队介绍</a></li>
                <!--<li><a href="#pricing">Pricing</a></li>-->
                <li><a href="/index.php/Home/Index/index5">博客</a></li>
                <li><a href="#contact">联系我们</a></li>
                <li><a href="/index.php/Admin/Login/login">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> 登陆
                </a></li>
            </ul>
        </nav>

    </div>
</header>


 <!-- 成功案例
        =========================================== -->
        
        <section id="showcase">
            <div class="container">
                <div class="row wow fadeInDown" data-wow-duration="500ms">
                    <div class="col-lg-12">
                    
                        <!-- section title -->
                        <div class="title text-center">
                            <h2><span class="color">成功  案例</span></h2>
                            <div class="border"></div>
                        </div>
                        <!-- /section title -->
                    
                        <!-- portfolio item filtering -->
                        <div class="portfolio-filter clearfix">
                            <ul class="text-center">
                                <li><a href="javascript:void(0)" class="filter" data-filter="all">All</a></li>
                                <?php foreach($classifydata as $k=>$v):?>
                                <li><a href="javascript:void(0)" class="filter" data-filter=".<?php echo $v['idname'];?>"><?php echo $v['classifyname'];?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <!-- /portfolio item filtering -->
                        
                    </div> <!-- /end col-lg-12 -->
                </div> <!-- end row -->
            </div>  <!-- end container -->
    
            <!-- portfolio items -->
            <div class="portfolio-item-wrapper wow fadeInUp" data-wow-duration="500ms">
                <ul id="og-grid" class="og-grid">

                    <!--案例-->
                    <?php foreach($data as $k=>$v):?>
                        <?php if($v['demoname']==''):?>

                    <?php else:?>
                    <li class="mix <?php echo $v['idname'];?>">
                        <a href="javascript:void(0)" data-largesrc="/Public/<?php echo $v['pic'];?>" data-title="<?php echo $v['demoname'];?>" data-description="<?php echo $v['demoinfo'];?>" data-web="www.baidu.com">
                            <img src="/Public/<?php echo $v['thumb'];?>" alt="xiyou">
                            <div class="hover-mask">
                                <h3><?php echo $v['demoname'];?></h3>
                                    <span>
                                        <i class="fa fa-eye fa-2x"></i>
                                    </span>
                            </div>
                        </a>
                    </li>
                    <?php endif;?>
                    <?php endforeach;?>
                </ul> <!-- end og grid -->
            </div>  <!-- portfolio items wrapper -->
            
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
    $('#nav li:eq(3)').addClass('current');
    $('#nav li:eq(6)').addClass('current');
</script>