<div class="grid">
	
<!-- ===================================== END HEADER ===================================== -->

<form action="<?php echo base_url();?>index.php/produktion/neue" method="POST">
<div class="col_12">
    <div class="col_12">	
		<h3><i class="fa fa-plus-square"></i> <?php echo $pageTitle; ?></h3>
	</div>
	<div class="col_12">
		<label class="col_12" for="productId">Artikel</label>
		<select class="col_12" name="productId">

		<?php

			foreach($items as $item){
				echo "<option value=".$item->id.">".$item->item." (EAN/PLU: ".$item->ean.")</option>";
			}

		?>

		</select>
	</div>
	<div class="col_6">
		<label class="col_4" for="productionVolume">Produktionsmenge*</label>
		<input class="col_7" type="text" name="productionVolume" required>
	</div>
	<div class="col_6">
		<label class="col_4" for="weight">Zugangsgewicht*</label>
		<input class="col_7" type="text" name="weight" required>
	</div>
</div>
<div class="col_12">
			<p><strong>*nur numerische Werte</strong></p>
</div>
<div class="col_12">
		<label class="col_12">Beschreibung</label>
		<textarea class="col_12" name="info"></textarea>
</div>
<div class="col_12">
	<div class="col_6">
		<input type="submit" class="button" value="Speichern" name="saveProduction">	
	</div>
</div>
</form>
</div>