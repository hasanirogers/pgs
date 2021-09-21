<footer class="footer">
  <section class="footer__container">
    <div>
      <h3><span>Certifications</span></h3>
      <?php
        $certifications_menu_args = array(
          'container_class'      => 'footer__certifications',
          'container'            => 'div',
          'items_wrap'           => '<ul>%3$s</ul>',
          'theme_location'       => 'certifications-menu',
        );

        wp_nav_menu($certifications_menu_args);
      ?>
    </div>
    <div>
      <h3><span>Search</span></h3>
      <form class="footer__search" role="search" method="get" action="<?php echo site_url(); ?>">
        <label class="screen-reader-text" for="search">Search for:</label>
        <input type="text" name="search" id="search">
        <kemet-icon set="bootstrap" icon="search" size="24"></kemet-icon>
			</form>
    </div>
    <div>
      <h3><span>Contact</span></h3>
      <div><strong>Precision Global Systems</strong></div>
      <div>
        <kemet-icon set="bootstrap" icon="geo-alt" size="16"></kemet-icon>
        1600 East Big Beaver Road, Troy, MI 48083
      </div>
      <div>
        <kemet-icon set="bootstrap" icon="phone" size="16"></kemet-icon>
        (248) 526-3800
      </div>
      <div>
        <kemet-icon set="bootstrap" icon="envelope" size="16"></kemet-icon>
        <a href="mailto:info@pgsinc.net">info@pgsinc.net</a>
      </div>
      <h3><span>Follow Us</span></h3>
      <div class="footer__social-media">
        <a href="https://www.facebook.com/PrecisionGlobalSystems/?notif_t=page_fan&notif_id=1456565155226372">
          <kemet-icon set="bootstrap" icon="facebook" size="24"></kemet-icon>
        </a>
        <a href="https://twitter.com/PGS_inc">
          <kemet-icon set="bootstrap" icon="twitter" size="24"></kemet-icon>
        </a>
        <a href="https://www.linkedin.com/company/precision-global-systems/about/">
          <kemet-icon set="bootstrap" icon="linkedin" size="24"></kemet-icon>
        </a>
      </div>
    </div>
  </section>
  <section class="footer__copyright">
    <p>Copyright &copy; 2021. PGS All Rights Reserved.</p>
  </section>
</footer>
