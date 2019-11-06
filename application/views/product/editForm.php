<div class="grid">
	
<!-- ===================================== END HEADER ===================================== -->


	 
<div class="col_12">
	<div class="col_12">	
		<h3><i class="fa fa-edit"></i> <?php echo $pageTitle; ?></h3>
	</div>

	<form id="productForm" action="<?php echo base_url();?>index.php/produkte/update/<?php echo $product->id;?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $product->id;?>">
	<div class="col_12">
		<label class="col_2" for="ean">PLU/EAN</label>
		<input class="col_6" type="text" name="ean" required value="<?php echo $product->ean; ?>">
	</div>
	<div class="col_12">
		<label class="col_2" for="item">Produkt</label>
		<input class="col_6" type="text" name="item" required value="<?php echo $product->item;?>">
	</div>
	<div class="col_12">
		<label class="col_2" for="origin">Ursprung</label>
		<select class="col_6" name="origin" id="select1">

			<option value="Kuh" <?php if($product->origin=='Kuh') echo "selected"; ?>>Kuh</option>
			<option value="Ziege" <?php if($product->origin=='Ziege') echo "selected"; ?>>Ziege</option>
			<option value="Schaf" <?php if($product->origin=='Schaf') echo "selected";?>>Schaf</option>

		</select>
	</div>
	<div class="col_12">
		<label class="col_2" for="type">Art</label>
		<select class="col_6" name="type" id="select1">
			<option value="Frisch" <?php if($product->type=='Frisch') echo "selected"; ?>>Frisch</option>
			<option value="Weich" <?php if($product->type=='Weich') echo "selected"; ?>>Weich</option>
			<option value="Schnitt" <?php if($product->type=='Schnitt') echo "selected"; ?>>Schnitt</option>
			<option value="Hart" <?php if($product->type=='Hart') echo "selected"; ?>>Hart</option>
		</select>
	</div>
	<div class="col_12">
		<label class="col_2" for="age">Alter</label>
		<select class="col_6" name="age">
			<option value="In Reife" <?php if($product->age=='In Reife') echo "selected"; ?>>In Reife</option>
			<option value="Jung" <?php if($product->age=='Jung') echo "selected"; ?>>Jung</option>
			<option value="Mittel" <?php if($product->age=='Mittel') echo "selected"; ?>>Mittel</option>
			<option value="Alt" <?php if($product->age=='Alt') echo "selected"; ?>>Alt</option>
		</select>
	</div>
	<div class="col_12">
		<label class="col_2" for="package">Packung</label>
		<select class="col_6" name="package">
			<option value="Laibgross" <?php if($product->package=='Laibgross') echo "selected"; ?>>Laibgross</option>
			<option value="Laibklein" <?php if($product->package=='Laibklein') echo "selected"; ?>>Laibklein</option>
			<option value="Glas" <?php if($product->package=='Glas') echo "selected"; ?>>Glas</option>
		</select>
	</div>
	<div class="col_12">
		<label class="col_2" for="plan">Planung</label>
		<select class="col_6" name="plan">
			<option value="Aktuell" <?php if($product->plan=='Aktuell') echo "selected"; ?>>Aktuell</option>
			<option value="Nicht mehr produziert" <?php if($product->plan=='Nicht mehr produziert') echo "selected"; ?>>Nicht mehr produziert</option>
		</select>
	</div>
	<div class="col_12">
		<label class="col_2" for="amount">Bestandsmenge</label>
		<input class="col_6" type="text" name="amount" required value="<?php echo $product->amount;?>">
	</div>
	<div class="col_12">
		<label class="col_2" for="weight">Gewicht</label>
		<input class="col_6" type="text" name="weight" required value="<?php echo $product->weight;?>">
	</div>
	<div class="col_12">
		<input type="submit" name="updateProduct" class="col_12" value="Aktualisieren">
	</div>
	
	</form>

	<script>
		$("#productForm").validate();
	</script>
<hr />
	
	
</div>

</div><!-- END GRID -->