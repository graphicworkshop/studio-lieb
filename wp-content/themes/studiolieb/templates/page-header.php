<div class="page-header">
  <div id="page-header-bg">
    <!--<img src="<?php bloginfo('template_url'); ?>/assets/img/mariage3.jpg" class="img-responsive"/>-->

    <div class="title_holder">
      <div class="container">

        <div class="row">
          <div class="col-md-12">
            <h1>
              <?php echo roots_title(); ?>
            </h1>
            <?php
            if (has_excerpt($post->ID)) {
              the_excerpt();
            }
            ?>
            <div class="thin-sep"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
