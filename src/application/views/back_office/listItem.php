	<style>
		.dropdown-content {
			width: 120px;
			display: block;
			position: auto;
			background-color: white;
			border-radius: 5px;
		}

		.dropdown-content a {
			color: black;
			padding: 9px 14px;
			display: block;
			border-bottom: 1px solid unset;
		}

		.dropdown-content a:hover{
			border-bottom: 1px solid #d1c286;
		}
	</style>
	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(<?php echo base_url(); ?>/assets/images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Item</h1>
							<h2>Free html5 templates by <a href="https://themewagon.com/theme_tag/free/" target="_blank">Themewagon</a></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>Category</span>
					<h2>All Item.</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1" style="margin-left: -10%;">
					<div class="row dropdown-content">
						<h3> Category </h3>
						<a href="<?php echo base_url('cobjet/categoryItem'); ?>/1"> Electonique </a>
						<a href="<?php echo base_url('cobjet/categoryItem'); ?>/2"> Vehicule </a>
						<a href="<?php echo base_url('cobjet/categoryItem'); ?>/3"> Fourniture </a>
						<a href="<?php echo base_url('cobjet/categoryItem'); ?>/4"> Vetement </a>
						<a href="<?php echo base_url('cobjet/categoryItem'); ?>/5"> Accessoire </a>
					</div>
				</div>
				<div class="col-md-11 col-md-offset-1">
				<?php foreach($itemList as $item) { ?>
				<div class="col-md-4 text-center animate-box">
					<div class="product">
						<div class="product-grid" style="background-image:url(<?php echo base_url(); ?>/assets/sary/<?php echo $item->photo ?>);">
							<div class="inner">

								<p>
									<a href="" class="icon"><i class="fa fa-cog"></i></a>
									<a href="single.html" class="icon"><i class="si si-eye"></i></a>
								</p>
							</div>
						</div>
						<div class="desc">
							<h3><a href="single.html"><?php echo $item->description; ?></a></h3>
							<span class="price" style="font-size: 0.8em;"><?php echo $item->nom; ?></span>
						</div>
					</div>
				</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
