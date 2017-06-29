<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php"
?>	
	<p><?php  
		$manga = new MangaManager($db);
		$manga->modificationTest($db);
	
		if (isset($_POST['Modifier'])) {
		$manga->UpdateTest($db);
		}
	?>
	</p>
<?php
include_once "footer.php";
?>
