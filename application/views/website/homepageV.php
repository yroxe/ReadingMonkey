					<div class="container1">
						<div class="titlu1">New books</div>
							
						<?php $i=1; 
							foreach ($new_books as $book){	?>
							
							<div class="c1<?php echo $i;?>">
							<img src="../../../uploads/<?php echo $book['imagine'];?>"	width="116" height="160" class="imaga"/>
							<div class="r1"><a href="pagina_carte.php?pid=<?php echo $book['carte_id'];?>"><span class="titlu"><?php echo $book['nume_carte'];?></span></a>
							</div>
							</br>
							<div class="r2"><span class="autor"><?php echo $book['nume_autor']." ".$book['prenume_autor'];?></span>
							</div>
							<div class="r3"><span class="rating"><?php echo str_repeat("*", $book['stele']);?></span>
							</div>
							<div class="r4"><span class="pret">Price:<?php echo $book['pret_carte'];?> RON</span>
							</div>
						</div>
							
						<?php $i++;}?>
						
					</div>
					<div class="spacing"></div>
					<div class="container2a">
						<div class="titlu2a"></div>
						<img src="../../../assets/images/banner.png"	width="350" height="260" />
					</div>


					<div class="container3">
						<div class="titlu3">Special offers</div>
						<?php $j=1; 
							foreach ($specialo_books as $sbook){	?>
						
						<div class="c3<?php echo $j;?>">
							<img src="../../../uploads/<?php echo $sbook['imagine'];?>"	width="116" height="160" class="imagb"/>
							<div class="r1"><a href="pagina_carte.php?pid=<?php echo $sbook['carte_id'];?>"><span class="titlu"><?php echo $sbook['nume_carte'];?></span></a>
							</div>
							</br>
							<div class="r2"><span class="autor"><?php echo $sbook['nume_autor']." ".$sbook['prenume_autor'];?></span>
							</div>
							<div class="r3"><span class="rating"><?php echo str_repeat("*", $sbook['stele']);?></span>
							</div>
							<div class="r4"><span class="pret_vechi">Old price:<?php echo $sbook['pret_carte'];?> RON</span>
							</div>
							<div class="r5"><span class="pret_nou">New price:<?php echo $sbook['pret_nou'];?> RON</span>
							</div>
						</div>
						<?php $j++;}?>
					</div>
					
					<div class="spacing"></br></div>
					<div class="container2b">
						<div class="titlu2b">Online resources</div>

						<a target="_blank" href="https://www.goodreads.com/book/show/22703744-e2?from_search=true&search_version=service"> E2 - Pam Grout</br><small>What the readers said on Goodreads</small></a></br></br>

						<a target="_blank" href="http://www.nytimes.com/2013/10/29/books/the-everything-store-jeff-bezos-and-the-age-of-amazon.html?_r=0">Jeff Bezos and Amazon</br><small>Review New York Times</small></a></br></br>

						<a target="_blank" href="http://www.dailymail.co.uk/femail/article-3033867/British-artist-Millie-Marotta-sells-500-000-colouring-books-filled-animal-drawings-adults-new-stress-busting-craze.html">Taramul viselor</br><small>Over 500,000 copies sold</small></a></br></br>

						<a target="_blank" href="http://ligiapop.com/carti-publicate/retete-vegane-fara-foc/">Retete vegane fara foc</br><small>International award</small></a>



					</div>					
					<div class="container4">
						<div class="titlu4">The most sold books</div>
						
						<?php $k=1; 
							foreach ($sold_books as $sobook){	?>
						
						<div class="c4<?php echo $k;?>">
							<img src="../../../uploads/<?php echo $sobook['imagine'];?>"	width="116" height="160" class="imagc"/>
							<div class="r1"><a href="pagina_carte.php?pid=<?php echo $sobook['carte_id'];?>"><span class="titlu"><?php echo $sobook['nume_carte'];?></span></a>
							</div>
						</br>
							<div class="r2"><span class="autor"><?php echo $sobook['nume_autor']." ".$sobook['prenume_autor'];?></span>
							</div>
							<div class="r3"><span class="rating"><?php echo str_repeat("*", $sobook['stele']);?></span>
							</div>
							<div class="r4"><span class="pret">Price <?php echo $sobook['pret_carte'];?> RON</span>
							</div>
							<div class="r5"><span class="pret_nou">Publishing year:<?php echo $sobook['anul_aparitiei'];?></span>
							</div>
						</div>
						
						<?php $k++;}?>
						
					</div>


