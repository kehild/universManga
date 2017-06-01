<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php"
?>	
	<p><?php  
		$manga = new MangaManager($db);
		$manga->modificationAchat($db);
	
		if (isset($_POST['Modifier'])) {
		$manga->UpdateAchat($db);
		}
	?>
	</p>
<?php
include_once "footer.php";
?>
