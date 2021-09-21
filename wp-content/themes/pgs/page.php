<?php wp_head();?>

<body>
  <kemet-drawer effect="push" side="left">
    <nav slot="navigation">
      [navigation here]
    </nav>
    <main slot="content">
      <?php
        get_header();
        the_content();
        get_footer();
      ?>
    </main>
  </kemet-drawer>
</body>

<?php wp_footer();
