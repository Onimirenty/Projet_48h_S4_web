	<div class="fh5co-loader"></div>
	
	<div id="page">
	
	<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(<?php echo base_url(); ?>/asset/img/burger.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<span class="price">Welcome</span>
		   						<h2>Votre profil </h2>
		   						<p style="font-size: 20px">Nom : <?php echo $personne['nom']; ?></p>
		   						<p style="font-size: 20px">Prenom : <?php echo $personne['prenom']; ?></p>
		   						<p style="font-size: 20px">Date de naissance : <?php echo $personne['dtn']; ?></p>
		   						<p style="font-size: 20px">Sexe : <?php echo $sexe; ?></p>
		   						<p style="font-size: 20px">Taille : <?php echo $details['taille']; ?> cm</p>
		   						<p style="font-size: 20px">Poids : <?php echo $details['poids']; ?> kg</p>
		   						<p style="font-size: 20px"><a href="<?php echo base_url('CRecharge/recharger'); ?>/<?php echo $id; ?>"></a>Recharger mon compte</p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	</ul>
	  	</div>
	</aside>

	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="fa fa-credit-card"></i>
						</span>
						<h3>Credit Card</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="fa fa-paper-plane"></i>
						</span>
						<h3>Free Delivery</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	