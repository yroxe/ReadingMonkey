<div class="formular_inregistrari">
	<p><span class="titlu">Registered books</span></p>
	<p>There are <?php echo $count_results;?> registered books</p>
	<table align="center" cellspacing="3" cellpadding="3" width="100%">
		<tr="cap_table">
			<td align="left"><b>Edit</b></td>
			<td align="left"><b>Delete</b></td>
			<td align="left"><b>Book name</b></td>
			<td align="left"><b>Book price</b></td>
			<td align="left"><b>Number of copies</b></td>		
			<td align="left"><b>Registered date</b></td>
		</tr>
	
		<?php foreach ($books_records as $book){ ?>
		<tr>
			<td align="left"><a href="editBook.php?carte_id=<?php echo $book['carte_id'];?>">Editare</a></td>
			<td align="left"><a href="deleteBook.php?carte_id=<?php echo $book['carte_id'];?>">Delete</a></td>
			<td align="left"><?php echo $book['nume_carte'];?></td>
			<td align="left"><?php echo $book['pret_carte'];?></td>
			<td align="left"><?php echo $book['exemplare'];?></td>			
			<td align="left"><?php echo $book['data'];?></td>
		</tr>
		
		<?php } ?>
	</table>	
	<br/>
	<p>
		<?php echo $pagination;?>
	</p>
	
</div>