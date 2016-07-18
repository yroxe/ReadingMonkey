<?php 
$page_title = 'Register ';

include('password.php');

//1.Check the data from the form

$nume="";
$prenume="";
$email="";
$parola="";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require('../../model/mysqli_connect.php');

	$errors = array(); 
	
	if (empty($_POST['nume'])) { 
		$errors[] = 'You forgot to input your last name.';
	} else {
		$nume = mysqli_real_escape_string($link, trim($_POST['nume']));
	}
	
	if (empty($_POST['prenume'])) {
		$errors[] = 'You forgot to input your first name.';
	} else {
		$prenume = mysqli_real_escape_string($link, trim($_POST['prenume']));
	}

	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to input your email.';
	} else {
		$email = mysqli_real_escape_string($link, trim($_POST['email']));
	}
	
	if (!empty($_POST['parola1'])) {
		if ($_POST['parola1'] != $_POST['parola2']) {
			$errors[] = 'The two passwords are not the same';
		} else {
			$parola = mysqli_real_escape_string($link, trim($_POST['parola1']));
		}
	} else {
		$errors[] = 'You forgot to input the password.';
	}

	if((empty($email)) or (!filter_var($email,FILTER_VALIDATE_EMAIL))){
		$errors[]="The email address is invalid";
	}


//2. If there is no error check the database for duplicates

	if (empty($errors)) { 

		$query="SELECT * FROM useri WHERE email='$email'";
		$result=@mysqli_query($link,$query);
		if(mysqli_num_rows($result)>0){
			$errors[]="The email already exists";
		}
	}

//3. If no errors, add the user

	if(empty($errors)){
		include ("../../views/website/inc/header.php");
		$crypt=password_hash($parola,PASSWORD_BCRYPT);
		$query = "INSERT INTO useri (nume_user,prenume_user, email, pass, data_inregistrarii) VALUES ('$nume', '$prenume', '$email', '$crypt', NOW() )";	
		$result = @mysqli_query ($link, $query); 
		if ($result) { 
			echo '<h1>Thank you!</h1>
			<p>You have registered!</p><p><br /></p>';	
		} else { 
			echo '<h1>System error</h1>
			<p class="error">You cannot register due to a system error.</p>'; 
			echo '<p>' . mysqli_error($link) . '<br /><br />Query: ' . $query . '</p>';
		} 
	mysqli_close($link);

		include ('../../views/website/inc/footer.php');
		exit();
		
	} else { 
		echo '</br>
		<p class="error">The following errors have been triggered:<br />';
		foreach ($errors as $msg) { 
			echo " - $msg<br />\n";
		}
			echo '</p><p>Please try again.</p><p><br /></p>';		
		} 
	
mysqli_close($link); 

} 

//Load Views
include ("../../views/website/inc/header.php");
include ("../../views/website/registerV.php");
include ('../../views/website/inc/footer.php');
