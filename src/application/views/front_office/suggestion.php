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
	<Center>
<form method="post">
    <input type="hidden"  name="pdf_content" value="<?php echo htmlentities('<div id="page">' . ob_get_contents() . '</div>'); ?>" >
    <button type="submit" name="generate_pdf" style="position: absolute;top: 100px;right: 10px;">Générer le PDF</button>
</form>
</Center>