<div class="formular_inregistrare">

<form action="register.php" method="post">
	<fieldset>
	
	<p><b>First name:</b> <input type="text" name="prenume" size="20" maxlength="40" value="<?php echo $prenume ?>" /></p>	
	<p><b>Last name</b> <input type="text" name="nume" size="20" maxlength="20" value="<?php echo $nume?>" /></p>	

	<p><b>Email address:</b> <input type="text" name="email" size="30" maxlength="60" value="<?php echo $email ?>" /> </p>		
	<p><b>Password:</b> <input type="password" name="parola1" size="20" maxlength="20" value="<?php echo $parola; ?>" /></p>
	<p><b>Password confirmation:</b> <input type="password" name="parola2" size="20" maxlength="20" value="" /></p>
	</fieldset>
	
	<div align="center"><input type="submit" name="submit" value="Register" /></div>

</form>
</div>