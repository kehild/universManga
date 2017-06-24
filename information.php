<html>
<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php";
include_once "texte.php";

	if (isset($_POST['export'])) {
		
		$manga = new MangaManager($db);
		$manga->dumpMySQL($db, 3);	
	}
?>
<body>
	<section>
		<div class="transbox">
			<p style="text-align:left"><?php echo $info; ?>
			</p>
		</div>
	</section>
</body>
<?php
include_once "footer.php";
?>
</html>
