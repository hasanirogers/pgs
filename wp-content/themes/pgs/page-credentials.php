<?php wp_head();?>

<body>
  <kemet-drawer effect="slide" side="left" overlay>
    <nav slot="navigation">
      <?php get_template_part('inc/template-parts/aside'); ?>
    </nav>
    <section slot="content">
      <?php get_header(); ?>
      <main>
        <article>
          <header>
            <h1><?php the_title(); ?></h1>
            <?php
              $post_id = get_the_ID();
              $subtitle = get_post_meta($post_id, 'meta_box_page_options_subtitle', true);
              if ($subtitle) echo '<h2>'. $subtitle .'</h2>';
            ?>
          </header>
          <pgs-credentials></pgs-credentials>
        </article>
      </main>
      <?php get_footer(); ?>
    </section>
  </kemet-drawer>
</body>

<?php wp_footer();
