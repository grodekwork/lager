<!-- Menu Horizontal -->
<ul class="menu">
<li><a href="<?php echo base_url();?>">Home</a></li>
<li><a href="<?php echo base_url();?>index.php/produkte">Produkte</a>
	<ul>
	<li><a href="<?php echo base_url();?>index.php/produkte">Alle Produkte</a></li>
	<li><a href="<?php echo base_url();?>index.php/produkte/suchen">Suchen</a></li>
	<li><a href="<?php echo base_url();?>index.php/upload">csv hochladen</a></li>
	<li><a href="<?php echo base_url();?>index.php/upload/raport">Import</a></li>
	<li><a href="<?php echo base_url();?>index.php/upload/warteliste">Warteliste</a></li>
	</ul>
</li>
<li><a href=""><span class="icon" data-icon="R"></span>Produktion</a>
	<ul>
	<li><a href="<?php echo base_url();?>index.php/produktion/neue">Neue</a></li>
	<li><a href="<?php echo base_url();?>index.php/produktion/bericht/produktion">Produktion Bericht</a></li>
	</ul>
</li>
<li><a href="">Abgang</a>
	<ul>
		<li><a href="<?php echo base_url();?>index.php/produktion/abgang">Neuer</a></li>
		<li><a href="<?php echo base_url();?>index.php/produktion/bericht/abgang">Abgang Bericht</a></li>
	</ul>
</li>
<li><a href="<?php echo base_url();?>index.php/logout">Abmleden</a></li>
</ul>