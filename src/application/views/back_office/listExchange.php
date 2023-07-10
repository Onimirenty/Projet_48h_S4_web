<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(<?php echo base_url(); ?>/assets/images/lampe.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Exchange</h1>
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
					<span>Exchange</span>
					<h2>All List</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<?php
				$countWait = 0;
				$countAccept = 0;
			?>
			<div class="row" style="display: ">
				<table class="table table-striped">
					<tr>
						<th> IdExchange </th>
						<th> IdRequester </th>
						<th> IdOwner </th>
						<th> RequesterObject </th>
						<th> OwnerObject </th>
						<th> Status </th>
					</tr>
				<?php foreach($exchangeList as $exchange) { ?>
					<tr>
						<td> <?php echo($exchange->idEchange); ?> </td>
						<td> <?php echo($exchange->idPersonne1); ?> </td>
						<td> <?php echo($exchange->idPersonne2); ?> </td>
						<td> <?php echo($exchange->idObjet1); ?> </td>
						<td> <?php echo($exchange->idObjet2); ?> </td>
						<td> 
							<?php if($exchange->dateAcceptation == null) { echo("Waiting"); $countWait++; } else { echo "Accepted"; $countAccept++; } ?> 
						</td>
                    </tr>
				<?php } ?>
				</table> 
			</div>
		</div>
	</div>
	<div id="" style="padding-bottom: 5%;">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>Exchange</span>
					<h2>Statistic</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row col-md-6" style="display: ">
				<table class="table table-striped">
					<tr>
						<th> Count Waiting</th>
						<td> <?php echo $countWait; ?> </td>
					</tr>
					<tr>
						<th> Count Accepted </th>
						<td> <?php echo $countAccept; ?> </td>
					</tr>
				</table>
			</div>
		</div>
	</div>
