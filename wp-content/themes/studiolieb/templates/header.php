<header class="banner navbar navbar-fixed-top" role="banner">


  <div class="container">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand col-sm-3 col-xs-12" href="<?php echo esc_url(home_url('/')); ?>">
       <!--  <img src="<?php bloginfo('template_url'); ?>/assets/img/main-logo.png" class="img-responsive hidden-xs"> -->
        <span class="visible-xs-block"><?php bloginfo('name'); ?></span>
      </a>
    </div>

    <div class="row">   

     <div class="col-md-8 col-md-offset-2">  

    <nav class="collapse navbar-collapse" role="navigation">
     

      <?php
            if (has_nav_menu('primary_navigation_left')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation_left', 'walker' => new Roots_Nav_Walker(), 'menu_class' => 'nav navbar-nav navbar-left'));
            endif;
            ?>
        <?php
            if (has_nav_menu('primary_navigation_right')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation_right', 'walker' => new Roots_Nav_Walker(), 'menu_class' => 'nav navbar-nav navbar-right'));
            endif;
            ?>
    </nav>
</div>
     </div>
  </div>
</header>