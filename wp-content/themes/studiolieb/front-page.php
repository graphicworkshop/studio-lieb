<?php while (have_posts()) : the_post(); ?>

	<?php //the_content(); ?>

	<div class="container-fluid intro" id="about">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>Richard Lieb, photographie professionnelle</h1>
				<p class="intro-text">Spécialiste des prises de vues industrielles, commerciales ou publicitaires, je suis en mesure de réaliser des photos pour vos packshots, vos plaquettes d'entreprises et fiches techniques produits, ou des photos reportages industriels. Je propose également des prestations de photographies de portraits en studio ou sur site et enfin de photographies de mariage.</p>
			</div>
		</div>
	</div>
	<div class="container-fluid" id="featured-projet">
		<div class="row no-gutter">
			<div class="col-md-7 col-lg-8 section-featured-img">
				<img src="<?php bloginfo('template_url'); ?>/assets/img/mariage_01.jpg" class="img-responsive">
			</div>
			<div class="col-md-5 col-lg-4 section-featured-text">
				<div>
					<h2>Mariage<br>Laure & Gilles</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
					<div class="thin-sep"></div>
				</div>
				<div class="small-featured-img visible-lg">
					
					<img src="<?php bloginfo('template_url'); ?>/assets/img/mariage_01_small.jpg" class="img-responsive">

				</div>
			</div>
		</div>
		<div class="row no-gutter">
			<div class="col-md-5 col-lg-4 section-featured-text">
				<div>
					<h2>Mariage<br>Laure & Gilles</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
					<div class="thin-sep"></div>
				</div>
				<div class="small-featured-img visible-lg">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/mariage_01_small.jpg" class="img-responsive">
				</div>
			</div>
			<div class="col-md-7 col-lg-8 section-featured-img">
				<img src="<?php bloginfo('template_url'); ?>/assets/img/mariage_01.jpg" class="img-responsive">
			</div>
		</div>
	</div>
</div>

<?php endwhile;