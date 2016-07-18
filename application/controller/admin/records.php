<?php 
$page_title = 'Display and change the records ';
require('../../model/mysqli_connect.php');


//Default value for results per page
$display=10;

//Calculate how many pages
if(isset($_GET['p']) && is_numeric($_GET['p'])){
	$pages=$_GET['p'];
} else{
	$query2="SELECT COUNT(carte_id) FROM carti";
	$result2=@mysqli_query($link,$query2);
	$row=@mysqli_fetch_array($result2,MYSQLI_NUM);
	$records=$row[0];

	if($records>$display){
		$pages=ceil($records/$display);
	} else{
		$pages=1;}
}


//Starting point
if(isset($_GET['s']) && is_numeric($_GET['s'])){
	$start=$_GET['s'];
} else{
	$start=0;
}

$query1="SELECT carte_id,nume_carte,pret_carte,exemplare, DATE_FORMAT(data_inregistrare, '%d %M %Y') as data FROM carti ";
$result1=@mysqli_query ($link,$query1);
$count_results=mysqli_num_rows($result1);


$query = "SELECT carte_id,nume_carte,pret_carte,exemplare, DATE_FORMAT(data_inregistrare, '%d %M %Y') as data FROM carti ORDER BY data_inregistrare ASC LIMIT $start,$display";		
$result = @mysqli_query ($link,$query);

$num=mysqli_num_rows($result);


$books_records = array();
if($num>0){
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$books_records[]=$row;
	}
	mysqli_free_result ($result);	
} else { //if no results
	echo '<p class="error">There are no registered books</p>';
}
mysqli_close($link);

if($pages>1){
	
	$pagination="";
	$current_page=($start/$display)+1;

	if($current_page!=1){
		//display back option if needed
		$pagination .= '<a href="records.php?s=' .($start-$display).'&p=' .$pages. '">Back</a>';}

	for ($i = 1; $i <= $pages; $i++) {
		//display page numbers 
		if ($i != $current_page) {
			$pagination .= '<a href="records.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '">' .$i. '</a> ';
		} else {
			$pagination .= $i . ' ';
		}
	}
	if ($current_page != $pages) {
		//display next option if not on the last page
		$pagination .= '<a href="records.php?s=' . ($start + $display) . '&p=' . $pages . '">Next</a>';
	}

}

//Load the Views
include ("../../views/admin/inc/header.php");
include ("../../views/admin/recordsV.php");
include ('../../views/admin/inc/footer.php');