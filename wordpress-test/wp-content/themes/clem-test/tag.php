<?php get_header(); ?>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <p class="lead">Liste des articles avec l'étiquette <?php single_tag_title(''); ?></p>
        </div>
      </div><!-- EOF row -->
      <?php if(have_posts()): ?><!-- Boucle qui vérifie l'existence d'articles -->
        <?php while(have_posts()): the_post(); ?><!-- Invoque l'itération de l'article en cours -->
          <?php get_template_part('content') ?><!-- Appel de content.php -->
        <?php endwhile; ?><!-- EOF while boucle posts -->
      <?php else: ?>
        <div class="row">
          <div class="col-xs-12">
            <p>Pas d'articles à afficher.</p>
          </div>
        </div><!-- EOF row -->
      <?php endif; ?>
    </div><!-- EOF container -->
  </section><!-- EOF section -->

<?php get_footer(); ?>
