
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>HOME PAGE</title>
<!-- 	<link href="styles.css" rel="stylesheet" type="text/css"/> -->
	<link rel="stylesheet" type="text/css" media="all" href="../../../assets/css/reset.css" />
	<link rel="stylesheet" type="text/css" media="all" href="../../../assets/css/style.css" />

</head>
<body>


	<div class="fixed">
	<div class="bar1">
		<div class="bar1text">
			<?php if(isset($_SESSION['username'])) {?>
			
				<a href="logout.php">/ Logout</a>
			<p>Hello, <?php echo $_SESSION['username'];?> </p> 
			<?php } else { ?>
			<a href="login.php">/ Login /</a> <a href="register.php">Register</a>  
			
			<?php } ?>
		</div>
	</div>
	<div class="bar2">
		<div class="bar2text">	
			<a href="homepage.php">Main page</a> <a href="catalog.php"> Catalog</a> <a href="../admin/addAuthor.php"> Admin</a> 
		</div>
	</div>
	<div class="bar3">
		<div class="bar3text">	
			<p> Reading Monkey
			<img src="../../../assets/images/reading_monkey.png" width="85" height="60"/>
			</p>
		</div>
	</div>
		</div>
<div class="container">


