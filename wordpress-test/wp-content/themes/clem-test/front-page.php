<?php get_header(); ?>
<?php get_template_part('slider', 'home'); // Appel du slideshow carousel ?>
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
      <div class="row">
        <?php while($req_blog->have_posts()): $req_blog->the_post(); ?>
          <div class="col-xs-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><?php the_title(); ?></h2>
              </div>
              <div class="panel-body">
                <?php the_post_thumbnail('medium', array('class' => 'img-responsive aligncenter')); ?>
                <?php the_excerpt(); ?>
              </div>
              <div class="panel-footer">
                <p>
                  <?php
                    echo cl_give_me_meta_01(
                      esc_attr(get_the_date('c')),
                      esc_html(get_the_date()),
                      get_the_category_list(', '),
                      get_the_tag_list('', ', ')
                    );
                  ?>
                </p>
              </div><!-- EOF panel-footer -->
            </div><!-- EOF panel-default -->
          </div><!-- EOF col-xs-6 -->
        <?php endwhile; wp_reset_postdata(); // Permet de remettre à zéro les infos contenues dans $post ?>
      </div><!-- EOF row -->
    </div><!-- EOF container -->
  </section><!-- EOF section -->
<?php endif; ?>

  <section>
    <div class="container">
      <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
          <div class="row">
            <div class="col-xs-12">
              <?php the_title('<h1>','</h1>'); ?>
              <?php the_content(); ?>
            </div><!-- EOF col-xs-12 -->
          </div><!-- EOF row -->
        <?php endwhile; ?>
      <?php else: ?>
        <div class="row">
          <div class="col-xs-12">
            <p>Pas de résultats.</p>
          </div><!-- EOF col-xs-12 -->
        </div><!-- EOF row -->
      <?php endif; ?>
    </div><!-- EOF container -->
  </section>
<?php get_footer(); ?>
