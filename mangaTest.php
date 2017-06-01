<?php

include_once "header.php";

?>
<section>
	<div class="transbox">
		<div id="param">
			<a href="ModifText.php" ><img src="image/param.png"></a>
			<div id="doc">
				<?php
				$myfile = fopen("manga.txt", "r") or die("Unable to open file!");
				echo nl2br(utf8_encode(fread($myfile,filesize("manga.txt"))));
				fclose($myfile);
				?>
			</div>
		</div>
	</div>
</section>
<?php
include_once "footer.php";
?>
