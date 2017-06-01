<?php  // Requête pour création du slider client
  $args = array(
    'post_type'      => 'cl_slider',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
  );

  $slider_query = new WP_Query($args);

  if($slider_query->have_posts()):
?>

    <section class="m-dw-30"><!-- BOF CAROUSEL -->
      <div class="container">
        <div id="slider-01" class="carousel slide"><!-- Pour remettre le js de bootstrap, rajouter data-ride="carousel"-->
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <?php
              while($slider_query->have_posts()) : $slider_query->the_post();
                echo '<li data-target="#slider-01" data-slide-to="'.$slider_query->current_post.'" class="'. ($slider_query->current_post == 0 ? "active" : "") .'"></li>';
            ?>
            <?php
              endwhile;
            ?>
          </ol>

          <?php rewind_posts(); ?>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php
              while($slider_query->have_posts()) : $slider_query->the_post();

                if($thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'front-slider')):
                  $thumbnail_src = $thumbnail_html['0'];
                  $alt_val = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt');
                  $alt_val = $alt_val[0];
            ?>
                  <div class="item<?php echo ($slider_query->current_post == 0 ? " active" : ""); ?>">
                    <img src="<?php echo $thumbnail_src; ?>" alt="<?php echo $alt_val; ?>">
                    <div class="carousel-caption">
                      <h3 data-animation="animated bounceInDown"><?php the_title(); ?></h3>
                      <p data-animation="animated bounceInDown"><?php the_field('sous_titre'); ?></p>
                    </div>
                  </div>
            <?php
                endif;
              endwhile;
              wp_reset_postdata();
            ?>
          </div><!-- EOF wrapper -->

          <!-- Controls -->
          <a class="left carousel-control" href="#slider-01" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#slider-01" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div><!-- EOF CAROUSEL -->
      </div>
    </section>

<?php
  endif;
?>
