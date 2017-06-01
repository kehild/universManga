<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php";
include_once "texte.php";
?>
<section>
	<div class="transbox">
		<p><?php	
			$manga = new MangaManager($db);
			$manga->FicheManga($db);
			?>
			<a id="le_bouton" href="#test"><img src="image/fleche.png"></a>
		</p>
	</div>
</section>

<?php
if (isset($_GET['id2'])){
	$manga->DeleteManga($db);
	echo '<meta http-equiv="refresh" content="0;URL=Fiche.php">';
}
include_once "footer.php";
?>
