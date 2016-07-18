<div class="formular_adauga_autor">
<form action="" method="post">
<p><span class="titlu">Add author</span></p>
	<fieldset>
	
	<p><b>Author last name:</b> <input type="text" name="nume_autor" size="30" maxlength="40" value="<?php if (isset($_POST['nume_autor'])) echo $_POST['nume_autor']; ?>" /></p>
	<p><b>Author first name:</b> <input type="text" name="prenume_autor" size="30" maxlength="40" value="<?php if (isset($_POST['prenume_autor'])) echo $_POST['prenume_autor']; ?>" /></p>

	</fieldset>
		
	<div align="center"><input type="submit" name="submit" value="Submit" /></div>

</form>
</div>