<div class="grid">
    <div class="col_12">
        <h3>id:<?php echo $fileId;?></h3>
        <table>
            <thead>

            </thead>
            <tbody>
<?php
    foreach($productsFromFile as $file => $value){
            echo "<tr>";
            echo "<td>$value[1]</td>";
            echo "<td>$value[2]</td>";
            echo "<td>$value[3]</td>";
            echo "<td>$value[4]</td>";
            echo "<td>$value[5]</td>";
            echo "<td>$value[6]</td>";
            echo "<td>$value[7]</td>";
            echo "<td>$value[8]</td>";
            echo "<td>$value[9]</td>";
            echo "<td>$value[10]</td>";
            echo "</tr>";
     }
?>
            </tbody>
        </table>
    </div>
</div>