<div class="grid">
	
<!-- ===================================== END HEADER ===================================== -->

    <div class="col_12">
    <form action="<?php echo base_url();?>index.php/produktion/abgang" method="POST">
        <div class="col_12">
            <h3><i class="fa fa-minus-square"></i> <?php echo $pageTitle; ?></h3>
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
		    <label class="col_4" for="dismountVolume">Abgangsmenge*</label>
		    <input class="col_7" type="text" name="dismountVolume" required>
	    </div>

	    <div class="col_6">
		    <label class="col_4" for="weight">Abgangsgewicht*</label>
		    <input class="col_7" type="text" name="weight" required>
	    </div>
        
        <div class="col_12">
            <p><strong>*nur numerische Werte</strong></p>
        </div>
        
        <div class="col_12">
            <p>
                <label for="info" class="col_12">Beschreibung</label>
                <textarea class="col_12" name="info"></textarea>
            </p>
        </div>
        <div class="col_12">
            <div class="col_6">
                <input type="submit" class="button" value="Speichern" name="saveDismount">	
            </div>
        </div>
        </form>
    </div>
</div>