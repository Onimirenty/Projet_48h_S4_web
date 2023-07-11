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
		   						<span class="price">
		   							<span style="padding-right: 70px;">Welcome</span>
		   							<a href="<?php echo base_url('CSuggestion/suggest'); ?>/<?php echo $id; ?>" style="color: rgb(527,80,150);" >Voir les suggestions pour vous</a>
		   						</span>
		   						<h2>Votre profil </h2>
		   						<p style="font-size: 20px">Nom : <?php echo $personne['nom']; ?></p>
		   						<p style="font-size: 20px">Prenom : <?php echo $personne['prenom']; ?></p>
		   						<p style="font-size: 20px">Date de naissance : <?php echo $personne['dtn']; ?></p>
		   						<p style="font-size: 20px">Sexe : <?php echo $sexe; ?></p>
		   						<p style="font-size: 20px">Taille : <?php echo $details['taille']; ?> cm</p>
		   						<p style="font-size: 20px">Poids : <?php echo $details['poids']; ?> kg</p>
		   						<p style="font-size: 20px">IMC : <?php echo $imc; ?> </p>
		   						<p style="font-size: 20px;"><a style="color: green" href="<?php echo base_url('CRecharge/recharger'); ?>/<?php echo $id; ?>" class="btn-outline btn-lg">Recharger mon compte</a></p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	</ul>
	  	</div>
	</aside>	