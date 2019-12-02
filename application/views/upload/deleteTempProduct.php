<div class="grid flux">

    <div id="break" class="col_12">
        <form action="<?php echo base_url();?>index.php/upload/warteliste/details/deleteProduct/<?php echo $tempProduct->id; ?>" method="POST">
        <p><?php echo $msg;?></p>
        <p> 
            <input type="hidden" name="tempProductId" value="<?php echo $tempProduct->id; ?>">
            <input type="submit" class="button red" name="deleteTempProduct" value="Ja, entfernen">
            <a href="<?php echo base_url();?>index.php/upload/warteliste/details/editProduct/<?php echo $tempProduct->id; ?>" class="button green">Zurück</a>
        
        </p>
        </form>
    </div>
    
</div>