<div id="effect" class="effects">
  <?php
  $prestations = (get_terms('prestation'));
  if ($prestations) {
    ?>
    <div id="filters">
      <button class="*" data-filter="*">Tout voir</button>
      <?php
      foreach ($prestations as $prestation) {
        echo '<button data-filter=".' . $prestation->slug . '">'
          . $prestation->name . '</button>';
      }
      ?>
    </div>
  <?php } ?>

  <div id="list-isotope">
    <div class="grid-sizer"></div>
    <div class="gutter-sizer"></div>

    <?php $posts = query_posts($query_string . '&orderby=menu_order&order=asc&posts_per_page=-1'); ?>

    <?php while (have_posts()) : the_post(); ?>

      <?php

      $post_thumbnail_id = get_post_thumbnail_id($post_id);

      $image_meta = get_post_meta($post_thumbnail_id, '_wp_attachment_metadata', TRUE);

      /* Check Orientation ( Portrait / Landscape ) */
      $orientation = $image_meta['height'] > $image_meta['width'] ? 'grid-item--portrait' : 'landscape';


      if (wp_get_post_terms(get_the_ID(), 'prestation')) {

        $prestations = wp_get_post_terms(get_the_ID(), 'prestation');

        $class = '';

        foreach ($prestations as $prestation) {
          $class = $liste_presta . ' ' . $prestation->slug;
        }

      }

      ?>

      <div class="img grid-item item <?php echo $class ?> <?php echo $orientation ?>"
           data-category="<?php echo $class ?>">

        <a href="<?php echo get_the_permalink(); ?>">
          <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
          <div class="overlay"><span class="expand"><?php echo get_the_title(); ?></span></div>
        </a>

        <?php
        //echo 'Terms : '.wp_get_post_terms();
        //var_dump(wp_get_post_terms(get_the_ID(), 'prestation'));
        ?>

      </div>
    <?php endwhile; ?>
  </div>
</div>
