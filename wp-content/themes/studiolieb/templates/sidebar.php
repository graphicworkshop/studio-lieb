<div class="col-sm-12  col-lg-10 col-lg-offset-2">
  <?php
  if (is_page('contact')) {
    dynamic_sidebar('sidebar-contact');
  } else {
    dynamic_sidebar('sidebar-primary');
  }
  ?>
</div>
