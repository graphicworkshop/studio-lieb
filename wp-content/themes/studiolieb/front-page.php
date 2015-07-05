<?php putRevSlider('home-slider') ?>

<?php while (have_posts()) : the_post(); ?>

	<?php //the_content(); ?>
	<section class="full-box" id="about">
		<div class="container" id="about">
			<div class="row">
				<div class="col-md-12">
					<h1>Richard Lieb, photographie professionnelle</h1>
					<p class="intro-text">Spécialiste des prises de vues industrielles, commerciales ou publicitaires, je suis en mesure de réaliser des photos pour vos packshots, vos plaquettes d'entreprises et fiches techniques produits, ou des photos reportages industriels. Je propose également des prestations de photographies de portraits en studio ou sur site et enfin de photographies de mariage.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<a class="btn btn-primary btn-inverse center-block" href="<?php echo get_permalink( 4 ); ?>" role="button">Découvrez le studio</a>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part('templates/content', 'featured-project'); ?>
	<?php get_template_part('templates/content', 'news'); ?>
	<?php get_template_part('templates/content', 'activities'); ?>
	<?php get_template_part('templates/content', 'extranet'); ?>
	<?php get_template_part('templates/content', 'call'); ?>

<?php endwhile;