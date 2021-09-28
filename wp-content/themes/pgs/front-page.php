<?php wp_head();?>

<body>
  <kemet-drawer effect="slide" side="left" overlay>
    <nav slot="navigation">
      <?php get_template_part('inc/template-parts/aside'); ?>
    </nav>
    <section slot="content">
      <?php get_header(); ?>
      <main>
        <pgs-masthead></pgs-masthead>
        <pgs-services></pgs-services>
        <?php get_template_part('inc/template-parts/delivering'); ?>
        <?php get_template_part('inc/template-parts/commitment'); ?>
        <?php get_template_part('inc/template-parts/satisfaction'); ?>
      </main>
      <?php get_footer(); ?>
    </section>
  </kemet-drawer>
</body>

<?php wp_footer();
