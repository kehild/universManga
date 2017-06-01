<html>
	<?php
	include_once "header.php";
	include_once "texte.php";
	include_once "bdd/connexion.php";
	include_once "bdd/MangaManager.php";
	?>
	<body>
		<section>
			<div class="transbox">
				</br>
				<div class="slideshow-container">
					<div class="mySlides fade">
					  <div class="numbertext">1 / 4</div>
					  <img src="image/battle.jpg" style="width:100%">
					</div>

					<div class="mySlides fade">
					  <div class="numbertext">2 / 4</div>
					  <img src="image/vegeta.jpg" style="width:100%">
					</div>

					<div class="mySlides fade">
					  <div class="numbertext">3 / 4</div>
					  <img src="image/goul.jpg" style="width:100%">
					</div>

					<div class="mySlides fade">
					  <div class="numbertext">4 / 4</div>
					  <img src="image/eva.jpg" style="width:100%">
				</div>
			<br>
			<div style="text-align:center">
			  <span class="dot"></span> 
			  <span class="dot"></span> 
			  <span class="dot"></span>
			  <span class="dot"></span>
			</div>
			</div>	
			<script>
				var slideIndex = 0;
				showSlides();

				function showSlides() {
					var i;
					var slides = document.getElementsByClassName("mySlides");
					var dots = document.getElementsByClassName("dot");
					for (i = 0; i < slides.length; i++) {
					   slides[i].style.display = "none";  
					}
					slideIndex++;
					if (slideIndex> slides.length) {slideIndex = 1}    
					for (i = 0; i < dots.length; i++) {
						dots[i].className = dots[i].className.replace(" active", "");
					}
					slides[slideIndex-1].style.display = "block";  
					dots[slideIndex-1].className += " active";
					setTimeout(showSlides, 3000); // Change image every 2 seconds
				}
			</script>

			<p><?php
				echo $txtintro;
				echo "</br></br>";
				$manga = new MangaManager($db);
				$manga->DernierMangaLu($db);
				?>
			</p>
				
		</section>		
	</body>
<?php
	include_once "footer.php";
?>
</html>
