<?php 

function get_authors($link){
	
		//Get authors for dropdown select list
	$authors = array();
	$query="SELECT autor_id, CONCAT_WS(' ',nume_autor,prenume_autor) FROM autori ORDER BY nume_autor, prenume_autor ASC";
	$result = mysqli_query ($link, $query);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array ($result, MYSQLI_NUM)) {
			$authors[]=$row;}
	} 
	
	return $authors;
		
}

function get_categories($link){
		//Get categories for dropdown select list	
	$categories = array();
	$query2="SELECT categorie_id, categorie_nume FROM categorii ORDER BY categorie_nume ASC";
	$result2 = mysqli_query ($link, $query2);
	if (mysqli_num_rows($result2) > 0) 
		{ while ($row2 = mysqli_fetch_array ($result2, MYSQLI_NUM)) {
			$categories[]=$row2;}		
		} 
	return $categories;
}


function get_homepage_books($limit,$index,$link){

	$books=array();
	$query ="SELECT c.carte_id, c.autor_id, c.nume_carte, c.pret_carte, c.imagine, c.stele,c.index_homepage, c.anul_aparitiei,c.pret_nou, a.autor_id, a.nume_autor, a.prenume_autor
			FROM carti as c
			LEFT JOIN autori as a
			ON c.autor_id = a.autor_id
			WHERE c.index_homepage=\"$index\"
			LIMIT $limit";
	
	$result = @mysqli_query ($link,$query);	
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$books[]=$row;
		}	
	return $books;
}


function validate_book_post(){
	
	
	
	
}
