<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

<!--[if lt IE 8]>
<div class="alert alert-warning">
  <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your
  browser</a> to improve your experience.', 'roots'); ?>
</div>
<![endif]-->

<?php
do_action('get_header');
get_template_part('templates/header');
?>

<section id="project-title" class="container-fluid page-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>
          <?php echo roots_title(); ?>
        </h1>

        <div id="portfolio-nav">
          <ul>
            <li id="all-items"><a href=""><i class="icon-salient-back-to-all"></i></a></li>
          </ul>

          <ul class="controls">
            <?php while (have_posts()) : the_post(); ?>
              <li class="prev-link"
                  rel="prev"><?php previous_post_link('%link', '<span class="glyphicon icomoon icon-previous" aria-hidden="true"></span>') ?></li>
              <li class="next-link"
                  rel="next"><?php next_post_link('%link', '<span class="icomoon icon-next" aria-hidden="true"></span>') ?></li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="wrap container-fluid" role="document">
  <div class="container">
    <div class="content row">

      <main class="main" role="main">
        <?php include roots_template_path(); ?>
      </main>
      <!-- /.main -->

      <aside class="sidebar" role="complementary">
        <?php get_template_part('templates/content', 'single'); ?>
      </aside>
      <!-- /.sidebar -->

    </div>
    <!-- /.content -->
  </div>
</div>
<!-- /.wrap -->

<?php get_template_part('templates/footer'); ?>

<?php wp_footer(); ?>

</body>
</html>
