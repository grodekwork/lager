<div class="grid flex">
    <div class="col_12">
        <form action="<?php echo base_url();?>index.php/produkte/suchen" method="POST">
            <p>
            <label class="col_12">Suchen</label>
            <input type="text" class="col_12" name="product">
            </p>
            <p>
            <input type="submit" class="button large green" value="Suchen" name="findProduct">
            </p>
        </form>
    </div>
</div>