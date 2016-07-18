<?php 
session_start();
$row = FALSE; 
$page_title = 'Pagina carte';

if (isset($_GET['pid']) && filter_var($_GET['pid'], FILTER_VALIDATE_INT, array('min_range' => 1)) ) { 

	$pid = $_GET['pid'];
	
	require('../../model/mysqli_connect.php');
	$query="SELECT c.carte_id, c.nume_carte, c.pret_carte, c.descriere, c.imagine, c.anul_aparitiei, c.numar_pagini, c.editura, a.autor_id, CONCAT_WS(' ',a.prenume_autor,a.nume_autor) AS autor, cat.categorie_nume FROM carti AS c INNER JOIN autori AS a USING (autor_id) INNER JOIN categorii as cat USING (categorie_id) WHERE c.carte_id=$pid";


	$result = mysqli_query ($link, $query);
	if (mysqli_num_rows($result) == 1) { 
		$book = mysqli_fetch_array ($result, MYSQLI_ASSOC);
	} 
}

//Load Views
include ("../../views/website/inc/header.php");
include ("../../views/website/book.php");
include ('../../views/website/inc/footer.php');