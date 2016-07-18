<?php
session_start();
require('../../model/mysqli_connect.php');
include('../../model/functions.php');	

$new_books = $specialo_books = $sold_books =array();

// 1. Get new books 

$new_books = get_homepage_books(5,'n',$link);	

//2. Get special offers
	
$specialo_books = get_homepage_books(5,'o',$link);	

//3. Get most sold books

$sold_books = get_homepage_books(5,'s',$link);	

	
	//Load Views
include ("../../views/website/inc/header.php");
include ("../../views/website/homepageV.php");
include ('../../views/website/inc/footer.php');


