<div class="grid flex">
    <div class="col_12">
        <h3>Warteliste - Änderungen</h3>
    </div>
    <div class="col_12">
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
    <div class="col_8">
    </div>
    <div class="col_2">
        <form action="<?php echo base_url();?>index.php/backup/updatetables" method="POST">
            <input type="hidden" name="waitingListId" value="<?php echo $id; ?>">
            <button class="button blue">Aktualisieren</button>
        </form>
    </div>
    <div class="col_2">
            <form action="<?php echo base_url();?>index.php/backup/reloadtables" method="POST">
                <input type="hidden" name="waitingListId" value="<?php echo $id; ?>">
                <input type="submit" class="button orange" name="reloadTbls" value="Austauschen">
            </form>
    </div>
</div>