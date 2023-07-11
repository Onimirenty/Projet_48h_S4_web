<div id="fh5co-product" style="background-color: white">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<span>NUTRIPLAN</span>
				<h1>TARIFS</h1>
			</div>
		</div>

		<div class="row">
			<div class="row col-md-5" style="padding-bottom: 1%;">
				<?php
				foreach ($regime as $j) { ?>
					<p style="font-size: 25px">
						<?php echo $j->nom; ?>
					</p>
					<?php $platnom = array();
					$platprix = array();
					$idplat = $this->RegimePlat->selection2($j->id);
					$l = 0;
					$idpll = 0;
					foreach ($idplat as $idp) {
						$idpla = $idp->idPlat;
						$idpll = $idp->idPlat;
						$nom = $this->Plat->selectionNom($idpla);
						$platnom[$l] = $nom;
						$prix = $this->Plat->selectionPrix($idpla);
						$platprix[$l] = $prix;
						$l = $l + 1;
					}
					?>
					<br>
					<ul>
						<?php for ($i = 1; $i < sizeof($platnom); $i++) { ?>
							<li style="font-size: 20px"><span style="padding-right: 70px;">
									<?php echo $platnom[$i]; ?>
									<?php echo $platprix[$i]; ?>Ar
								</span><a style="color: green" href="<?php echo base_url('CTransaction/payer') .'/'. $idpll; ?>"
									class="btn-outline btn-lg">Acheter</a></li>
						<?php } ?>
					</ul>
				<?php } ?>
			</div>
		</div>
	</div>
</div>