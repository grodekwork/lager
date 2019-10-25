<div class="grid">
	
<!-- ===================================== END HEADER ===================================== -->


	 
<div class="col_12">


	<div class="col_4">
	<h5>Anmeldung - <strong><?php echo $pageTitle; ?></strong></h5>
    
    <form action="<?php echo base_url();?>index.php/auth" method="POST">
    
        <p>
        <!-- Login -->
        <label for="login">Login</label><br>
        <input name='login' type="text" placeholder="Login"/>
        </p>
        <p>
        <!-- Kennwort -->
        <label for="pass">Kennwort</label><br>
        <input name='pass' type="password" placeholder="Kennwort" />
        </p>
        <p>
        <input type="submit" value="Anmelden" name="logIn" class="blue"/>
        </p>

    </form>

	</div>
	<hr />
</div>

</div><!-- END GRID -->