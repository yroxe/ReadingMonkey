	<div class='nav1'></div>
	<div class='nav'></div>

	<?php echo $pagination; ?>
	<div class='meniu_stanga'></div>
	
	<?php foreach ($books as $book){ ?>
	
		<div class="rezultat1">
			<div class="imag_carte">
				<img src="../../../uploads/<?php echo $book['imagine'];?>" width="120" height="170" class="imagr"/>
			</div>
			<div class="info_carte">
				<div class ='titlur'>
				<a href="pagina_carte.php?pid=<?php echo $book['carte_id'];?>"><?php echo $book['nume_carte'];?></a></div>
				<div class='autor'>
					<a href="catalog.php?autorid=<?php echo $book['autor_id'];?>"><?php echo $book['autor'];?></a>
				</div>
				<div class='descr'>
					<?php echo $book['descriere'];?>				
				</div>
			</div>
			<div class='pret2'> <?php echo $book['pret_carte'];?>RON</div>

		</div>

	
	<?php } ?>
	
