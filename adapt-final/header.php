<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<title>Adapt-about</title>
	<meta name="author" content="themsflat.com">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="stylesheet/style.css">
	<link rel="stylesheet" type="text/css" href="stylesheet/colors/color1.css" id="colors">  
	<link rel="stylesheet" type="text/css" href="stylesheet/responsive.css">
	<style>
		.image_card_background
		{
			background-color: #fff;
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'poppins', sans-serif;
		}
		.cont_img_card
		{
			position: relative;
			display: flex;
			box-sizing: border-box;
			flex-wrap: wrap;
			justify-content: space-around;
			width: 100%;
			transform-style: preserve-3d;
		}
		.cont_img_card .box
		{
			position: relative;
			width: 300px;
			height: 400px;
			box-sizing: border-box;
			box-sizing: border-box;
			margin: 20px 10px;
			perspective: 1000px;
			overflow: hidden;
			box-shadow: 0px 0px 2px 2px #888888;
			transform-style: preserve-3d;
		}
		.cont_img_card .box .imgbx
		{
			position: absolute;
			top: 0;
			left: 0;
			box-sizing: border-box;
			width: 100%;
			height: 100%;
			transform-origin: top;
			transform-style: preserve-3d;
			transition: 0.5s;
			transition-delay: .2s;
		}
		.cont_img_card .box:hover .imgbx
		{
			transform: rotateX(-90deg);
			box-sizing: border-box;
			opacity: 0;
			transition-delay: .2s;
		}
		.cont_img_card .box .imgbx img
		{
			position: absolute;
			top: 0;
			left: 0;
			box-sizing: border-box;
			width: 300px;
			height: 100%;
			object-fit: cover;
		}
		.cont_img_card .box .contentbox h1
		{
			font-size: 22px;
			color: #18ba60;
		}
		.cont_img_card .box .contentbox p
		{
			font-size: 12px;
			font-weight: lighter;
			text-align: left;
			color: #000;
			justify-content: center;
		}
		.cont_img_card .box .contentbox span
		{
			color: #222222;
		}		
		.cont_img_card .box .contentbox
		{
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: #fff;
			overflow: auto;
			display: flex;
			justify-content: center;
			padding: 30px;
			transform-origin: bottom;
			transform-style: preserve-3d;
			box-sizing: border-box;
			transition: 0.5s;
			transform: rotateX(90deg);
			opacity: 0;
		}
		.cont_img_card .box:hover .contentbox
		{
			transform: rotateX(0deg);
			opacity: 1;
			box-sizing: border-box;
			color: #fff;
			transition-delay: .0s;
		}
	</style>
</head>
<body>
	<div class="boxed blog">
		<div id="loading-overlay">
			<div class="loader"></div>
		</div>
		
		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="flat-infomation">
							<li class="phone">Call us: <a href="#" title="phone">+91 96382 11219</a></li>
							<li class="email">Email: <a href="#" title="email">info@adaptassociates.com</a></li>
						</ul>
						<ul class="flat-social">
							<li>
								<a href="#" title=""><i class="fa fa-facebook-f"></i></a>
							</li>
							<li>
								<a href="#" title=""><i class="fa fa-instagram"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<header id="header" class="header bg-color">
			<div class="container">
				<div class="row">
					<div class="header-wrap">
						<div id="logo" class="logo">
							<a href="index.php" title="">
								<h1 style="color: #18ba60; font-weight: 700;">A D A P T</h1>
								<!-- <img src="images/logo.png" alt="logo Finance Business" /> -->
							</a>
						</div>
						<div class="nav-wrap">
							<div class="btn-menu">
								<span></span>
							</div>
							<nav id="mainnav" class="mainnav">
								<ul class="menu">
									<li class="active">
										<a href="index.php" title="">Home</a>
									</li>
									<li>
										<a href="aboutus.php" title="">About Us</a>
									</li>
									<li>
										<a href="#" title="">Services</a>
										<ul class="sub-menu">
											<li><a href="audit-assurance-services.php" title="">Audit & Assurance Services</a></li>
											<li><a href="taxation-advisory.php" title="">Taxation & Advisory</a></li>
											<li><a href="corporate-legal-services.php" title="">Corporate & Legal Services</a></li>
											<li><a href="Finance.php" title="">Finance</a></li>
										</ul>
									</li>
									<li>
										<a href="contactus.php" title="">Contact US</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>