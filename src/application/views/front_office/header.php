<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Projet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url('asset/css/animate.css'); ?>">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url('asset/css/icomoon.css'); ?>">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.css'); ?>">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="<?php echo base_url('asset/css/flexslider.css'); ?>">

    <!-- FontAwesome-5  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'asset/css/all.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'asset/css/all.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'asset/css/fontawesome.min.css'; ?>">
	<link rel="stylesheet" id="css-main" href="<?php echo base_url().'asset/css/codebase.min.css'?>">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url('asset/css/style.css'); ?>">

	<!-- Modernizr JS -->
	<script src="<?php echo base_url('assets/js/modernizr-2.6.2.min.js'); ?>"></script>
	
	<style>
		.nav-bar {
			background-color: #BAD68F;
		}
	</style>

	</head>
	<body>
		
	
	<div id="page">
		<nav class="fh5co-nav nav-bar" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-xs-2">
						<div id="fh5co-logo"><a href="index.php">NutriPlan</a></div>
					</div>
					<div class="col-md-6 col-xs-6 text-center menu-1">
						<ul>
							<li><a href="<?php echo base_url('Welcome/home'); ?>" class="white">Home</a></li>
							<li class="has-dropdown">
								<a href="services.html">Setting</a>
								<ul class="dropdown nav-menu">
									<li><a href="<?php echo base_url('CLogin/exit'); ?>">Exit</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
						<ul>
							<li class="search">
								<div class="input-group">
								  <input type="text" placeholder="Search.." name="nom" style="border-radius: 5px;">
							      <span class="input-group-btn">
							        <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
							      </span>
							    </div>
							</li>
							
						</ul>
					</div>
				</div>	
			</div>
		</nav>