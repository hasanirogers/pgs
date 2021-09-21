<?php wp_head();?>

<body>
  <kemet-drawer effect="slide" side="left" overlay>
    <nav slot="navigation">
      <?php get_template_part('inc/template-parts/aside'); ?>
    </nav>
    <section slot="content">
      <?php get_header(); ?>
      <main>
        <p>This is the front page.</p>
      </main>
      <?php get_footer(); ?>
    </section>
  </kemet-drawer>
</body>

<?php wp_footer();
