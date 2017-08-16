<?php
include_once"header.php";
include_once "texte.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php";

 if (isset($_POST['Valider'])) {
	$manga = new MangaManager($db);
	$manga->SaisieManga($db,$_POST['nom'],$_POST['tome'],$_POST['chapitre'],$_POST['datecreation'],$_POST['genre'],$_POST['statut'],$_POST['theme'],$_POST['format'],$_POST['Resume']);
}

?>

<div>
  <form method="post" action="">
    </br>
    <label for="nom">Nom</label>
    </br>
    <input type="text" id="nom" name="nom">
    </br>
    <label for="tome">Tome</label>
    </br>
    <input type="text" id="tome" name="tome">
    </br>
    <label for="chapitre">Chapitre</label>
    </br>
    <input type="text" id="chapitre" name="chapitre">
    </br>
    <label for="datecreation">Date de Creation</label>
    </br>
    <input type="text" id="datecreation" name="datecreation">
    </br>
    <label for="genre">Genre</label>
    </br>
    <select name="genre" id="genre">
       <option value="Seinen">Seinen</option>
       <option value="Shonen">Shonen</option>
        <option value="Ecchi">Ecchi</option>
	<option value="Shojo">Shojo</option>
	<option value="Shonen Ai">Shonen Ai</option>
	 <option value="Light Novel">Light Novel</option>
    </select>
	</br>
    <label for="statut">Statut</label>
    </br>
    <select name="statut" id="statut">
        <option value="En Cours">En Cours</option>
        <option value="Termine">Termine</option>
        <option value="En Pause">En Pause</option>
	<option value="Abandonnee">Abandonnee</option>
    </select>
	</br>
    <label for="theme">Thème</label>
    </br>
    <input type="text" id="theme" name="theme">
    </br>
    <label for="format">Format</label>
    </br>
   <!-- <input type="text" id="format" name="format"> -->
        <select name="format" id="format">
        <option value="Acheter">Acheter</option>
        <option value="Acheter/Lu Anglais">Acheter/Lu Anglais</option>
        <option value="Lu">Lu</option>
	<option value="Lu/Lu Anglais">Lu/Lu Anglais</option>
        <option value="Lu Anglais">Lu Anglais</option>
        <option value="Télécharger">Télécharger</option>
        <option value="Télécharger/Lu Anglais">Télécharger/Lu Anglais</option>
        
    </select>
    </br>
    <label for="Resume">Résumé</label>
    </br>
    <textarea name="Resume" rows="6" cols="60"></textarea>
    </br>
    <input type="submit" name="Valider" value="Valider">
  </form>
</div>

<?php
	include_once"footer.php";
?>

