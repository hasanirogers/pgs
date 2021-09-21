<aside class="sidebar">
  <h2>
    <?php echo get_bloginfo('name'); ?>
  </h2>
  <?php
    $aside_menu_args = array(
      'menu'                 => 'header-menu',
      'container_class'      => '',
      'container'            => '',
      'items_wrap'           => '<ul>%3$s</ul>',
      'theme_location'       => 'aside-menu',
    );

    wp_nav_menu($aside_menu_args);
  ?>
  &nbsp;
</aside>
