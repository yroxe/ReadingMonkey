<?php 
session_start();
$page_title = 'Catalog';

require('../../model/mysqli_connect.php');

$display=4;


if(isset($_GET['p']) && is_numeric($_GET['p']))
	{$pages=$_GET['p'];}

else{
	$query2="SELECT COUNT(carte_id) FROM carti";
	$result2=@mysqli_query($link,$query2);
	$row2=@mysqli_fetch_array($result2,MYSQLI_NUM);
	$records=$row2[0];//extragem rezultatul

//Calculate the number of pages
	if($records>$display){
	$pages=ceil($records/$display);}
		else{
	$pages=1;}

	}
//Starting point
	if(isset($_GET['s']) && is_numeric($_GET['s'])){
	$start=$_GET['s'];
	} else{
	$start=0;
	}



$query="SELECT c.carte_id, c.nume_carte, c.pret_carte, c.descriere, c.imagine, c.anul_aparitiei, c.numar_pagini, c.editura, a.autor_id, CONCAT_WS(' ',a.prenume_autor,a.nume_autor) AS autor, cat.categorie_nume FROM carti AS c INNER JOIN autori AS a USING (autor_id) INNER JOIN categorii as cat USING (categorie_id) ORDER BY c.nume_carte ASC LIMIT $start,$display";

//If a certain author was selected

if(isset($_GET['autorid']) && filter_var(($_GET['autorid']), FILTER_VALIDATE_INT, array('min_range'=>1)) ){
	
//Overwrite the query
$query="SELECT c.carte_id, c.nume_carte, c.pret_carte, c.descriere, c.imagine, c.anul_aparitiei, c.numar_pagini, c.editura, a.autor_id, CONCAT_WS(' ',a.prenume_autor,a.nume_autor) AS autor, cat.categorie_nume FROM carti AS c INNER JOIN autori AS a USING (autor_id) INNER JOIN categorii as cat USING (categorie_id) WHERE a.autor_id={$_GET['autorid']} ORDER BY c.nume_carte ASC LIMIT $start,$display";

}

$pagination ="";


if(!isset($_GET['autorid'])){

if($pages>1){


$current_page=($start/$display)+1;

if($current_page!=1){
	$pagination .= '<a href="catalog.php?s=' .($start-$display).'&p=' .$pages. '">Inapoi</a>';}

for ($i = 1; $i <= $pages; $i++) {
		if ($i != $current_page) {
			$pagination.= '<a href="catalog.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '">' .$i. '</a> ';
		} else {
			$pagination.= $i . ' ';
		}
	}
	if ($current_page != $pages) {
		$pagination.= '<a href="catalog.php?s=' . ($start + $display) . '&p=' . $pages . '">In continuare</a>';
	}
	
	
}
}


$result = mysqli_query ($link, $query);
$books = array();
while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
	
	$books[]=$row;

}


mysqli_close($link);

//Load Views
include ("../../views/website/inc/header.php");
include ("../../views/website/catalogV.php");
include ('../../views/website/inc/footer.php');



