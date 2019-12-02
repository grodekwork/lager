<div class="grid flex">
    <div class="col_12">
    <?php
        echo "<h4>".$pageTitle."</h4>";
    ?>
    </div>
    <div class="col_12">
        <table>

                <tr>
                    <td><strong>PLU/EAN: </strong><?php echo $product->ean; ?></td>
                    <td><strong>Produkt: </strong><?php echo $product->item; ?></td>
                    <td><strong>Ursprung: </strong><?php echo $product->origin; ?></td>
                    <td><strong>Art: </strong><?php echo $product->type; ?></td>
                    <td><strong>Alter: </strong><?php echo $product->age; ?></td>
                </tr>

                <tr>
                    <td><strong>Packung: </strong><?php echo $product->package; ?></td>
                    <td><strong>Planung: </strong><?php echo $product->plan; ?></td>
                    <td><strong>Bestandsmenge: </strong><?php echo $product->amount; ?></td>
                    <td><strong>Gewicht: </strong><?php echo $product->weight; ?></td>
                    <td></td>
                </tr>

        </table>
        <hr>

            <form id="productForm" action="<?php echo base_url();?>index.php/upload/warteliste/details/editProduct/<?php echo $product->id; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $product->id; ?>">
            <div class="col_12">
                <label class="col_2" for="ean">PLU/EAN</label>
                <input class="col_6" type="text" name="ean" minlength="2" value="<?php echo $product->ean; ?>" required>
            </div>
            <div class="col_12">
                <label class="col_2" for="item">Produkt</label>
                <input class="col_6" type="text" name="item" value="<?php echo $product->item; ?>" required>
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
                <input class="col_6" type="text" name="amount" value="<?php echo $product->amount; ?>" required>
            </div>
            <div class="col_12">
                <label class="col_2" for="weight">Gewicht</label>
                <input class="col_6" type="text" name="weight" value="<?php echo $product->weight; ?>"required>
            </div>
            <div class="col_12">
                <input type="submit" name="updateProduct" class="button green" value="Aktualisieren">
                <a href="<?php echo base_url();?>index.php/upload/warteliste/details/deleteProduct/<?php echo $product->id; ?>" class="button red">Entfernen</a>
            </div>
            
            </form>

            <script>
                $("#productForm").validate();
            </script>
        <hr />
    
    </div>
</div>