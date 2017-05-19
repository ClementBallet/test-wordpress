
<?php get_header(); ?>

    <section>
      <div class="container">
        <?php if(have_posts()): ?> <!-- Boucle qui vérifie l'existence d'articles -->
          <?php while(have_posts()): the_post(); // Invoque l'itération de l'article en cours ?>
            <div class="row m-dw-30">
              <div class="col-xs-2">
                <?php // La vignette : on récupère les URL des thumbnail (image à la une des articles)
                  if($thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail')) : // Stockage du tableau où est contenue l'URL de l'image thumbnail dans une variable
                    $thumbnail_src = $thumbnail_html[0]; // Stockage de l'emplacement exact de l'URL
                ?>
                <img class="img-responsive img-thumbnail" src="<?php echo $thumbnail_src; ?>" alt=""> <!-- Injection de l'URL dans le thème avec la gestion responsive de l'image -->
                <?php endif; ?>

              </div>
              <div class="col-xs-10">
                <h1>
                  <a href="<?php the_permalink(); ?>"> <!-- Lien du titre de l'article vers l'article -->
                    <?php the_title(); ?><!-- Affiche le titre de l'article -->
                  </a>
                </h1>
                <?php the_excerpt() ?><!-- Affiche le corps de l'article -->
              </div>
            </div><!-- EOF row -->
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
