<footer class="content-info" role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="col-sm-12" id="footer-menu">
        <nav id="footer_navigation" role="navigation">
          <ul id="menu-footer-navigation" class="nav navbar-nav">
            <li><a href="<?php echo get_the_permalink(11) ?>">Contact</a></li>
            <li><a href="<?php echo get_the_permalink(249) ?>">Mentions légales</a></li>
            <li><a href="http://clients.studio-lieb.com">Espace clients</a></li>
          </ul>
        </nav>
      </div>
    </div>
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
</footer>
