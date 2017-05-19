<?php get_header(); ?>
<?php
  $args_blog = array(
    'post-type' => 'post',
    'posts_per_page' => 2
  );
  $req_blog = new WP_Query($args_blog);
?>
<?php if($req_blog->have_posts()): ?>
  <section id="blog-front">
    <div class="container">
      <?php if(have_posts()): ?> <!-- Boucle qui vérifie l'existence d'articles -->
        <?php while(have_posts()): the_post(); // Invoque l'itération de l'article en cours ?>
          <div class="row">
            <div class="col-xs-12">
              <?php the_content(); ?>
            </div>
          </div>
        <?php endwhile; ?><!-- EOF boucle posts -->
      <?php else: ?>
        <div class="row">
          <div class="col-xs-12">
            <p>Pas d'articles à afficher.</p>
          </div>
        </div>
      <?php endif; ?>
    </div><!-- EOF container -->
  </section><!-- EOF section -->
<?php endif; ?>
<?php get_footer(); ?>
