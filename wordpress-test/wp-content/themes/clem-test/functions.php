<?php

/**
 *
 *   Lancement des scripts
 *
 */

/**
 * On définit la version de notre thème et on réutilise la variable CL_VERSION dans les fonctions wp_enqueue_style.
 * Permet de ne pas avoir à le changer manuellement dans fonctions à chaque changement de version.
 */

define('CL_VERSION','1.2.3');

/**
 * Fonction wp_enqueue_style() qui appelle les feuilles de styles.
 * 5 paramètres :
 * - id qui représente la feuille de style (cl_custom)
 * - chemin de la feuille avec get_template_directory_uri qui récupère le répertoire du site puis l'emplacement /style.css
 * - un array() qui prend en compte les dépendances éventuelles de la feuille de style.
 * - numéro de version de la feuille de style (1.0.0)
 * - les media pour lesquels la feuille de style va intervenir (all, print, screen ou des media queries tel que max-width:640px)
 */

/**
 * Fonction wp_enqueue_script() qui appelle les feuilles javascript
 * Les choses qui changent par rapport à wp_enqueue_style() :
 * - jquery chargé en dépendance dans array() (voir les dépendances incluses dans WordPress ici : https://developer.wordpress.org/reference/functions/wp_enqueue_script/#Default_Scripts_Included_and_Registered_by_WordPress)
 * - le booleen au niveau du 5ème paramètre au lieu de "all".
 * False = chargement du script dans le head.
 * True = chargement du script à la fin du body.
 */

function cl_scripts(){
  // Chargement des styles
  wp_enqueue_style('cl_bootstrap-core', get_template_directory_uri().'/css/bootstrap.min.css', array(), CL_VERSION, 'all');

  wp_enqueue_style('cl_animate', get_template_directory_uri().'/css/animate.min.css', array(), CL_VERSION, 'all');

  wp_enqueue_style('cl_custom', get_template_directory_uri().'/style.css', array('cl_bootstrap-core', 'cl_animate'), CL_VERSION, 'all');

  // Chargement des scripts
  wp_enqueue_script('jquery-js', get_template_directory_uri().'/js/jquery.min.js', array(), CL_VERSION, true);

  wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery-js'), CL_VERSION, true);

  wp_enqueue_script('cl_script', get_template_directory_uri().'/js/clem-test.js', array('jquery-js', 'bootstrap-js'), CL_VERSION, true);
}

add_action('wp_enqueue_scripts', 'cl_scripts');

/**
 *   Chargement des styles/scripts dashboard
 */

function cl_admin_init() {
  // Action 1
  function cl_admin_scripts() {
    // Enlève le style bootstrap dans les réglages du thème, notamment pour la balise code qui s'affiche en rouge.
    if(!isset($_GET['page']) || $_GET['page'] != "cl_theme_opts") {
      return;
    }
    // Chargement des styles admin
    wp_enqueue_style('cl_admin_bootstrap-core', get_template_directory_uri().'/css/bootstrap.min.css', array(), CL_VERSION, 'all');
    // Chargement des scripts admin
    wp_enqueue_media();  // Inclusion du media uploader de WP
    wp_enqueue_script('cl_admin_init', get_template_directory_uri().'/js/admin-options.js', array(), CL_VERSION, true);
  } // Fin cl_admin_scripts()

  add_action('admin_enqueue_scripts', 'cl_admin_scripts');

  // Action 2
  include('includes/save-options-page.php');
  add_action('admin_post_cl_save_options', 'cl_save_options');
}

add_action('admin_init', 'cl_admin_init');

/**
 *    Activation des options
 */

function cl_activ_options() {
  $theme_opts = get_option('cl_opts');
  if(!$theme_opts) {
    $opts = array(
      'image_01_url' => '',
      "legend_01"    => ''
    );
    add_option('cl_opts', $opts);
  }
}

add_action('after_switch_theme', 'cl_activ_options');

/**
 *    Menu options du thème
 */

function cl_admin_menus() {
  add_menu_page(
    'Test Wordpress Options', // Titre de l'onglet
    'Options du thème', // Titre du menu dans le panneau d'admnistration de WP
    'publish_pages', // Voir "Roles & capabilities" dans le codex de WP. Ici nous avons donné les droits à "editor".
    'cl_theme_opts', // Slug qui apparait dans l'URL
    'cl_build_options_page' // Fonction qui se trouve dans /includes/build-options-page.php
  );
  include('includes/build-options-page.php');
}

add_action('admin_menu', 'cl_admin_menus');

/**
 *    Sidebars et widget
 */

function cl_widgets_init() {
  register_sidebar(array(
    'name'          => 'Footer Widget Zone',
    'description'   => 'Widget affichés dans le footer : 4 au maximum',
    'id'            => 'widgetized-footer',
    'before_widget' => '<div id="%1$s" class="col-xs-12 col-sm-12 col-md-3 wrap-widget %2$s"><div class="inside-widget">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h2 class="h3 text-center">',
    'after_title'   => '</h2>'
  ));
}

add_action('widgets_init', 'cl_widgets_init');

 /**
  *
  *   Utilitaires
  *
  */

function cl_setup() {
 // Ajoute la possibilité de mettre une "image à la une" ou "image mise en avant" (post-thumbnails) dans les articles
 add_theme_support('post-thumbnails');
 // Créé une taille personnalisée pour les images du slideshow carousel
 add_image_size('front-slider', 1140, 420, true);
 // Supprime la version de WordPress dans le code visible par les utilisateurs (risques de piratage)
 remove_action('wp_head', 'wp_generator');
 // Supprime les guillemets à la française
 remove_filter('the_content', 'wptexturize');
 // Affiche la balise "title" dans le head (empêche les conflits avec certains systèmes SEO)
 add_theme_support('title-tag');
 // Active la gestion des menus Bootstrap
 require_once('includes/wp-bootstrap-navwalker.php');
 // Active la gestion des menus ("principal" est le nom du menu qui apparait dans l'administration)
 register_nav_menus(array('primary' => 'principal'));
}

add_action('after_setup_theme', 'cl_setup');

/**
 *    Ajoute la taille medium large dans la sélection d'image
 */

function my_images_sizes($sizes) {
  $addsizes = array (
    "medium_large" => "Medium Large"
  );
  $newsizes = array_merge($sizes, $addsizes);
  return $newsizes;
}

add_filter('image_size_names_choose', 'my_images_sizes');

 /**
  *  Affichage date + catégorie
  *
  *  Modèle du résultat : <time class="entry-date" datetime="2017-05-19T10:58:00+00:00">19 mai 2017</time>
  */

function cl_give_me_meta_01($date1, $date2, $cat, $tags) {
  $chaine  = 'Publié le <time class="entry-date" datetime="';
  $chaine .= $date1;
  $chaine .= '">';
  $chaine .= $date2;
  $chaine .= '</time> dans la catégorie ';
  $chaine .= $cat;
  if(strlen($tags) > 0):
    $chaine .= ' avec les étiquettes : '. $tags;
  endif;

  return $chaine;
}

/**
 *   Enlève les 3 petits points à la suite des articles sur la page d'accueil et le remplace par "Lire la suite"
 */

function cl_excerpt_more($more) {
  return '<a class="more-link" href="' . get_permalink() .'">' . ' [lire la suite]' . '</a>';
}

add_filter('excerpt_more', 'cl_excerpt_more');

/**
 *   Slider page d'accueil
 */

function cl_slider_init() {
  $labels = array( // Personnalisation des labels du Carousel dans le panneau admin
    'name'               => 'Images Carousel Accueil',
    'singular_name'      => 'Image accueil',
    'add_new'            => 'Ajouter une image',
    'add_new_item'       => 'Ajouter une image accueil',
    'edit_item'          => 'Modifier une image accueil',
    'new_item'           => 'Nouveau',
    'all_items'          => 'Voir la liste',
    'view_item'          => 'Voir l\'élément',
    'search_item'        => 'Chercher une image accueil',
    'not_found'          => 'Aucun élément trouvé',
    'not_found_in_trash' => 'Aucun élément dans la corbeille',
    'menu_name'          => 'Slider Frontal'
  );

  $args = array(
    'labels'              => $labels,
    'public'              => true,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'query_var'           => true,
    'rewrite'             => true,
    'capability_type'     => 'post',
    'has_archive'         => false,
    'hierarchical'        => false,
    'menu_position'       => 20,
    'menu_icon'           => get_stylesheet_directory_uri() . '/assets/slideshow.png',
    'publicly_queryable'  => false,
    'exclude_from_search' => true,
    'supports'            => array('title', 'page-attributes', 'thumbnail') // Personnalisation des labels dans l'éditeur de texte du Carousel
  );

register_post_type('cl_slider', $args);
}

add_action('init', 'cl_slider_init');

/**
 *   Ajout de l'image et ordre dans la colonne admin pour le slider
 */

add_filter('manage_edit-cl_slider_columns', 'cl_col_change'); // Change nom des colonnes

function cl_col_change($columns) {
  $columns['cl_slider_image_order'] = "Ordre";
  $columns['cl_slider_image'] = "Image affichée";

  return $columns;
}

add_action('manage_cl_slider_posts_custom_column', 'cl_content_show', 10, 2); // Affiche le contenu

function cl_content_show($column, $post_id) {
  global $post;

  if($column == 'cl_slider_image') {
    echo the_post_thumbnail(array(200,100));
  }
  if($column == 'cl_slider_image_order') {
    echo $post->menu_order;
  }
}

/**
 *   Tri auto sur l'ordre dans la colonne admin pour le slider
 */

function cl_change_slides_order($query) {
  global $post_type, $pagenow;

  if($pagenow == 'edit.php' && $post_type == 'cl_slider') {
    $query->query_vars['orderby'] = 'menu_order';   // Voir dans le codex WP_Query
    $query->query_vars['order'] = 'asc';            // Ordre croissant. Voir dans le codex WP_Query
  }
}

add_action('pre_get_posts', 'cl_change_slides_order');
