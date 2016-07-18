<div class="formular_adauga_categorie">
<form action="" method="post">
<p><span class="titlu">Add category</span></p>
	<fieldset>
	
	<p><b>Category name:</b> <input type="text" name="nume_categorie" size="30" maxlength="40" value="<?php if (isset($_POST['nume_categorie'])) echo $_POST['nume_categorie']; ?>" /></p>
	

	</fieldset>
		
	<div align="center"><input type="submit" name="submit" value="Submit" /></div>

</form>
</div>

<?php
