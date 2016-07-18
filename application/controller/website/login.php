<?php

$page_title = 'Login ';

if (isset($_POST['login'])){
	require('../../model/mysqli_connect.php');
	$email = mysqli_real_escape_string($link,$_POST['email']);
	$parola = $_POST['parola'];

  // Step 1 - check email
  	if ((empty($email)) or (!filter_var($email,FILTER_VALIDATE_EMAIL))){
		$errors[] = "Email invalid";
	} else{ 
		$query = "SELECT * FROM useri WHERE email = '$email'";
		$result = mysqli_query($link,$query);
		if($usr = mysqli_fetch_assoc($result)){		
			$hash = $usr['pass'];
      //$crypt=password_hash($parola,PASSWORD_BCRYPT);
      		if(password_verify($parola,$hash)){
	      			session_start();
	     		$succes = "Wellcome {$usr['prenume_user']}!";
		 		$_SESSION['id'] = $usr['user_id'];
		 		$_SESSION['username'] = $usr['prenume_user'];
		 			$uri = str_replace("login.php","homepage.php",$_SERVER['REQUEST_URI']);
		 			header("Location: http://".$_SERVER['SERVER_NAME'].$uri);
		 		
			}else{
			$errors[] = "Wrong password!";
  			}
    	}else {
		$errors[] = "The email address does not exists!";}
	}
}//final check email

//Load Views
include ("../../views/website/inc/header.php");
include ("../../views/website/loginV.php");
include ('../../views/website/inc/footer.php');

/*
if (isset($errors)){
  echo "\t\t<div class=\"error\">\n";
  foreach($errors as $error){
    echo "\t\t\t<p>$error</p>\n"; 
  }
  echo "\t\t</div>\n";  
}
*/

