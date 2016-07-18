<?php 
$page_title = 'Edit book';
$formid="fadauga_carte";
$formclass="formular_editare_carte";

//1.Check book id

if ( (isset($_GET['carte_id'])) && (is_numeric($_GET['carte_id'])) ) { 
	$id = $_GET['carte_id'];

} else if ( (isset($_POST['carte_id'])) && (is_numeric($_POST['carte_id'])) ) {
	 // from form submitted
	$id = $_POST['carte_id'];} 
else { // id is not valid
		echo '<p class="error">The page was accessed in error. </p>';
		include ('includes/footerA.html'); 
		exit();
	}

//2. Connect to database

require('../../model/mysqli_connect.php');



//3.Get the book data
	include('../../model/functions.php');

	//Get authors for dropdown select list
	$authors = get_authors($link);

	//Get categories for dropdown select list
	$categories = get_categories($link);
	

	$nume_carte="";
	$autor="";
	$categorie="";
	$pret_carte="";
	$descriere="";
	$numar_pagini="";
	$editura="";
	$index_homepage="";
	$numar_stele="";
	$imagine="";
	$exemplare="";
	$anul_aparitiei="";
	
$query1 = "SELECT c.nume_carte, c.pret_carte, c.descriere, c.numar_pagini, c.editura, c.index_homepage, c.stele,c.imagine, c.exemplare, c.anul_aparitiei, c.autor_id, c.categorie_id, a.autor_id, ct.categorie_id, a.nume_autor, a.prenume_autor, ct.categorie_nume
		  FROM carti as c
		  LEFT JOIN autori as a ON c.autor_id = a.autor_id
		  LEFT JOIN categorii as ct ON c.categorie_id = ct.categorie_id
		  WHERE carte_id=$id";
$result1 = @mysqli_query ($link, $query1);
if (mysqli_num_rows($result1) == 1) { 
	$row1= mysqli_fetch_assoc ($result1);
		
	$nume_carte=$row1["nume_carte"];
	$autor = $row1["autor_id"];
	$categorie=$row1["categorie_id"];
	$pret_carte=$row1["pret_carte"];
	$descriere=$row1["descriere"];
	$numar_pagini=$row1["numar_pagini"];
	$editura=$row1["editura"];
	$index_homepage=$row1["index_homepage"];
	$numar_stele = $row1["stele"];
	$imagine = $row1['imagine'];
	$exemplare = $row1['exemplare'];
	$anul_aparitiei = $row1['anul_aparitiei'];
}


//4. Check if form was submitted

if($_SERVER['REQUEST_METHOD']=='POST'){

	$errors=array();

	//Validate the name of the book
	if(!empty($_POST['nume_carte'])){
		$nume_carte=mysqli_real_escape_string($link,trim($_POST['nume_carte']));
		} else { 
		$errors[]="Fill in the name of the book";}

	//Validate the author
	if (isset($_POST['autor']) && filter_var($_POST['autor'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
		$autor = $_POST['autor'];
	} else { // no author was selected
		$errors[] = 'Select the author';}

	//Validate categorie
	if (isset($_POST['categorie']) && filter_var($_POST['categorie'], FILTER_VALIDATE_INT, array('min_range' => 1))  ) {
		$categorie = $_POST['categorie'];
	} else {
		$errors[] = 'Select the category';}

	//Validate the other fields
	if(is_numeric($_POST['pret_carte']) && ($_POST['pret_carte']>0)){
		$pret_carte=mysqli_real_escape_string($link,trim($_POST['pret_carte']));} else {
			 $errors[]="Fill in the price of the book";}
	if(!empty($_POST['descriere'])){
		$descriere=mysqli_real_escape_string($link,trim($_POST['descriere']));} else {
			 $errors[]="Fill in the description of the book";}
	if(is_numeric($_POST['numar_pagini']) && ($_POST['numar_pagini']>0)){
		$numar_pagini=mysqli_real_escape_string($link,trim($_POST['numar_pagini']));} else { 
			$errors[]="Fill in the number of pages";}
	if(!empty($_POST['editura'])){
		$editura=mysqli_real_escape_string($link,trim($_POST['editura']));} else {
			 $errors[]="Fill in the publishing house";}
	if(is_numeric($_POST['anul_aparitiei']) && ($_POST['anul_aparitiei']>0)){
		$anul_aparitiei=mysqli_real_escape_string($link,trim($_POST['anul_aparitiei']));} else { 
			$errors[]="Fill in the publishing year";}
	
	if(is_numeric($_POST['exemplare']) && ($_POST['exemplare']>0)){
		$exemplare=mysqli_real_escape_string($link,trim($_POST['exemplare']));} else { 
			$errors[]="Fill in the number of copies";}
			
	if (isset($_POST['index_homepage']) && filter_var($_POST['index_homepage'], FILTER_VALIDATE_INT, array('min_range' => 1))){
		$index_homepage = $_POST['index_homepage'];
	}
	if (isset($_POST['numar_stele']) && filter_var($_POST['numar_stele'], FILTER_VALIDATE_INT, array('min_range' => 1))  ) {
		$numar_stele = $_POST['numar_stele'];
	} else {
		$errors[] = 'Select the stars number';}	
		
		
			
//5.Upload the image
	
	if(empty($errors)){
		
		//Check image exists
		if(is_uploaded_file($_FILES['imagine']['tmp_name'])){
		
				//Extract the extendion
			$path = $_FILES['imagine']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			
				//Localize
			$locate='../../../uploads/' . md5($_FILES['imagine']['name']).".".$ext;
			
				//Transfer the fils
			if(move_uploaded_file($_FILES['imagine']['tmp_name'],$locate)){
				echo '<p>The file was uploaded</p>';
				//Rename the image 
				$imagine=md5($_FILES['imagine']['name']).".".$ext;
			} else{
				$errors[]='The file could not be moved';}
		} 
	}
	
//6.If no errors, process the query
	if (empty($errors)) {
		$query="UPDATE carti SET autor_id='$autor',categorie_id='$categorie', nume_carte='$nume_carte',pret_carte='$pret_carte',descriere='$descriere',imagine='$imagine',numar_pagini='$numar_pagini', editura='$editura',index_homepage='$index_homepage',stele=$numar_stele, exemplare=$exemplare, anul_aparitiei=$anul_aparitiei WHERE carte_id=$id LIMIT 1";		
		
		$result=mysqli_query($link,$query);
		if(mysqli_affected_rows($link)==1) { 
			echo'<p>The book was updated</p>';
		} else 	{			
			echo '<p class="error">The book was not updated due to system error.</p>'; // 
			echo '<p>' . mysqli_error($link) . '<br />Query: ' . $query . '</p>'; 
		}
	
//7. If there are errors
	} else { 
		echo '<p class="error">The following errors were triggered:<br />';
		foreach ($errors as $msg) { 
			echo " - $msg<br />\n";
		}
		echo '</p><p>Try again.</p>';
	}

}//final if 

mysqli_close($link);





//Load the Views
include ("../../views/admin/inc/header.php");
include ("../../views/admin/showBookV.php");
include ('../../views/admin/inc/footer.php');