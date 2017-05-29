
<?php get_header(); ?>

    <section>
      <div class="container">
        <?php if(have_posts()): ?> <!-- Boucle qui vérifie l'existence d'articles -->
          <?php while(have_posts()): the_post(); // Invoque l'itération de l'article en cours ?>
            <div class="row m-dw-30">
              <div class="col-xs-12">
                <h1><?php the_title(); ?></h1><!-- Affiche le titre de l'article -->
                <p>
                  <?php
                    echo cl_give_me_meta_01(
                      esc_attr(get_the_date('c')), // Date format ISO
                      esc_html(get_the_date()), // Date format normal
                      get_the_category_list(', '), // Liste des catégories sous forme de lien
                      get_the_tag_list('', ', ') // Affiche les étiquettes (tags)
                    );
                  ?>
                </p>
                <?php the_content() ?><!-- Affiche le corps de l'article -->
              </div>
            </div><!-- EOF row -->
          <?php endwhile; ?><!-- EOF boucle posts -->

          <div class="row"><!-- BOF row article précédent et article suivant -->
            <div class="col-xs-12">
              <nav>
                <ul class="">
                  <li class="pull-left"><?php previous_post_link(); ?></li>
                  <li class="pull-right"><?php next_post_link(); ?></li>
                </ul>
              </nav>
            </div><!-- EOF col-xs-12 -->
          </div><!-- EOF row article précédent et article suivant -->

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
