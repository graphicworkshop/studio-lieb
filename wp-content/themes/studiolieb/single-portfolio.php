<?php if ( get_field('galerie_portfolio') ) { ?>
	<div class="popup-gallery grid masonry effects" id="effect">
		<div class="grid-sizer"></div>
		<?php
		//Affiche une galerie photo
		$imgs = get_field('galerie_portfolio');
		if ($imgs) {
			foreach ($imgs as $img) {
				echo '<div class="grid-item img">
				<img src="' . $img['sizes']['portfolio'] . '" class="img-responsive" alt="' . $img['alt'] . '">
					<div class="overlay">
						<a href="' . $img['url'] . '" class="expand">Lorem ipsum</a>
					</div>
				</div>';
			}
		}
		?>
	</div>
<?php
}
