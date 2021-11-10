<?php
  wp_head();

  $search = get_search_query();
  $args = array(
    's' => $search
  );

  $search_query = new WP_Query($args);
?>

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
            <h1><?php echo 'Search for: ' . get_query_var('s'); ?></h1>
            <br />
          </header>
          <?php
            if ($search_query->have_posts()) {
              while ($search_query->have_posts()) {
                $search_query->the_post();
                ?>
                  <article>
                    <h3 class="font-size--32"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>
                    <br />
                    <a class="button" href="<?php the_permalink(); ?>">Read More</a>
                  </article>
                  <br /><hr />
                <?php
              }
            } else {
              echo '<p>Sorry. We didn\'t find any results. Try searching another term.</p>';
            }
          ?>
        </article>
      </main>
      <?php get_footer(); ?>
    </section>
  </kemet-drawer>
</body>

<?php wp_footer();
