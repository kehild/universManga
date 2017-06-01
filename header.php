<header>
	<title>Univers Manga</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<link rel="icon" type="image/png" href="image/manga.jpg"/>
	<table id="test">	
		<tr>
			<td><img src="image/manga.jpg"></td>
			<td><h1 id="titre">Bienvenue Sur L'Univers Manga</h1></td>
		</tr>
	</table>	
</header>


<nav>
	<ul id="menu-deroulant">
		<li style="float: left"><a href="index.php">Home</a></li>
		<li style="float: left"><a href="saisie.php">Saisir Manga</a></li>
		<li style="float: left"><a href="#">Manga</a>
			<ul>
				<li><a href="EnCours.php">En Cours</a></li>
				<li><a href="Termine.php">Terminé</a></li>
				<li><a href="EnPause.php">En Pause / Abandonnée</a></li>
				<li><a href="Fiche.php">Fiche</a></li>
			</ul>
		</li>
		<li style="float: left"><a href="acheter.php">A Acheter</a></li>	
		<li style="float: left"><a href="statistique.php">Statistique</a></li>
	
			
		<form style="width:400px; float: left; margin-top: 10px;" action="search.php" method="post">
			<span style=" color:white; text-align: center;">Recherche par nom :</span> 
			<input "type="text" id="search" name="search"/>
		</form>
		
		<li style="float:right"><a href="information.php">Information</a>
		<li style="float:right"><a href="mangaTest.php">Manga Test</a>
	</ul>
</nav>


