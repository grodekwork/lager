<div class="grid flex">
	
<!-- ===================================== END HEADER ===================================== -->


	 
<div class="col_12">
	
	<h3><i class="fa fa-th-list"></i> <?php echo $pageTitle; ?> </h3>
	
    <p>
        <!-- Button Bar w/icons -->
        <ul class="button-bar">
        <li><a href="<?php echo base_url()?>index.php/produkte/add"><i class="fa fa-plus-square"></i> Hinzufügen</a></li>
        
        <li><a href=""><i class="fa fa-upload"></i> .xls Hochladen</a></li>
        
        </ul>
    </p>
	
	
	<p>
		<!-- Table -->
		<table class="sortable" cellspacing="0" cellpadding="0">
		<thead><tr>
			<th>PLU / EAN</th>
			<th>Produkt</th>
			<th>Ursprung</th>
			<th>Art</th>
			<th>Alter</th>
			<th>Packung</th>
			<th>Planung</th>
			<th>Bestandsmenge</th>
			<th>Gewicht</th>
			<th>Gesamt</th>
			<th></th>
		</tr></thead>
		<tbody>

		<?php

			foreach($products as $product){
		?>

		<tr>
			<td><?php echo $product->ean;?></td>
			<td><?php echo $product->item;?></td>
			<td><?php echo $product->origin;?></td>
			<td><?php echo $product->type;?></td>
			<td><?php echo $product->age;?></td>
			<td><?php echo $product->package;?></td>
			<td><?php echo $product->plan;?></td>
			<td><?php echo $product->amount;?></td>
			<td><?php echo $product->weight;?></td>
			<td><?php echo $product->total;?></td>
			<td><a href="<?php echo base_url();?>index.php/produkte/update/<?php echo $product->id; ?>"><i class="fa fa-pencil"></i> Edit</a></td>
		</tr>
		<?php
			}
		?>
		
			</tbody>
		</table>
	</p>


	<hr />
	
	
</div>

</div><!-- END GRID -->