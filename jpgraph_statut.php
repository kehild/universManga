<?php
require_once("include_path_inc.php");
require_once("jpgraph.php");
require_once("jpgraph_bar.php");
require_once("bdd/connexion.php");
require_once("bdd/MangaManager.php");

$manga = new MangaManager($db);
$manga->graph_statut($db);

?>

  
  
  
  
