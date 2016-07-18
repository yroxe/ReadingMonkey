	
	<div class="formular_stergere_carte">
	<p><span class="titlu">Stergeti o carte din baza de date</span></p>
	<h3>Numele cartii este: <?php echo $name; ?></h3>
		Sunteti sigur ca vreti sa stergeti aceasta carte?";
	<form action="deleteBook.php" method="post">
	<input type="radio" name="acord" value="Da" /> Da
	<input type="radio" name="acord" value="Nu" checked="checked" /> Nu
	<input type="submit" name="submit" value="Submit" />
	<input type="hidden" name="carte_id" value="<?php echo $id;?>"/>
	</form>

	</div>