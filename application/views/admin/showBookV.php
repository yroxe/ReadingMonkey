<div class="<?php echo $formclass;?>">

<form id="<?php echo $formid; ?>" action="" method="post" enctype="multipart/form-data">

<p><span class="titlu"><?php echo $page_title; ?></span></p>

	<p><b>Book name:</b> <input type="text" name="nume_carte" size="30" maxlength="40" value="<?php echo $nume_carte; ?>" /></p>
	<p><b>Autor:</b>
	
	<select name="autor"></option>Select</option>	
		<?php foreach($authors as $author){			
			echo "<option value=\"$author[0]\"";
			if ($autor == $author[0]){ echo "selected='selected'";}
			echo ">$author[1]</option>\n";			
		}?>
	</select></p>

<p><b>Category:</b>
	<select name="categorie"></option>Select</option>
	<?php foreach($categories as $category){		
			echo "<option value=\"$category[0]\"";
		if ($categorie == $category[0]){ echo 'selected="selected"';}
		echo ">$category[1]</option>\n";}
	?>
	</select></p>
	

	<p><b>Book price:</b> <input type="text" name="pret_carte" size="10" maxlength="20" value="<?php echo $pret_carte; ?>" /></p>
	<p><b>Description:</b> <textarea name="descriere" cols="60" rows="5"><?php echo $descriere; ?></textarea></p>
	<p><b>Number of pages:</b> <input type="text" name="numar_pagini" size="10" maxlength="20" value="<?php echo $numar_pagini; ?>" /></p>
	<p><b>Publishing company:</b> <input type="text" name="editura" size="30" maxlength="40" value="<?php echo $editura; ?>" /></p>
	<p><b>Publication year:</b> <input type="text" name="anul_aparitiei" size="30" maxlength="40" value="<?php echo $anul_aparitiei; ?>" /></p>

	<p><b>Copies:</b> <input type="text" name="exemplare" size="30" maxlength="40" value="<?php echo $exemplare; ?>" /></p>
	<p><b>Index homepage:</b> 
		<select name="index_homepage">
			<option value="0">Select homepage index</option>
			<option value="n" <?php if ($index_homepage == "n"){ echo 'selected="selected"';}?>>New Books</option>
			<option value="o" <?php if ($index_homepage == "o"){ echo 'selected="selected"';}?>>Special offers</option>
			<option value="s" <?php if ($index_homepage == "s"){ echo 'selected="selected"';}?>>Most sold</option>
		</select>
	</p>
	<p><b>Number of stars:</b> <select name="numar_stele">
		<?php for ($i=1;$i<5;$i++){ ?>
			<option value="<?php echo $i;?>" <?php if ($numar_stele == $i){ echo 'selected="selected"';}?>><?php echo $i;?></option>
	<?php 	}	?>
	</select></p>
	
    <p><b>Photo:</b> <input type="file" name="imagine"/></p>
    
    
	<?php if ($imagine != ""){?>
		<div class="imag_carte2">
				<img src="../../../uploads/<?php echo $imagine;?>" width="120" height="170" class="imagr"/>
		</div>
	<?php } ?>
    
    
	</br>

	<div align="center">
	<input type="submit" name="submit" value="Submit" />
	<input type="hidden" name="carte_id" value="<?php echo $id; ?>" />
	</div>

</form>

</div>