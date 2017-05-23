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

  <section class="m-dw-30">
    <div class="container">
      <div id="slider-01" class="carousel slide" data-ride="carousel"><!-- BOF CAROUSEL -->
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <?php
            $indicator_index = 0;

            while($slider_query->have_posts()) : $slider_query->the_post();
              echo '<li data-target="#slider-01" data-slide-to="'. $indicator_index .'" class="'. ($indicator_index == 0 ? "active" : "") .'"></li>';
          ?>
            <!-- <li data-target="#slider-01" data-slide-to="0"></li>
            <li data-target="#slider-01" data-slide-to="1"></li>
            <li data-target="#slider-01" data-slide-to="2"></li>
            <li data-target="#slider-01" data-slide-to="3"></li> -->
          <?php $indicator_index++;
          endwhile; ?>
        </ol>

        <?php rewind_posts(); ?>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <?php
            $active_test = true;
            while($slider_query->have_posts()) : $slider_query->the_post();
              if($active_test) {
                $theclass = " active";
              } else {
                $theclass = "";
              }
          ?>
            <div class="item<?php echo ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/aa/img1.jpg" alt="">
              <div class="carousel-caption">
                ...
              </div>
            </div>
          <?php
            $active_test = false;
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

<?php endif; ?>
