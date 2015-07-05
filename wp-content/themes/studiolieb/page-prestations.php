<?php while (have_posts()) : the_post(); ?>
	<?php get_template_part('templates/page', 'header'); ?>

	<div class="container">
		<div class="row text-left">
			
			<div class="col-sm-6 ">
				<img src="<?php bloginfo('template_url'); ?>/assets/img/Fotolia_71181429_M.jpg" class="img-responsive">
			</div>

			<div class="col-sm-6">
				<h2>What we do</h2>
				<p>Cras ut ex lobortis, elementum urna ac, interdum leo. Praesent sit amet purus vitae elit ultrices pulvinar. Ut id massa risus. Sed tristique faucibus nulla vitae porttitor.</p>
				<p>Laoreet eu vivamus venenatis nulla. Hendrerit adipiscing pede eu enim natoque id aenean dui. Quis in nec amet rutrum nam ante aliquet adipiscing.</p>
			</div> 
		</div>

		<!-- <div class="row">

			<div class="col-sm-6 col-sm-offset-3">
				
				<h3>Services</h3>
				<p>Etiam auctor dolor sit amet nulla semper faucibus.</p>

			</div>

		</div> -->

		<div class="row" id="activities-list">
			<div class="col-sm-4">
				<span class="icon-Pack"></span>
				<h4>Packshot produits</h4>
				<p>Penatibus tempus pulvinar felis rhoncus ligula augue quis ante parturient donec nec.</p>
			</div> 

			<div class="col-sm-4">
				<span class="icon-Portrait"></span>
				<h4>Portraits Corporate</h4>
				<p>Penatibus tempus pulvinar felis rhoncus ligula augue quis ante parturient donec nec.</p>
			</div> 
			
			<div class="col-sm-4">
				<span class="icon-Mariage"></span>
				<h4>Mariages</h4>
				<p>Penatibus tempus pulvinar felis rhoncus ligula augue quis ante parturient donec nec.</p>
			</div> 
		</div> 


	</div>

</div>

<?php endwhile; ?>


