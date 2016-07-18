<?php
$page_title = 'Add author';

if($_SERVER['REQUEST_METHOD']=='POST'){

	require('../../model/mysqli_connect.php');

//$errors=array();

	if(!empty($_POST['nume_autor'])){
		$nume_autor=mysqli_real_escape_string($link,trim($_POST['nume_autor']));} else {
		 	$errors[]="Fill in the last name of the author";}

	if(!empty($_POST['prenume_autor'])){
		$prenume_autor=mysqli_real_escape_string($link,trim($_POST['prenume_autor']));} else { 
			$errors[]="Fill in the first name of the author";}


	if(!isset($errors)){

		$query='INSERT INTO autori (nume_autor,prenume_autor) VALUES (?,?)';

		$stmt=mysqli_prepare($link,$query);
		mysqli_stmt_bind_param($stmt,'ss',$nume_autor,$prenume_autor);
		mysqli_stmt_execute($stmt);

		//Check the results
		if(mysqli_stmt_affected_rows($stmt)==1){echo'<p>The author was added.</p>';
			$_POST=array(); //reset the array to delete input info from form
		} else {//Error!
			$error='The author was not added';}	
			mysqli_stmt_close($stmt);
			mysqli_close($link); //close the database connection

		}	else {   
			$error='Please input again the author';
			print_r($error);
		}

}//end of the submission if

//Load Views
include ("../../views/admin/inc/header.php");
include ("../../views/admin/addAuthorV.php");
include ('../../views/admin/inc/footer.php');

//if (isset($error)) {
//	echo '<h1>Error!</h1>
//	<p style="font-weight: bold; color: #C00">' . $error . ' Reintroduceti.</p>';
//}
