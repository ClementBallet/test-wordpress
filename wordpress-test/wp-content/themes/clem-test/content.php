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
    <?php the_excerpt() ?><!-- Affiche le corps de l'article -->
  </div>
</div><!-- EOF row -->
