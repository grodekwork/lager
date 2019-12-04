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

			<option value="K" <?php if($product->origin=='K') echo "selected"; ?>>Kuh</option>
			<option value="Z" <?php if($product->origin=='Z') echo "selected"; ?>>Ziege</option>
			<option value="Sc" <?php if($product->origin=='Sc') echo "selected";?>>Schaf</option>

		</select>
	</div>
	<div class="col_12">
		<label class="col_2" for="type">Art</label>
		<select class="col_6" name="type" id="select1">
			<option value="F" <?php if($product->type=='F') echo "selected"; ?>>Frisch</option>
			<option value="W" <?php if($product->type=='W') echo "selected"; ?>>Weich</option>
			<option value="S" <?php if($product->type=='S') echo "selected"; ?>>Schnitt</option>
			<option value="H" <?php if($product->type=='H') echo "selected"; ?>>Hart</option>
		</select>
	</div>
	<div class="col_12">
		<label class="col_2" for="age">Alter</label>
		<select class="col_6" name="age">
			<option value="I" <?php if($product->age=='I') echo "selected"; ?>>In Reife</option>
			<option value="J" <?php if($product->age=='J') echo "selected"; ?>>Jung</option>
			<option value="M" <?php if($product->age=='M') echo "selected"; ?>>Mittel</option>
			<option value="A" <?php if($product->age=='A') echo "selected"; ?>>Alt</option>
		</select>
	</div>
	<div class="col_12">
		<label class="col_2" for="package">Packung</label>
		<select class="col_6" name="package">
			<option value="LG" <?php if($product->package=='LG') echo "selected"; ?>>Laibgross</option>
			<option value="LK" <?php if($product->package=='LK') echo "selected"; ?>>Laibklein</option>
			<option value="G" <?php if($product->package=='G') echo "selected"; ?>>Glas</option>
		</select>
	</div>
	<div class="col_12">
		<label class="col_2" for="plan">Planung</label>
		<select class="col_6" name="plan">
			<option value="A" <?php if($product->plan=='A') echo "selected"; ?>>Aktuell</option>
			<option value="NP" <?php if($product->plan=='NP') echo "selected"; ?>>Nicht mehr produziert</option>
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