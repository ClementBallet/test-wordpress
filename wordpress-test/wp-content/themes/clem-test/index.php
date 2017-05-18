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
        <div class="row">
          <div class="col-xs-2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/lorem-ipsum-logo.jpg" alt="" class="img-responsive">
          </div>
          <div class="col-xs-10">
            <h1>Titre de l'article</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div><!-- EOF row -->

        <div class="row">
          <div class="col-xs-2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/lorem-ipsum-logo.jpg" alt="" class="img-responsive">
          </div>
          <div class="col-xs-10">
            <h1>Titre de l'article</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div><!-- EOF row -->

        <div class="row">
          <div class="col-xs-2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/lorem-ipsum-logo.jpg" alt="" class="img-responsive">
          </div>
          <div class="col-xs-10">
            <h1>Titre de l'article</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div><!-- EOF row -->

        <div class="row">
          <div class="col-xs-2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/lorem-ipsum-logo.jpg" alt="" class="img-responsive">
          </div>
          <div class="col-xs-10">
            <h1>Titre de l'article</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div><!-- EOF row -->
      </div><!-- EOF container -->
    </section>

    <!-- Fonction wp_footer() qui appelle les feuilles javascript à la fin du body -->
    <?php wp_footer(); ?>

  </body>
</html>
