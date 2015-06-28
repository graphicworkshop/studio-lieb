<header class="banner navbar navbar-custom navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a class="navbar-brand" href="#page-top"><?php bloginfo('name'); ?></a>
    </div>
    <div class="row">			
        <div class="col-md-8 col-md-offset-2">
            <nav class="collapse navbar-collapse navbar-main-collapse" role="navigation">
           
            <?php
            if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
            endif;
            ?>
            </nav>
        </div>
  </div>
</header>
<div class="hero"></div>
