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

define('CL_VERSION','1.0.8');

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

  wp_enqueue_style('cl_custom', get_template_directory_uri().'/style.css', array(), CL_VERSION, 'all');

  // Chargement des scripts
  wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery', 'tether-js'), CL_VERSION, true);

  wp_enqueue_script('cl_script', get_template_directory_uri().'/js/clem-test.js', array('jquery', 'bootstrap-js'), CL_VERSION, true);
}

add_action('wp_enqueue_scripts', 'cl_scripts');

/**
 * Fonction cl_admin_scripts() qui permet de changer les feuilles de styles via le panneau administration de Wordpress.
 */

function cl_admin_scripts() {
  wp_enqueue_style('cl_admin_bootstrap-core', get_template_directory_uri() . '/css/bootstrap.min.css', array(), CL_VERSION, 'all');
}

add_action('admin_init', 'cl_admin_scripts');

 /**
  *
  *   Utilitaires
  *
  */

function cl_setup() {
 // Ajoute la possibilité de mettre une "image à la une" ou "image mise en avant" (post-thumbnails) dans les articles
 add_theme_support('post-thumbnails');
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
  $chaine .= ' avec les étiquettes : '. $tags;

  return $chaine;
}
