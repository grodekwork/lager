<div class="grid flex">
    <div class="col-12">
        <h3>Warteliste - Änderungen</h3>
    </div>
    <div class="col-12">
    <table>
        <thead>
            <tr>
            <th></th>
            <th>PLU / EAN</th>
			<th>Produkt</th>
			<th>Ursprung</th>
			<th>Art</th>
			<th>Alter</th>
			<th>Packung</th>
			<th>Planung</th>
			<th>Bestandsmenge</th>
			<th>Gewicht</th>
            </tr>
        </thead>
        <tbody>
        <?php
     
            foreach($products as $product){
        ?>
        <tr>
            
            <td><a href="<?php echo base_url();?>index.php/upload/warteliste/details/editProduct/<?php echo $product->id;?>"><i class="fa fa-edit"></i></a></td>

            <td><?php echo $product->ean; ?></td>
            <td><?php echo $product->item; ?></td>
            
            <td><?php echo $product->origin; ?></td>
            <td><?php echo $product->type; ?></td>
            <td><?php echo $product->age; ?></td>
            <td><?php echo $product->package; ?></td>
            <td><?php echo $product->plan; ?></td>
            <td><?php echo $product->amount; ?></td>
            <td><?php echo $product->weight; ?></td>
            
        </tr>

        <?php
            }

        ?>
   
        </tbody>
    </table>
    
    </div>
</div>