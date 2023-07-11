	<?php
require_once "vendor/autoload.php";
use Dompdf\Dompdf;

if (isset($_POST['generate_pdf'])) {
    $dompdf = new Dompdf();
    $dompdf->loadHtml('<h1>NUTRIPLAN</h1>' . $_POST['pdf_content']);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('suggestion.pdf');
    exit; // Terminer le script après la génération du PDF
}
?>
	
	
	<div id="fh5co-product" style="background-color: white;padding: 20px;">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading" style="text-align: center;margin-bottom: 40px;">
					<span>NUTRIPLAN</span>
					<h1 style="font-size: 36px; margin-bottom: 20px;">SUGGESTIONS</h1>
					<h5 style="float: left; color: green;font-size: 18px;font-weight: normal;">Regime</h5>
					<h5 style="float: right; color: green;font-size: 18px;font-weight: normal;">Activites sportives</h5>
				</div>
			</div>
 
			<div class="row" style="display: flex;flex-wrap: wrap;justify-content: space-between;">
				<div class="row col-md-8" style="padding-bottom: 1%;flex-basis: 48%;">
					<ul style="list-style-type: none; margin: 0; padding: 0;padding-right: 10px;">
						<?php for($i=0; $i<sizeof($regime); $i++){ ?>
							<li style="font-size: 20px; margin-bottom: 10px;"><a href="<?php echo base_url('CSuggestion/details'); ?>/<?php echo $id; ?>/<?php echo $idregime[$i]; ?>" style="color: #46670D;"><?php echo $regime[$i] ?></a></li>
						<?php } ?>	
					</ul>
				</div>
				<div class="row col-md-4" style="padding-bottom: 1%; float: right;flex-basis: 48%;">
					<ul style="list-style-type: none; margin: 0; padding: 0;">
						<?php for($i=0; $i<sizeof($sport); $i++){ ?>
							<li style="font-size: 20px; margin-bottom: 10px;"><?php echo $sport[$i] ?> </li>
						<?php } ?>	
					</ul>
				</div>	
			</div>
 			<br><br>	
			<h3><?php echo $detailsRegime['nom']; ?></h3>
			<p>En suivant ce regime, on ne consomme que <?php echo $detailsRegime['viande']; ?>% de viande, <?php echo $detailsRegime['poisson']; ?>% de poisson et <?php echo $detailsRegime['volaille']; ?>% de volaille.</p>
			<p>Exemple de plats : </p>
			<ul>
				<?php for($i=0; $i<sizeof($platnom); $i++){ ?>
					<li><?php echo $platnom[$i]; ?>  <?php echo $platprix[$i]; ?>Ar</li>
				<?php } ?>	
			</ul>
		</div>
	</div>

<Center>
<form method="post">
    <input type="hidden"  name="pdf_content" value="<?php echo htmlentities('<div id="page">' . ob_get_contents() . '</div>'); ?>" >
    <button type="submit" name="generate_pdf" style="position: absolute;top: 100px;right: 10px;">Générer le PDF</button>
</form>
</Center>