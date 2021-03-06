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
<script type="/Public/Home/text/javascript" src="js/jquery.min.js"></script>
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
		<h3 class="style pull-left">校内学生组织简介</h3>
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
			   <h3>扬州大学团委</h3>
			   <p>共青团扬州大学委员会成立于1996年，下设办公室、组宣部、学术科创中心、实践创业中心、志愿服务中心、素质拓展中心、青年发展研究所、青年联合会、新媒体运营中心等9个部室。现有分团委27个，团总支20个，基层团工委1个，团支部943个，共青团员35162名（其中女团员18507名，占团员总数的52.63%；少数民族团员360名，占团员总数的1.02%。）。
　　近年来，在校党委和上级团组织的领导下，学校共青团工作坚持高举邓小平理论伟大旗帜，以“三个代表”重要思想为指导，认真实践科学发展观，紧紧围绕学校中心工作，以提高团员青年思想政治素质为重点，切实加强团员青年的思想政治教育；以“党建带团建”为原则，着力巩固和深化基层团组织建设；以拓展团员青年素质为主线，全力抓好学风建设、科技创新建设和校园文化建设；以服务团员青年成长成才为要求，不断改进团的工作作风和工作方式，诠释新内容，尝试新形式，创造新载体，拓展新领域，全面推进团的各项工作，取得了一定的成绩，有力地推动了我校共青团各项事业的发展。
　　校团委先后被团中央和共青团江苏省委表彰为“中国青年志愿者行动组织奖”、“江苏省五四红旗团委标兵”、“江苏省增强共青团员意识主题教育活动先进团委”、“江苏省共青团电子政务建设先进单位”，并于2007年12月被表彰为“全国五四红旗团委”。大学生社会实践工作连续15年荣获全国先进，并于2005年被确定为全国加强和改进大学生思想政治工作十大典型之一。</p>
			   <a class="btn btn1 btn3" href="http://tuanwei.yzu.edu.cn/">read more</a>		
               			   <h3>扬州大学学生会</h3>
			   <p>扬州大学学生会是在校党委和省学联的领导下，在校团委的具体指导下的全校学生的群众性组织，现为江苏省学生联合会副主席单位。
校学生会以"全心全意为同学服务"为宗旨，以"自我服务、自我管理、自我教育"为目的，于2007年由活动型向管理型、服务型转变，服务于学校党政的中心工作，致力于校风、学风建设，努力营造高品位的校园文化氛围。团结带领广大同学在学习中成长，在实践中成才，切实做好同学利益的忠实维护者，做好联系学校和广大同学的桥梁和纽带，并在不懈努力下不断提高在同学中的影响力和号召力，得到了全校师生的广泛认可和支持。扬州大学学生会宗旨
全心全意为同学服务。以发扬我校同学勤奋学习、刻苦钻研的优良传统、树立良好的学风、广泛开展学术实践活动、培养广大同学的创新精神和实践能力、提高科技素质和人文素质的工作目标为己任，全心全意为同学服务。</p>
			   <a class="btn btn1 btn3" href="http://baike.so.com/doc/9857244-10204236.html">read more</a>
               			   <h3>扬州大学生学社团联合会</h3>
			   <p>扬州大学学生社团联合会是在校党委和上级学联的领导下，在校团委具体指导下，以学生社团为载体，以繁荣校园文化，服务全校同学为主要原则和宗旨，承担学生社团的指导和日常管理工作的全校学生社团的联合组织。目前，学校各类学生社团发展迅速，涌现出邓小平理论暨"三个代表"重要思想研究会、大学生心理协会、大学生科学技术协会、大学生艺术团、青年志愿者协会、绿行社等一批多次获得省级以上奖励表彰的"明星社团"。活跃于校内的400余个学生社团，构筑成一道独特的校园风景线，正逐渐成为广大学生教育自我的阵地，展示自我的舞台，发展自我的摇篮，为校园文化建设不断作出新的、更大的贡献。</p>
			   <a class="btn btn1 btn3" href="http://baike.so.com/doc/4841909-5058938.html">read more</a>
               			   <h3>扬州大学青年志愿者协会</h3>
			   <p>扬州大学青年志愿者协会是在校党委领导和团委的指导下于二○○一年十一月成立的青年志愿者组织，经过八年多的发展，逐步形成了完善的组织机构，制定了完整的协会章程，以及一系列的管理条例。贯彻和推广"奉献、友爱、互助、进步"协会精神，传递爱心，传递文明。立足校园，培养大学生的公民意识、奉献精神和服务能力;面向社会，为社会公益事业和社会保障事业提供志愿服务。规划、组织青年志愿者协会活动;协调全校的各级各类青年志愿者组织开展工作;加强与校外志愿者组织和团体的交流。扬州大学青年志愿者协会(Yang Zhou University Young Volunteers Association简称YZUYVA)是由志愿从事社会公益、社会服务事业的在校学生以自愿为原则组成的全校性社团组织。本协会受江苏省青年志愿者协会的领导，由校团委指导。协会宗旨: 通过组织和指导全校青年志愿者服务活动，推动社会主义精神文明建设，发挥大学生在推进两个文明建设中的作用，全面提高青年素质，为社会协调发展和全面进步作出贡献。协会精神：“奉献、友爱、互助、进步”。</p>
			   <a class="btn btn1 btn3" href="http://baike.so.com/doc/4337389-4542277.html">read more</a>  
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