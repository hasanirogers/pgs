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
            <h1>Sorry! Page Not Found</h1>
            <br />
          </header>
          <div class="text-align--center">
            <a class="button" href="<?php home_url(); ?>">Return Home</a>
          </div>
        </article>
      </main>
      <?php get_footer(); ?>
    </section>
  </kemet-drawer>
</body>

<?php wp_footer();
