	<div id="fh5co-product" style="background-color: white">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>NUTRIPLAN</span>
					<h1>SUGGESTIONS</h1>
					<h5 style="float: left; color: green">Pour diminuer son poids</h5>
					<h5 style="float: right; color: green">Pour augmenter son poids</h5>
				</div>
			</div>
 
			<div class="row">
				<div class="row col-md-8" style="padding-bottom: 1%;">
					<ul>
						<?php for($i=0; $i<sizeof($regimeMincir); $i++){ ?>
							<li style="font-size: 20px"><?php echo $regimeMincir[$i] ?> </li>   
						<?php } ?>	
					</ul>
				</div>
				<div class="row col-md-4" style="padding-bottom: 1%; float: right;">
					<ul>
						<?php for($i=0; $i<sizeof($regimeGrossir); $i++){ ?>
							<li style="font-size: 20px"><?php echo $regimeGrossir[$i] ?> </li>   
						<?php } ?>	
					</ul>
				</div>	
			</div>
			<h4 style="color: red; text-align: center">Activites sportives</h4>
			<div class="row">
				<div class="row col-md-8" style="padding-bottom: 1%;">
					<ul>
						<?php for($i=0; $i<sizeof($sportMincir); $i++){ ?>
							<li style="font-size: 20px"><?php echo $sportMincir[$i] ?> </li>   
						<?php } ?>	
					</ul>
				</div>
				<div class="row col-md-4" style="padding-bottom: 1%; float: right;">
					<ul>
						<?php for($i=0; $i<sizeof($sportGrossir); $i++){ ?>
							<li style="font-size: 20px"><?php echo $sportGrossir[$i] ?> </li>   
						<?php } ?>	
					</ul>
				</div>		
			</div>
		</div>
	</div>