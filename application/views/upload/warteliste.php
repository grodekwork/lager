<div class="grid flex">

    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>Datum</td>
                <td>Datei</td>
                <td>Info</td>
                <td>Checkcode</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($wartelisten as $warteliste){
            ?>
                <tr>
                    <td><?php echo $warteliste->id; ?></td>
                    <td><?php echo $warteliste->createdAt; ?></td>
                    <td><?php echo $warteliste->sourceInfo; ?></td>
                    <td><?php echo $warteliste->info; ?></td>
                    <td><?php echo $warteliste->checkcode; ?></td>
                    <td><a href="<?php echo base_url()?>index.php/upload/warteliste/details/<?php echo $warteliste->id;?>">details</a></td>
                </tr>
            <?php        
                }
            ?>
        </tbody>
    </table>

</div>