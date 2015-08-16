<?php if ( get_field('galerie_portfolio') ) { ?>
	<div class="popup-gallery grid masonry effects" id="effect">
		<div class="grid-sizer"></div>
		<?php
		//Affiche une galerie photo
		$imgs = get_field('galerie_portfolio');
		if ($imgs) {
			foreach ($imgs as $img) {
				echo '<div class="grid-item img item-type-move">
        <a href="' . $img['url'] . '">
				<img src="' . $img['sizes']['portfolio'] . '" class="img-responsive" alt="' . $img['alt'] . '">
					<div class="overlay">
					<div class="item-info">
              <div class="headline">
                <i class="glyphicon glyphicon-fullscreen"></i>

              </div>
              <div class="btn-more">Agrandir</div>
            </div>
					</div></a>
				</div>';
			}
		}
		?>
	</div>
<?php
}
