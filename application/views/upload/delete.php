<div class="grid">
    <div class="col_12">
        
        <!-- Warning -->
        <div class="notice warning">
            <i class="icon-warning-sign icon-large"></i> 
            
            Deleting File: <?php echo $file->filename; ?>
            <strong>Uploaded at: <?php echo $file->createdAt;?></strong>
            
        </div>
        <form action="<?php echo base_url();?>index.php/upload/deleteFile/<?php echo $file->id; ?>" method="POST">
            <p class="col_12"><strong>Sind Sie sicher?</strong></p>
            <input type="hidden" name="fileId" value="<?php echo $file->id; ?>">
            <input type="hidden" name="filename" value="<?php echo $file->filename; ?>">
            <input type="submit" class="col_12 large red" value="Entfernen" name="deleteFile">
        </form>
    </div>
</div>