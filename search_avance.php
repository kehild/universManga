<?php
include_once 'bdd/connexion.php';
include_once 'bdd/MangaManager.php';
include_once 'header.php';

?>
<section>
	<div class="transbox">
            <?php
            $manga = new MangaManager($db);
            $manga->SearchAvance($db);
            ?>
        </div>
</section>

<?php
include_once 'footer.php';

?>


