<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>

    <meta charset= "<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="lorem ipsum">
    <!-- Fonction wp_head() qui appelle toutes les balises du head (meta, link...) -->
    <?php wp_head(); ?>

  </head>

  <body>

    <header>
      <!-- Static navbar -->
      <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Home</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="#">Menu 1</a></li>
              <li><a href="#">Menu 2</a></li>
              <li><a href="#">Menu 3</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav> <!-- EOF navbar -->
    </header> <!-- EOF header -->

    <div class="container">
      <div class="jumbotron">
        <h1>Site Test</h1>
      </div>
    </div> <!-- EOF container -->
    <section>
      <div class="container">
        <?php if(have_posts()): ?> <!-- Boucle qui vérifie l'existence d'articles -->
          <?php while(have_posts()): the_post(); ?> <!-- Invoque l'itération de l'article en cours -->
            <div class="row">
              <div class="col-xs-2">
                <?php the_post_thumbnail() ?> <!-- Affiche l'image à la une de l'article -->
              </div>
              <div class="col-xs-10">
                <h1><?php the_title(); ?></h1> <!-- Affiche le titre de l'article
                echo "<br>"; -->
                <?php the_excerpt() ?> <!-- Affiche le corps de l'article -->
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
    </section>

    <!-- Fonction wp_footer() qui appelle les feuilles javascript à la fin du body -->
    <?php wp_footer(); ?>

  </body>
</html>
