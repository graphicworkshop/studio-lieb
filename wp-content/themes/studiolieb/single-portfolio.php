<?php get_template_part('templates/content', 'single'); ?>

<?php 
if (get_field('galerie_portfolio')){
	?>

	<div class="popup-gallery row">
		<?php
                //Affiche une galerie photo
		$imgs = get_field('galerie_portfolio');
		if ($imgs) {
			foreach ($imgs as $img) {
				echo '<a href="' . $img['url'] . '" class="col-sm-4">
				<img src="' . $img['sizes']['medium'] . '"
				class="img-responsive" alt="' . $img['alt'] . '">
			</a>';
		}
	}
	?>

</div>
<?php 
}
?>