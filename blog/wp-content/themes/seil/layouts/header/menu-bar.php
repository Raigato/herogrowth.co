
<!-- Navigation & Search -->
<?php
  wp_nav_menu(
    array(
      'menu'              => 'primary',
      'theme_location'    => 'primary',
      'container'         => 'nav',
      'container_class'   => 'seil-navigation',
      'container_id'      => '',
      'menu'              => 'Main Menu',
      'menu_class'        => '',
      'fallback_cb'       => 'seil_wp_bootstrap_navwalker::fallback',
      'walker'            => new seil_wp_bootstrap_navwalker()
    )
  );
  ?>
