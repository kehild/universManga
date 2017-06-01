<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php";
require 'phpmailer/class.phpmailer.php';
?>

<section>
	<div class="transbox">
		<p><?php
			echo "</br>";
			$manga = new MangaManager($db);
			$manga->MangaAAcheter($db);
			?>
			<a id="le_bouton" href="#test"><img src="image/fleche.png"></a>
		</p>
		<div>
			<form method="post" action="">
				</br>
				<label for="nom" style="color:black;">Nom</label>
				</br>
				<input type="text" id="nom" name="nom">
				</br>
				<label for="tome" style="color:black;">Tome</label>
				</br>
				<input type="text" id="tome" name="tome">
				</br>
				<label for="date_sortie" style="color:black;">Date de Sortie</label>
				</br>
				<input type="text" id="date_sortie" name="date_sortie">
				</br>
				<input type="submit" id="Insertion" name="Insertion" value="Insertion">
				<input type="submit" id="Email" name="Email" value="Email">
				</br>
			</form>
		</div>
	</div>
</section>

<?php



// appel fonction update
if (isset($_POST['Insertion'])) {
	$manga->InsertAchat($db);
}

// appel fonction mail

if(isset($_POST['Email'])){
	$manga->MailAchat($db);	
}


if (isset($_GET['id1'])){
	$manga->DeleteAchat($db);
}

 
include_once "footer.php";
?>
