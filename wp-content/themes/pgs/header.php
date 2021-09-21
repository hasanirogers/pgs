<nav class="search-nav">
  <div class="search-nav__container">
    <pgs-hamburger></pgs-hamburger>
    <ul class="search-nav__social-media">
      <li>
        <a href="https://www.facebook.com/PrecisionGlobalSystems/?notif_t=page_fan&notif_id=1456565155226372" target="_blank">
          <kemet-icon set="bootstrap" icon="facebook" size="24"></kemet-icon>
        </a>
      </li>
      <li>
        <a href="https://twitter.com/PGS_inc" target="_blank">
          <kemet-icon set="bootstrap" icon="twitter" size="24"></kemet-icon>
        </a>
      </li>
      <li>
        <a href="https://www.linkedin.com/company/precision-global-systems/about/" target="_blank">
          <kemet-icon set="bootstrap" icon="linkedin" size="24"></kemet-icon>
        </a>
      </li>
    </ul>
    <pgs-header-search></pgs-header-search>
  </div>
</nav>
<header class="header">
  <a href="<?php echo site_url(); ?>">
    <img class="header__logo" src="<?php echo get_theme_file_uri('/images/logo.png'); ?>" />
  </a>
  <?php
    $header_menu_args = array(
      'container_class'      => 'header__nav',
      'container'            => 'nav',
      'items_wrap'           => '%3$s',
      'walker'               => new Walker_Header_Menu(),
      'theme_location'       => 'header-menu',
    );

    wp_nav_menu($header_menu_args);
  ?>
</header>
