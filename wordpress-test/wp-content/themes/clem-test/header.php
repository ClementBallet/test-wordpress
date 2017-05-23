<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>

    <meta charset= "<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if(is_home()): ?>
      <meta name="description" content="Page des articles du blog">
    <?php endif; ?>

    <?php if(is_front_page()): ?>
      <meta name="description" content="Page d'accueil statique du blog">
    <?php endif; ?>

    <?php if(is_page() && !is_front_page()): ?>
      <meta name="description" content="Contenu de type page">
    <?php endif; ?>

    <?php if(is_category()): ?>
      <meta name="description" content="Liste de articles pour la catégorie <?php echo single_cat_title('', false); ?>, lorem">
    <?php endif; ?>

    <?php if(is_tag()): ?>
      <meta name="description" content="Liste de articles reliés avec l'étiquette <?php echo single_tag_title('', false); ?>, lorem">
    <?php endif; ?>

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
            <a class="navbar-brand" href="#">Home</a>
          </div>

          <?php  // Affiche le menu (voir doc du module "WP Bootstrap Navwalker")
            wp_nav_menu(array(
              'menu' => 'top-menu',
              'theme_location' => 'primary',
              'depth' => 2, // Profondeur des sous-menus
              'container' => 'div', // Type de conteneur
              'container_class' => 'navbar-collapse collapse', // Classe css du conteneur
              'container_id' => 'navbar', // ID css du conteneur
              'menu_class' => 'nav navbar-nav', // Classe css du menu (ul)
              'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
              'walker' => new WP_Bootstrap_Navwalker()
              )
            );
          ?>

        </div><!-- EOF container -->
      </nav><!-- EOF navbar -->
    </header><!-- EOF header -->

    <!-- BOF jumbotron de la page principale -->
    <div class="container">
      <div class="jumbotron">
        <?php $theme_opts = get_option('cl_opts'); ?>
        <div class="row">
          <div class="col-xs-4">
            <img class="img-responsive" src="<?php echo $theme_opts['image_01_url']; ?>" alt=""><!-- Image principale du site -->
            <p class="text-center"><?php echo stripslashes($theme_opts['legend_01']); ?></p><!-- Légende de l'image principale du site -->
          </div>
          <div class="col-xs-8">
            <h1 class="m-up-reset">Site Test</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div><!-- EOF row -->
      </div><!-- EOF jumbotron -->
    </div><!-- EOF container -->
