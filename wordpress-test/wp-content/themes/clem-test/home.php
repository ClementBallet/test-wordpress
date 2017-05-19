<?php get_header(); ?>

<section>
  <div class="container">
    <?php if(have_posts()): ?> <!-- Boucle qui vérifie l'existence d'articles -->
      <?php while(have_posts()): the_post(); // Invoque l'itération de l'article en cours ?>
        <?php echo $post->post_title; ?>
        <?php get_template_part('content'); // Appel de content.php ?>
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

<?php get_footer(); ?>
