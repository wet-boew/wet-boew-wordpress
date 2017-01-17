<?php

function category_intro() {
	?>
	<div class="row">
		<img class="img-responsive col-md-3 pull-left mrgn-rght-sm mrgn-bttm-sm" src="http://wet-boew.github.io/wet-boew/demos/lightbox/demo/1_b.jpg" alt="">
			
		<p>Example de catégorie personalisé</p>
		
		<p>Le contenu HTML doit être inclus dans la fonction <code>category_intro()</code> et par la suite le fichier "category.php" fera le reste de la magie.</p>
	</div>
	<?php
}

include("category.php");

?>