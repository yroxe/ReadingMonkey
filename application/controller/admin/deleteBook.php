<?php 
$page_title = 'Delete a book';


require('../../model/mysqli_connect.php');


if ( (isset($_GET['carte_id'])) && (is_numeric($_GET['carte_id'])) ) { // from records
		$id = $_GET['carte_id'];
} elseif ( (isset($_POST['carte_id'])) && (is_numeric($_POST['carte_id'])) ) { // from submit form
		$id = $_POST['carte_id'];
} else { // id is not valid
	echo '<p class="error">The page was accessed in error.</p>';
	include ("../../views/admin/inc/header.php");
	exit();
}

// Check if the form was send
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($_POST['acord'] == 'Da') { // delete record
		
		$query = "DELETE FROM carti WHERE carte_id=$id LIMIT 1";		
		$result = @mysqli_query ($link, $query);
		if (mysqli_affected_rows($link) == 1) { 		
			echo '<p>The book was deleted.</p>';	
			$uri = str_replace("deleteBook.php","records.php",$_SERVER['REQUEST_URI']);
			header("Location: http://".$_SERVER['SERVER_NAME'].$uri);
		} else { 
			echo '<p class="error">The book could not be deleted due to system error.</p>'; 
			echo '<p>' . mysqli_error($link) . '<br />Query: ' . $query . '</p>'; 
		}
	
	} else { 
		echo '<p>The book was not deleted.</p>';	
	}
} else { // show the form 

	// info despre carte
	$query = "SELECT nume_carte FROM carti WHERE carte_id=$id";
	$result = @mysqli_query ($link, $query);

	if (mysqli_num_rows($result) == 1) { 

		$row = mysqli_fetch_array ($result, MYSQLI_NUM);
		
		$name = $row[0];
		//Load the Views
		include ("../../views/admin/inc/header.php");		
		include ("../../views/admin/deleteBookV.php");
		include ('../../views/admin/inc/footer.php');

	} else { 
		echo '<p class="error">The page was accessed in error.</p>';
	}

} 

mysqli_close($link);



