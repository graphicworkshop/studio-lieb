<!-- News Section -->

<?php

$args = array(
  'post_type' => 'post'
);

$news_query = new WP_Query($args);

?>

<section class="container"  id="news">

  <div class="content row animated no-opacity" data-animation="fadeInDown" data-animation-delay="0.8s">

    <div class="col-md-12">
      <h3>Les dernières actualités</h3>

      <div class="thin-sep"></div>
    </div>

    <main class="col-md-12">

      <?php if ($news_query->have_posts()) {
        ?>

        <div id="slider-news" class="owl-carousel owl-theme">

          <?php

          while ($news_query->have_posts()) {

            $news_query->the_post();

            ?>

            <div class="item">

              <article class="hentry col-md-10 col-md-offset-1">

                <header class="entry-meta">
                  <h4 class="entry-title"><?php the_title(); ?></h4>
                  <?php get_template_part('templates/entry-meta'); ?>
                </header>

                <div class="entry-content"><?php the_excerpt(); ?></div>

              </article>

            </div>

          <?php
          }
          ?>

        </div>

      <?php } ?>

    </main>

  </div>
</section>

<?php wp_reset_postdata(); ?>
