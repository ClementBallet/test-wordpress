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

    <div class="row">
      <?php // Ajout de la pagination
        global $wp_query;
        $big = 999999999;
        $total_pages = $wp_query->max_num_pages;

        if($total_pages > 1):
      ?>
        <div class="col-xs-12 cl-pagination center-block">
          <?php
            echo paginate_links(array(
              'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
              'format'    => '/page/%#%',  // Format des permaliens
              'current'   => max(1, get_query_var('paged')),
              'total'     => $total_pages,
              'prev_next' => True,  // True pour pouvoir définir le texte qui se trouve dans la pagination
              'prev_next' => '« Page précédente',
              'next_text' => 'Page suivante »'
            ));
          ?>
        </div><!-- EOF col-xs-12 cl-pagination -->
      <?php endif; ?>
    </div><!-- EOF row -->

  </div><!-- EOF container -->
</section><!-- EOF section -->

<?php get_footer(); ?>
