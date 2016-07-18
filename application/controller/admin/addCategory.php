<?php 
$page_title = 'Add category';

if($_SERVER['REQUEST_METHOD']=='POST'){

	require('../../model/mysqli_connect.php');

	if(!empty($_POST['nume_categorie'])){
		$nume_categorie=mysqli_real_escape_string($link,trim($_POST['nume_categorie']));
	}  else { $errors[]="Fill in the name of the category";}

	if(!isset($errors)){

		$query='INSERT INTO categorii (categorie_nume) VALUES (?)';

		$stmt=mysqli_prepare($link,$query);
		mysqli_stmt_bind_param($stmt,'s',$nume_categorie);
		mysqli_stmt_execute($stmt);

		//check the results
		if(mysqli_stmt_affected_rows($stmt)==1){ echo'<p>The category was added.</p>';
			$_POST=array(); //reset the array to delete input info from form
		} else {//Error!
			$error='The category was not added to database';}

		mysqli_stmt_close($stmt);
		mysqli_close($link); //close the database connection

	} else {
  
	    $error='Please input again the category';
         print_r($error);
	}

}//end of the submission if

//Load the Views
include ("../../views/admin/inc/header.php");
include ("../../views/admin/addCategoryV.php");
include ('../../views/admin/inc/footer.php');