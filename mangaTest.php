<?php
include_once "header.php";
include_once 'bdd/connexion.php';
include_once 'bdd/MangaManager.php';
?>
<section>
	<div class="transbox">
		<div id="param">
                    <?php
                    $manga = new MangaManager($db);
                    $manga->MangaATester($db);    
                    
                    if(isset($_POST['nom'])){
                        $manga = new MangaManager($db);
                        $manga->InsertTest($db);
                    }
                    
                    if (isset($_GET['id1'])){
                        $manga->DeleteTest($db);
                    }
                    
                    ?>    
                    <div>
			<form method="post" action="">
				</br>
				<label for="nom" style="color:black;">Manga à Tester</label>
				</br>
				<input type="text" id="nom" name="nom">
				</br>
				<input type="submit" id="retour" name="Retour" value="Retour">
				<input type="submit" id="valider" name="Valider" value="Valider">
				</br>
			</form>
		</div>
            </div>
	</div>
</section>
<?php
include_once "footer.php";
?>
