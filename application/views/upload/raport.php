<div class="grid">
    <div class="col_12">
        <table>
        <thead><tr>
			<th>File Name</th>
			<th>Datum</th>
			<th>die Produkte Zurücksetzen</th>
			<th>download</th>
			<th>??</th>
		</tr></thead>
        <tbody>
        <?php
            foreach($files as $file){
        ?>
            <tr>
            <td><?php echo $file->filename; ?></td>
            <td><?php echo $file->createdAt; ?></td>
            <td><a href="<?php echo base_url();?>index.php/upload/reload/<?php echo $file->id;?>">Ja - Zurücksetzen</a></td>
            <td><a href="<?php echo base_url();?>uploads/<?php echo $file->filename; ?>">download</a></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
        </table>
    </div>
</div>