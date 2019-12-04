<div class="grid flex">
    <div class="col_12">
        <form action="<?php echo $actionUrl; ?>" method="POST">
            <!-- Warning -->
            <div class="notice warning">
            <i class="icon-warning-sign icon-large"></i> 
                <p>
                    <?php echo $msg; ?>
                </p>
                <p>
                    <input type="hidden" name="<?php echo $input1['name'];?>" value="<?php echo $input1['value'];?>">
                    <input type="submit" name="<?php echo $buttonName; ?>" value="<?php echo $buttonValue; ?>">
                </p>
            </div>
        </form>
    </div>
</div>