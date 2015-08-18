<?php if (is_page('contact')) { ?>

  <div class="col-sm-12 col-lg-10 col-lg-offset-2">

    <?php dynamic_sidebar('sidebar-contact'); ?>

  </div>

<?php

} elseif (is_page('mentions-legales')) { ?>

  <div class="col-sm-12 col-lg-11 col-lg-offset-1">

    <?php dynamic_sidebar('sidebar-legal'); ?>

  </div>

<?php

} else { ?>

  <div class="col-sm-12 col-lg-10 col-lg-offset-2">

    <?php dynamic_sidebar('sidebar-primary'); ?>

  </div>

<?php

}

?>

