<?php get_header(); ?>
<?php get_template_part('slider', 'home'); // Appel du slideshow carousel ?>
  <section>
    <div class="container">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="row m-dw-30">
            <div class="col-xs-12">
              <h1><?php the_title(); ?></h1>
              <?php the_content(); ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div><!-- EOF container -->
  </section>
<?php get_footer(); ?>
