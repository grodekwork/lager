<div class="grid flex">
    <div class="col_12">
        <h3>id:<?php echo $fileId;?></h3>
        <p>
            <form action="<?php echo base_url();?>index.php/upload/reload/<?php echo $fileId?>" method="POST">
                <input type="submit" class="button medium green col_2" name="setIt" value="speichern">

            </form>
        </p>
        <table>
            <thead><tr>
                <th>PLU / EAN</th>
                <th>Produkt</th>
                <th>Ursprung</th>
                <th>Art</th>
                <th>Alter</th>
                <th>Packung</th>
                <th>Planung</th>
                <th>Bestandsmenge</th>
                <th>Gewicht</th>
                <th>Gesamt</th>
                <th></th>
            </tr></thead>
            <tbody>
            <?php
                $i=0;
                foreach($productsFromFile as $file => $value){

                        if($i!=0){

                            echo "<tr>";
                            //ean
                            echo "<td>$value[1]</td>";

                            //item
                            echo "<td>$value[2]</td>";

                            //origin
                            echo "<td>$value[3]</td>";

                            //type
                            echo "<td>$value[4]</td>";

                            //age
                            echo "<td>$value[5]</td>";

                            //packung
                            echo "<td>$value[6]</td>";

                            //plan
                            echo "<td>$value[7]</td>";

                            //amount
                            echo "<td>$value[8]</td>";

                            //weight

                            echo "<td>$value[9]</td>";

                            //total
                            echo "<td>$value[10]</td>";

                            
                            echo "</tr>";

                           
                        
                        }
                        $i++;
                }
            ?>
            </tbody>
        </table>

    </div>
</div>