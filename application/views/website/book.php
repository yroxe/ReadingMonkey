	<div class="carte_detalii">
		<div align="center">
			<b><?php echo $book['nume_carte'];?> </b> by <?php echo $book['autor'];?>
			<br/><br/>
			 <?php echo $book['pret_carte'];?> RON
			<br/></br>
			<img src="../../../uploads/<?php echo $book['imagine'];?>" width="120" height="170" class="imagr"/>
			</br></br>
		<p class="descriere_pagina" align="center"><?php echo $book['descriere'];?></p>

		</div>
	</div>