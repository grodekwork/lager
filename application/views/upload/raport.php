<div class="grid">
    <div class="col_12">
        <table>
        <thead><tr>
            <th>Status</th>
			<th>File Name</th>
			<th>Datum</th>
			<th>hinzufügen in der Datenbank</th>
			<th>download</th>

		</tr></thead>
        <tbody>
        <?php
            foreach($files as $file){
        ?>
            <tr>
            <td><?php echo $file->status; ?></td>
            <td><?php echo $file->filename; ?></td>
            <td><?php echo $file->createdAt; ?></td>
            <td>
                <?php
                if($file->status=="new"){
                ?>
                    <a href="<?php echo base_url();?>index.php/upload/reload/<?php echo $file->id;?>">hinzufügen</a>
                 <?php   
                }
                 ?>
            </td>
            <td><a href="<?php echo base_url();?>uploads/<?php echo $file->filename; ?>">download</a></td>
            
            </tr>
        <?php
            }
        ?>
        </tbody>
        </table>
    </div>
</div>