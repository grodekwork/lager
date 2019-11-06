
<div class="grid flex">

<pre>
    <?php
        //print_r($entires);
    ?>
</pre>

<!-- ===================================== END HEADER ===================================== -->

    <div class="col_12">
    <h3><?php echo $title; ?></h3>
    <p>
    <!-- Table -->
    <table class="sortable" cellspacing="0" cellpadding="0">
            <thead><tr>
                <th>Datum</th>
                <th>PLU / EAN</th>
                <th>Produkt</th>
                <th>Menge</th>
                <th>Gewicht</th>
                <th>Ursprung</th>
                <th>Art</th>
                <th>Alter</th>
                <th>Packung</th>
                <th>Planung</th>
                <th>Beschreibung</th>
            </tr></thead>
            <tbody>
    <?php

        foreach($entires as $entry){

    ?>
            <tr>
            <td><?php echo $entry->proCreatedAt;?></td>
            <td><?php echo $entry->ean; ?></td>
            <td><?php echo $entry->item; ?></td>
            <td><?php echo $entry->volume; ?></td>
            <td><?php echo $entry->ProductionWeight; ?></td>
            <td><?php echo $entry->origin; ?></td>
            <td><?php echo $entry->type; ?></td>
            <td><?php echo $entry->age; ?></td>
            <td><?php echo $entry->package; ?></td>
            <td><?php echo $entry->plan; ?></td>
            <td><?php echo $entry->info; ?></td>
            </tr>
    <?php
        }
    ?>
    </tbody>
		</table>
	</p>


	<hr />
    </div>
</div>


