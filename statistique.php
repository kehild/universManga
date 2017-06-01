<?php
include_once "header.php";
include_once "texte.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php";
?>
<section>
	<div class="transbox">
		<p style="text-align:left"><?php
			
			$manga = new MangaManager($db);
			$manga->TotalManga($db);
			echo "</br>";
			echo "</br>";
			?>
			<img src="jpgraph_statut.php">
			</br>
			<img src="jpgraph_genre.php">
		</p>
	</div>
</section>

<?php
include_once "footer.php";
?>
