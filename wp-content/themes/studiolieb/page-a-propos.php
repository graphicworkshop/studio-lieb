<?php while (have_posts()) : the_post(); ?>

  <div class="row no-gutter">
    <div class="col-md-7 col-lg-8 section-featured-img">
      <img src="<?php bloginfo('template_url'); ?>/assets/img/_33A1207-1.jpg" class="img-responsive">
    </div>
    <div class="col-md-5 col-lg-4 section-featured-text">
      <div class="animated fadeInUp no-opacity">
        <?php the_content(); ?>
      </div>

    </div>
  </div>

<?php endwhile; ?>
