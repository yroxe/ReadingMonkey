<?php 
$page_title = 'Add book';
$formid="fadauga_carte";
$formclass="formular_adauga_carte";


require('../../model/mysqli_connect.php');
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
	$id=0;		

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




	if(empty($errors)){
	
		//Check the image
		if (is_uploaded_file ($_FILES['imagine']['tmp_name'])){
			$type=$_FILES['imagine']['type'];
			$size=$_FILES['imagine']['size'];
			$pozitie=strpos($type,'image/');
			
			//Check the format
			if($pozitie!==0){$errors[]="The file is not an image";}
			
			//Check the size
			if($size>1024*1024){$errors[]="The file is bigger than 1MB";}
			
			//Transfer the file to uploads
			if(empty($errors)){
				$imagine='uploads/';
				$detalii=pathinfo($_FILES['imagine']['name']);
				$ext=$detalii['extension'];
				$imagine=md5(uniqid()).".".$ext;
		
				if(!move_uploaded_file($_FILES['imagine']['tmp_name'],"../../../uploads/".$imagine)){
					$errors[]="The file was not saved";
				}
			}
	
		} else { // The file was not uploaded
			$errors[] = 'The file was not uploaded.';
			$temp = NULL;
		}
	}

	//If everything is ok, I add to database

	if(empty($errors)){

		$query='INSERT INTO carti (autor_id,categorie_id,nume_carte,pret_carte,descriere,imagine,numar_pagini,editura, anul_aparitiei, exemplare, index_homepage, stele) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';

		$stmt=mysqli_prepare($link,$query);
		mysqli_stmt_bind_param($stmt,'iisdssdsddsd',$autor,$categorie, $nume_carte,$pret_carte,$descriere,$imagine,$numar_pagini,$editura,$anul_aparitiei,$exemplare,$index_homepage,$numar_stele);
		mysqli_stmt_execute($stmt);

		//Check the results
		if(mysqli_stmt_affected_rows($stmt)==1){ 
			echo '<p>The book was added.</p>';
			$_POST=array(); //reset the array $_POST to delete input info from form		
		} else {//Error!
			$error='The book was not added to database';		
		}

		mysqli_stmt_close($stmt);
		mysqli_close($link); //close the database connection
		echo " ";
	} else {
		foreach ($errors as $error){
			echo "$error / ";
		}
	}

}//end of the submission if

//Load the Views
include ("../../views/admin/inc/header.php");
include ("../../views/admin/showBookV.php");
include ('../../views/admin/inc/footer.php');