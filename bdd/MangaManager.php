<?php
class MangaManager{
  private $_db; // Instance de PDO

  public function __construct($db){
    $this->setDb($db);
  }
  public function setDb(PDO $db){
    $this->_db = $db;
  }
   
public function DernierMangaLu($db){

		$stmt = $db->prepare("SELECT * FROM manga ORDER BY id DESC LIMIT 1"); 
		$stmt->execute();
					
		foreach(($stmt->fetchAll()) as $toto){
						
			echo "<table id='dernier' align='center'>";

			echo "<tr><th>"; echo "Nom"; echo "</th>";
			echo "<th>"; echo "Tome"; echo "</th>";
			echo "<th>"; echo "Chapitre"; echo "</th>";
			echo "<th>"; echo "Date Creation"; echo "</th>";
			echo "<th>"; echo "Genre"; echo "</th>";
			echo "<th>"; echo "Statut"; echo "</th>";
			echo "<th>"; echo "Thème"; echo "</th>";
			echo "<th>"; echo "Format"; echo "</th></tr>";
						
			echo "<tr><th>"; echo $toto['nom']; echo "</th>";
			echo "<th>"; echo $toto['tome']; echo "</th>";
			echo "<th>"; echo $toto['chapitre']; echo "</th>";
			echo "<th>"; echo $toto['datecreation']; echo "</th>";
			echo "<th>"; echo $toto['genre'];  echo "</th>";
			echo "<th>"; echo $toto['statut'];  echo "</th>";
			echo "<th>"; echo $toto['theme']; echo "</th>";
			echo "<th>"; echo $toto['format']; echo "</th></tr>";
					
		echo "</table>";
			}
}


function ListeMangaEnCours($db){
	
			$stmt = $db->prepare("SELECT * FROM manga where statut='En Cours' ORDER BY nom ASC"); 
			$stmt->execute();
					
			echo "<table id='dernier' align='center'>";
						
			echo "<tr><th>"; echo "Nom"; echo "</th>";
			echo "<th>"; echo "Tome"; echo "</th>";
			echo "<th>"; echo "Chapitre"; echo "</th>";
			echo "<th>"; echo "Date Creation"; echo "</th>";
			echo "<th>"; echo "Genre"; echo "</th>";
			echo "<th>"; echo "Thème"; echo "</th>";
			echo "<th>"; echo "Format"; echo "</th>";
			echo "<th>"; echo "Modifier"; echo "</th>";
			echo "<th>"; echo "Supprimer"; echo "</th></tr>";
					
			foreach(($stmt->fetchAll()) as $toto){
						
			echo "<tr><th>"; echo $toto['nom']; echo "</th>";
			echo "<th>"; echo $toto['tome']; echo "</th>";
			echo "<th>"; echo $toto['chapitre']; echo "</th>";
			echo "<th>"; echo $toto['datecreation']; echo "</th>";
			echo "<th>"; echo $toto['genre'];  echo "</th>";
			echo "<th>"; echo $toto['theme']; echo "</th>";
			echo "<th>"; echo $toto['format']; echo "</th>";
			echo "<th>"; echo '<a href="ModifManga.php?id='.$toto['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
			echo "<th>"; echo '<a href="?id2='.$toto['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>"; 
						
			}
			echo "</table>";
	
}

function ListeMangaEnPause($db){
	
			$stmt = $db->prepare("SELECT * FROM manga where statut='En Pause' ORDER BY nom ASC"); 
			$stmt->execute();
					
			echo "<table id='dernier' align='center'>";
						
			echo "<tr><th>"; echo "Nom"; echo "</th>";
			echo "<th>"; echo "Tome"; echo "</th>";
			echo "<th>"; echo "Chapitre"; echo "</th>";
			echo "<th>"; echo "Date Creation"; echo "</th>";
			echo "<th>"; echo "Genre"; echo "</th>";
			echo "<th>"; echo "Thème"; echo "</th>";
			echo "<th>"; echo "Format"; echo "</th>";
			echo "<th>"; echo "Modifier"; echo "</th>";
			echo "<th>"; echo "Supprimer"; echo "</th></tr>";
								
			foreach(($stmt->fetchAll()) as $toto){
						
			echo "<tr><th>"; echo $toto['nom']; echo "</th>";
			echo "<th>"; echo $toto['tome']; echo "</th>";
			echo "<th>"; echo $toto['chapitre']; echo "</th>";
			echo "<th>"; echo $toto['datecreation']; echo "</th>";
			echo "<th>"; echo $toto['genre'];  echo "</th>";
			echo "<th>"; echo $toto['theme']; echo "</th>";
			echo "<th>"; echo $toto['format']; echo "</th>";
			echo "<th>"; echo '<a href="ModifManga.php?id='.$toto['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
			echo "<th>"; echo '<a href="?id2='.$toto['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";  
					
			}
		echo "</table>";
	
}

function ListeMangaAbandonne($db){
	
			$stmt = $db->prepare("SELECT * FROM manga where statut='Abandonnee' ORDER BY nom ASC"); 
			$stmt->execute();
					
					
			echo "<table id='dernier' align='center'>";
						
			echo "<tr><th>"; echo "Nom"; echo "</th>";
			echo "<th>"; echo "Tome"; echo "</th>";
			echo "<th>"; echo "Chapitre"; echo "</th>";
			echo "<th>"; echo "Date Creation"; echo "</th>";
			echo "<th>"; echo "Genre"; echo "</th>";
			echo "<th>"; echo "Thème"; echo "</th>";
			echo "<th>"; echo "Format"; echo "</th>";
			echo "<th>"; echo "Modifier"; echo "</th>";
			echo "<th>"; echo "Supprimer"; echo "</th></tr>";
						
			foreach(($stmt->fetchAll()) as $toto){
											
			echo "<tr><th>"; echo $toto['nom']; echo "</th>";
			echo "<th>"; echo $toto['tome']; echo "</th>";
			echo "<th>"; echo $toto['chapitre']; echo "</th>";
			echo "<th>"; echo $toto['datecreation']; echo "</th>";
			echo "<th>"; echo $toto['genre'];  echo "</th>";
			echo "<th>"; echo $toto['theme']; echo "</th>";
			echo "<th>"; echo $toto['format']; echo "</th>";
			echo "<th>"; echo '<a href="ModifManga.php?id='.$toto['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
			echo "<th>"; echo '<a href="?id2='.$toto['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";
		}
		echo "</table>";
	
}

function ListeMangaTermine($db){ 
 echo '<div class="pagination">';	
$messagesParPage=20; 
$retour_total=$db->prepare("SELECT COUNT(*) AS total FROM manga where statut='Termine'"); //Nous récupérons le contenu de la requête dans $retour_total
$retour_total->execute();

$donnees_total=$retour_total->fetch(); //On range retour sous la forme d'un tableau.
$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
 
//Nous allons maintenant compter le nombre de pages.
$nombreDePages=ceil($total/$messagesParPage);
 
if(isset($_GET['page'])){ 
	// Si la variable $_GET['page'] existe...
     $pageActuelle=intval($_GET['page']);
 
     if($pageActuelle>$nombreDePages){
		// Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
         $pageActuelle=$nombreDePages;
     }
} else{
     $pageActuelle=1; // La page actuelle est la n°1    
}
 
$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire
 
// La requête sql pour récupérer les messages de la page actuelle.
$retour_messages=$db->prepare("SELECT * FROM manga where statut='Termine' ORDER BY nom ASC LIMIT ".$premiereEntree.", ".$messagesParPage."");
$retour_messages->execute();

		echo "<table id='dernier' align='center'>";
		echo "<tr><th>"; echo "Nom"; echo "</th>";
		echo "<th>"; echo "Tome"; echo "</th>";
		echo "<th>"; echo "Chapitre"; echo "</th>";
		echo "<th>"; echo "Date Creation"; echo "</th>";
		echo "<th>"; echo "Genre"; echo "</th>";
		echo "<th>"; echo "Statut"; echo "</th>";
		echo "<th>"; echo "Thème"; echo "</th>";
		echo "<th>"; echo "Format"; echo "</th>";
		echo "<th>"; echo "Modifier"; echo "</th>";
		echo "<th>"; echo "Supprimer"; echo "</th></tr>";


while($donnees_messages=$retour_messages->fetch()){ // On lit les entrées une à une grâce à une boucle

     //Je vais afficher les messages dans des petits tableaux. C'est à vous d'adapter pour votre design...
     //De plus j'ajoute aussi un nl2br pour prendre en compte les sauts à la ligne dans le message.
						
		echo "<tr><th>"; echo stripslashes($donnees_messages['nom']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['tome']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['chapitre']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['datecreation']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['genre']);  echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['statut']);  echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['theme']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['format']); echo "</th>";
	echo "<th>"; echo '<a href="ModifManga.php?id='.$donnees_messages['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
	echo "<th>"; echo '<a href="?id2='.$donnees_messages['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";  
 
}
	echo "</table>";
 
echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages

for($i=1; $i<=$nombreDePages; $i++){ //On fait notre boucle

     //On va faire notre condition
     if($i==$pageActuelle){ //Si il s'agit de la page actuelle...
     
         echo ' [ '.$i.' ] '; 
     }	
     else{
		 echo ' <a href="Termine.php?page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';
echo '</div>';	
}

function FicheManga($db){
	
		$stmt = $db->prepare("SELECT * FROM manga ORDER BY nom ASC"); 
		$stmt->execute();

		echo "<table>";

		echo "<tr><th>"; echo "Nom"; echo "</th>";
		echo "<th>"; echo "Resume"; echo "</th>";
		echo "<th>"; echo "Modifier"; echo "</th>";
		echo "<th>"; echo "Supprimer"; echo "</th></tr>";		
			
		foreach(($stmt->fetchAll()) as $toto){
												
		echo "<tr><th>"; echo $toto['nom']; echo "</th>";
		echo "<th>"; echo $toto['Resume']; echo "</th>";
		echo "<th>"; echo '<a href="ModifManga.php?id='.$toto['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
		echo "<th>"; echo '<a href="?id2='.$toto['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";  
		
		}
		echo "</table>";

	
}

function TotalManga($db){
		
		$stmt = $db->prepare("select COUNT(nom) from manga");
		$stmt->execute();
		
			foreach(($stmt->fetchAll()) as $toto){
				echo "<table>";
				echo "<tr><th>"; echo "Total Manga"; echo "</th></tr>";				
				echo "<tr><th>"; echo $toto['COUNT(nom)']; echo "</th></tr>";
				echo "</table>";
		}
}

function TotalStatut($db){
		
		$stmt = $db->prepare("select COUNT(nom),statut from manga GROUP BY statut");
		$stmt->execute();
		
			foreach(($stmt->fetchAll()) as $toto){
				echo "<table>";
				echo "<tr><th>"; echo "Total"; echo "</th>";
				echo "<th>"; echo "Statut"; echo "</th></tr>";
				
				echo "<tr><th>"; echo $toto['COUNT(nom)']; echo "</th>";
				echo "<th>"; echo $toto['statut']; echo "</th></tr> </br>";
				echo "</table>";
		}
}


function graph_genre($db){

$stmt = $db->prepare("select COUNT(nom),genre from manga GROUP BY genre ORDER BY COUNT(nom) DESC");
$stmt->execute();
		
$donnees = array(); 
while ($row = $stmt->fetch()){
$donnees[] = $row['COUNT(nom)'];
$duree[] = $row['genre'];
}
$largeur = 400;
$hauteur = 250;

 /////////////////////////// PARTIE GRAPHIQUE POUR CAMEMBERT /////////////////////////
 
require_once("jpgraph_pie.php");

$graphe = new PieGraph(500,400);

// Titre du graphique
$graphe->title->Set("Nombre de Manga par Genre");

// Créer un graphique secteur (classe PiePlot)
$oPie = new PiePlot($donnees);

// Légendes qui accompagnent chaque secteur, ici chaque année
$oPie->SetLegends($duree);

// position du graphique (légèrement à droite)
$oPie->SetCenter(0.4); 

$oPie->SetValueType(PIE_VALUE_ABS);

// Format des valeurs de type entier
$oPie->value->SetFormat('%d');

// Ajouter au graphique le graphique secteur
$graphe->Add($oPie);

// Provoquer l'affichage (renvoie directement l'image au navigateur)

$graphe->Stroke(); 

}

// Graphique de statistque par statut

function graph_statut($db){

$stmt = $db->prepare("select COUNT(nom),statut from manga GROUP BY statut");
$stmt->execute();
		
$donnees = array(); 
while ($row = $stmt->fetch()){
$donnees[] = $row['COUNT(nom)'];
$duree[] = $row['statut'];
}
$largeur = 400;
$hauteur = 250;

/////////////////////////// PARTIE GRAPHIQUE POUR CAMEMBERT ////////////////////////////////
 
require_once("jpgraph_pie.php");

$graphe = new PieGraph(500,400);

// Titre du graphique
$graphe->title->Set("Nombre de Manga par Statut");

// Créer un graphique secteur (classe PiePlot)
$oPie = new PiePlot($donnees);

// Légendes qui accompagnent chaque secteur, ici chaque année
$oPie->SetLegends($duree);

// position du graphique (légèrement à droite)
$oPie->SetCenter(0.4); 

$oPie->SetValueType(PIE_VALUE_ABS);

// Format des valeurs de type entier
$oPie->value->SetFormat('%d');

// Ajouter au graphique le graphique secteur
$graphe->Add($oPie);

// Provoquer l'affichage (renvoie directement l'image au navigateur)

$graphe->Stroke(); 

}

function SaisieManga($db,$nom,$tome,$chapitre,$datecreation,$genre,$statut,$theme,$format,$resume){

	// Permet de rentrer les manga
	
	try {

		$sql = "Insert INTO manga (nom, tome, chapitre, datecreation, genre, statut, theme, Resume, format) VALUES ('" .$nom. "', '" .$tome. "','" .$chapitre. "','" .$datecreation. "','" .$genre. "','" .$statut. "','" .$theme. "','" .$resume. "','" .$format. "')";
			
		$db->exec($sql);
				
		echo "Insertion réussi";
		}
		catch(Exception $e){
				
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
			
		}

}	

function MangaAAcheter($db){
	
		$stmt = $db->prepare("SELECT * FROM achat"); 
		$stmt->execute();
					
		echo "<table id='dernier' align='center'>";
						
		echo "<tr><th>"; echo "Nom"; echo "</th>";
		echo "<th>"; echo "Tome"; echo "</th>";
		echo "<th>"; echo "Date de Sortie"; echo "</th>";
		echo "<th>"; echo "Modifier"; echo "</th>";
		echo "<th>"; echo "Supprimer"; echo "</th></tr>";
					
					
		foreach(($stmt->fetchAll()) as $toto){
					
		echo "<tr><th>"; echo $toto['nom']; echo "</th>";
		echo "<th>"; echo $toto['tome']; echo "</th>";
		echo "<th>"; echo $toto['date_sortie']; echo "</th>";
		/* A modifier */	
		echo "<th>"; echo '<a href="ModifAchat.php?id9='.$toto['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
		echo "<th>"; echo '<a href="?id1='.$toto['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";  
					
		}
		echo "</table>";
	
}

function InsertAchat($db){
	
		try {
		$sql = "Insert INTO achat (nom, tome, date_sortie) VALUES ('" .$_POST['nom']. "', '" .$_POST['tome']. "','" .$_POST['date_sortie']. "')";
		$db->exec($sql);
						
		echo "Modification réussi";
				
		}
		catch(Exception $e){
				
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
			
	}
}

// Envoie Mail sur les tomes de manga à acheter

function MailAchat($db){

	$mail = new PHPMailer(); //Create a new PHPMailer instance
	$mail->Host = 'smtp.gmail.com'; //Set the hostname of the mail server
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587; //Tell PHPMailer to use SMTP
	$mail->IsSMTP();
	$mail->SMTPSecure = 'tls'; //Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPAuth = true; //Whether to use SMTP authentication
	$mail->Username = 'josselindaeye@gmail.com';
	$mail->Password = 'duffy1949';
	$mail->AddAddress('josselindaeye@gmail.com', 'Univers Manga'); // Destinataire
	$mail->SetFrom('josselindaeye@gmail.com', 'Univers Manga');  //Expéditeur
	$mail->Subject = "Tome a acheter"; // Sujet

	$listeTables = $db->prepare("SELECT * FROM achat");
	$listeTables->execute(); 
	
	$test= "";

	while($table = $listeTables->fetch()){
			
	$test.=" ".$table[1]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$table[2]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$table[3]." </br></br>";
	$mail->MsgHTML("".$test."");
			
	}

	if(!$mail->Send()) {
	  echo 'Mailer Error:';
	} else {
	  echo 'Message sent!';
	}


}

// Suppression Tome a acheter

function DeleteAchat($db){
	
	try {

		$stm = $db->prepare("delete from achat where id=' " .$_GET['id1']. " '"); 
		$stm->execute();
				
	}catch(Exception $e){
				
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
			
	}
		echo '<meta http-equiv="refresh" content="0;URL=acheter.php">';
}

// Suppression Manga

function DeleteManga($db){

	try {
		$stm = $db->prepare("delete from manga where id=' " .$_GET['id2']. " '"); 
		$stm->execute();
				
	}catch(Exception $e){
				
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
			
	}
	
}


function search($db){

		if(isset($_POST['search'])) {

			$chainesearch = addslashes($_POST['search']);  

		}      
					
		$requete = "SELECT * from manga WHERE nom LIKE '%". $chainesearch ."%'"; 
						
		// Exécution de la requête SQL
		$resultat = $db->query($requete) or die(print_r($db->errorInfo()));
		//echo 'Les résultats de recherche sont : <br />';     
		$nb = 0;
							
		echo "<table id='dernier' align='center'>";
			echo "<tr><th>"; echo "Nom"; echo "</th>";
			echo "<th>"; echo "Tome"; echo "</th>";
			echo "<th>"; echo "Chapitre"; echo "</th>";
			echo "<th>"; echo "Date Creation"; echo "</th>";
			echo "<th>"; echo "Genre"; echo "</th>";
			echo "<th>"; echo "Thème"; echo "</th>";
			echo "<th>"; echo "Format"; echo "</th>";
			echo "<th>"; echo "Modifier"; echo "</th>";
			echo "<th>"; echo "Supprimer"; echo "</th></tr>";
					
		while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {       
			$nb = $nb +1;
									
			echo "<tr><th>"; echo $donnees['nom']; echo "</th>";
			echo "<th>"; echo $donnees['tome']; echo "</th>";
			echo "<th>"; echo $donnees['chapitre']; echo "</th>";
			echo "<th>"; echo $donnees['datecreation']; echo "</th>";
			echo "<th>"; echo $donnees['genre'];  echo "</th>";
			echo "<th>"; echo $donnees['theme']; echo "</th>";
			echo "<th>"; echo $donnees['format']; echo "</th>";
		echo "<th>"; echo '<a href="ModifManga.php?id='.$donnees['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
		echo "<th>"; echo '<a href="?id1='.$donnees['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";    
								
		}
		echo "</table>";
		echo "</br>";
		echo "Il y a ".$nb." résultats"; 

}

function modification($db){
	
		$stmt = $db->prepare("SELECT * FROM manga where id=' " .$_GET['id']. " '"); 
		$stmt->execute();
				
		foreach(($stmt->fetchAll()) as $toto){
		?>
		<div>
	        <form method="post" action="">
		</br>
		<label for="nom" style="color:black;">Nom</label>
		</br>
		<input type="text" id="nom" name="nom" value="<?php echo $toto['nom']; ?>">
		</br>
		<label for="tome" style="color:black;">Tome</label>
		</br>
		<input type="text" id="tome" name="tome" value="<?php echo $toto['tome']; ?>">
		</br>
		<label for="chapitre" style="color:black;">Chapitre</label>
		</br>
		<input type="text" id="chapitre" name="chapitre" value="<?php echo $toto['chapitre']; ?>">
		</br>
		<label for="datecreation" style="color:black;">Date de Creation</label>
		</br>
		<input type="text" id="datecreation" name="datecreation" value="<?php echo $toto['datecreation']; ?>">
		</br>
		<label for="genre" style="color:black;">Genre</label>
		</br>
		<select name="genre" id="genre">
		   <option value="<?php echo $toto['genre']; ?>"><?php echo $toto['genre']; ?></option> <!-- genre en base -->
		   <option value="Seinen">Seinen</option> 
		   <option value="Shonen">Shonen</option>
		   <option value="Ecchi">Ecchi</option>
		   <option value="Shojo">Shojo</option>
		   <option value="Shonen Ai">Shonen Ai</option>
		  <option value="Light Novel">Light Novel</option>						  
		</select>
		</br>
		<label for="statut" style="color:black;">Statut</label>
		</br>
		<select name="statut" id="statut">
		   <option value="<?php echo $toto['statut']; ?>"><?php echo $toto['statut']; ?></option> <!-- statut en base -->
		   <option value="En Cours">En Cours</option>
		   <option value="Termine">Termine</option>
		   <option value="En Pause">En Pause</option>
		   <option value="Abandonnee">Abandonnee</option>
		</select>
		</br>
		<label for="theme" style="color:black;">Thème</label>
		</br>
		<input type="text" id="theme" name="theme" value="<?php echo $toto['theme']; ?>">
		</br>
		<label for="format" style="color:black;">Format</label>
		</br>
		<input type="text" id="format" name="format" value="<?php echo $toto['format']; ?>">
		</br>
		<label for="Resume" style="color:black;">Résumé</label>
		</br>
		<textarea name="Resume" rows="6" cols="60"><?php echo $toto['Resume']; ?></textarea>
		</br>
		<input type="submit" name="Modifier" value="Modifier">
	  </form>
</div> <?php
		}					
}

function Update($db){
	
		try {
		
		$Resume = $_POST['Resume'];
		$Resume = str_replace("'", " ", $Resume);
		$sql = "UPDATE manga SET nom='" .$_POST['nom']. "',tome='" .$_POST['tome']. "',chapitre='" .$_POST['chapitre']. "',datecreation='" .$_POST['datecreation']. "', genre='" .$_POST['genre']. "',statut='" .$_POST['statut']. "',theme='" .$_POST['theme']. "',Resume='" .$Resume. "',format='" .$_POST['format']. "' WHERE id='" .$_GET['id']. "'";
			
		$db->exec($sql);
				
		echo "Modification réussi";
		echo '<meta http-equiv="refresh" content="0;URL=ModifManga.php?id='.$_GET['id'].'">';
		}
		catch(Exception $e){
			
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
			
	}
}


function modificationAchat($db){
	
		$stmt = $db->prepare("SELECT * FROM achat where id=' " .$_GET['id9']. " '"); 
		$stmt->execute();
				
		foreach(($stmt->fetchAll()) as $toto){
		?>
		<div>
	        <form method="post" action="">
		</br>
		<label for="nom" style="color:black;">Nom</label>
		</br>
		<input type="text" id="nom" name="nom" value="<?php echo $toto['nom']; ?>">
		</br>
		<label for="tome" style="color:black;">Tome</label>
		</br>
		<input type="text" id="tome" name="tome" value="<?php echo $toto['tome']; ?>">
		</br>
		<label for="date_sortie" style="color:black;">Date de Sortie</label>
		</br>
		<input type="text" id="date_sortie" name="date_sortie" value="<?php echo $toto['date_sortie']; ?>">
		</br>
		<input type="submit" name="Modifier" value="Modifier">
	  </form>
</div> <?php
		}					
}

function UpdateAchat($db){
	
		try {

		$sql = "UPDATE achat SET nom='" .$_POST['nom']. "',tome='" .$_POST['tome']. "',date_sortie='" .$_POST['date_sortie']. "' WHERE id='" .$_GET['id9']. "'";
			
		$db->exec($sql);
				
		echo "Modification réussi";
		echo '<meta http-equiv="refresh" content="0;URL=acheter.php">';
		}
		catch(Exception $e){
			
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
			
	}
}

function MangaATester($db){
	
		$stmt = $db->prepare("SELECT * FROM test"); 
		$stmt->execute();
					
		echo "<table id='dernier' align='center'>";
						
		echo "<tr><th>"; echo "Manga à Tester"; echo "</th>";
                echo "<th>"; echo "Modifier"; echo "</th>";
                echo "<th>"; echo "Supprimer"; echo "</th></tr>";
					
		foreach(($stmt->fetchAll()) as $toto){
					
		echo "<tr><th>"; echo $toto['nom']; echo "</th>";
		echo "<th>"; echo '<a href="ModifTest.php?id10='.$toto['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
		echo "<th>"; echo '<a href="?id1='.$toto['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";  
					
		}
		echo "</table>";
	
}


function InsertTest($db){
	
		try {
		$sql = "Insert INTO test (nom) VALUES ('" .$_POST['nom']. "')";
		$db->exec($sql);
						
		echo "Modification réussi";
		echo '<meta http-equiv="refresh" content="0;URL=mangaTest.php">';		
		}
		catch(Exception $e){
				
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
			
	}
}

// Suppression Tome a acheter

function DeleteTest($db){
	
	try {

		$stm = $db->prepare("delete from test where id=' " .$_GET['id1']. " '"); 
		$stm->execute();
				
	}catch(Exception $e){
				
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
			
	}
		echo '<meta http-equiv="refresh" content="0;URL=mangaTest.php">';
}

function modificationTest($db){
	
		$stmt = $db->prepare("SELECT * FROM test where id=' " .$_GET['id10']. " '"); 
		$stmt->execute();
				
		foreach(($stmt->fetchAll()) as $toto){
		?>
		<div>
                    <form method="post" action="">
                        </br>
                        <label for="nom">Nom</label>
                        </br>
                        <input type="text" id="nom" name="nom" value="<?php echo $toto['nom']; ?>">
                        <input type="submit" name="Modifier" value="Modifier">
                    </form>
                </div> 
    <?php
		}					
}

function UpdateTest($db){
	
		try {

		$sql = "UPDATE test SET nom='" .$_POST['nom']. "' WHERE id='" .$_GET['id10']. "'";
			
		$db->exec($sql);
				
		echo "Modification réussi";
		echo '<meta http-equiv="refresh" content="0;URL=mangaTest.php">';
		}
		catch(Exception $e){
			
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
			
	}
}

/* Système de Recherche Avance */ 

 public function SearchAvance($db){
      
      if(isset($_POST['genre'])) {

		$chainesearch = addslashes($_POST['genre']);  
                
		$requete = "SELECT * from manga WHERE genre='$chainesearch'";
                
		// Exécution de la requête SQL
		$resultat = $db->query($requete) or die(print_r($db->errorInfo()));
		//echo 'Les résultats de recherche sont : <br />';     
		$nb = 0;
		echo "<table id='dernier' align='center'>";
					
                        echo "<table id='dernier' align='center'>";
			echo "<tr><th>"; echo "Nom"; echo "</th>";
			echo "<th>"; echo "Tome"; echo "</th>";
			echo "<th>"; echo "Chapitre"; echo "</th>";
			echo "<th>"; echo "Date Creation"; echo "</th>";
			echo "<th>"; echo "Genre"; echo "</th>";
			echo "<th>"; echo "Thème"; echo "</th>";
			echo "<th>"; echo "Format"; echo "</th>";
			echo "<th>"; echo "Modifier"; echo "</th>";
			echo "<th>"; echo "Supprimer"; echo "</th></tr>";
								
			while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {       
			$nb = $nb +1;
								
			echo "<tr><th>"; echo $donnees['nom']; echo "</th>";
			echo "<th>"; echo $donnees['tome']; echo "</th>";
			echo "<th>"; echo $donnees['chapitre']; echo "</th>";
			echo "<th>"; echo $donnees['datecreation']; echo "</th>";
			echo "<th>"; echo $donnees['genre'];  echo "</th>";
			echo "<th>"; echo $donnees['theme']; echo "</th>";
			echo "<th>"; echo $donnees['format']; echo "</th>";
		echo "<th>"; echo '<a href="ModifManga.php?id='.$donnees['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
		echo "<th>"; echo '<a href="?id1='.$donnees['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";    
		}
		echo "</table>";
		echo "</br>";
		echo "Il y a ".$nb." résultats"; 
						
                }
  }


}


?>
