<div class="grid">
	
<!-- ===================================== END HEADER ===================================== -->


	 
<div class="col_12">
	<div class="col_12">	
		<h3><i class="fa fa-plus-square"></i> <?php echo $pageTitle; ?></h3>
	</div>

	<form id="productForm" action="<?php echo base_url();?>index.php/produkte/add" method="POST">
	<div class="col_12">
		<label class="col_2" for="ean">PLU/EAN</label>
		<input class="col_6" type="text" name="ean" minlength="2" required>
	</div>
	<div class="col_12">
		<label class="col_2" for="item">Produkt</label>
		<input class="col_6" type="text" name="item" required>
	</div>
	<div class="col_12">
		<label class="col_2" for="origin">Ursprung</label>
		<select class="col_6" name="origin" id="select1">
			<option value="K">Kuh</option>
			<option value="Z">Ziege</option>
			<option value="Sc">Schaf</option>
		</select>
	</div>
	<div class="col_12">
		<label class="col_2" for="type">Art</label>
		<select class="col_6" name="type" id="select1">
			<option value="F">Frisch</option>
			<option value="W">Weich</option>
			<option value="S">Schnitt</option>
			<option value="H">Hart</option>
		</select>
	</div>
	<div class="col_12">
		<label class="col_2" for="age">Alter</label>
		<select class="col_6" name="age">
			<option value="I">In Reife</option>
			<option value="J">Jung</option>
			<option value="M">Mittel</option>
			<option value="A">Alt</option>
		</select>
	</div>
	<div class="col_12">
		<label class="col_2" for="package">Packung</label>
		<select class="col_6" name="package">
			<option value="LG">Laibgross</option>
			<option value="LK">Laibklein</option>
			<option value="G">Glas</option>
		</select>
	</div>
	<div class="col_12">
		<label class="col_2" for="plan">Planung</label>
		<select class="col_6" name="plan">
			<option value="A">Aktuell</option>
			<option value="NP">Nicht mehr produziert</option>
		</select>
	</div>
	<div class="col_12">
		<label class="col_2" for="amount">Bestandsmenge</label>
		<input class="col_6" type="text" name="amount" required>
	</div>
	<div class="col_12">
		<label class="col_2" for="weight">Gewicht</label>
		<input class="col_6" type="text" name="weight" required>
	</div>
	<div class="col_12">
		<input type="submit" name="addProduct" class="col_12" value="Hinzufügen">
	</div>
	
	</form>

	<script>
		$("#productForm").validate();
	</script>
<hr />
	
	
</div>

</div><!-- END GRID -->