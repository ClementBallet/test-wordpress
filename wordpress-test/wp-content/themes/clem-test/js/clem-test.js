/**
 *
 * ATTENTION : dans WordPress, il faut déclarer "$" en paramètre de la fonction.
 * Objectif : éviter les conflits si d'autres modules ou dépendances de WordPress utilisent le "$".
 *
 */

jQuery(document).ready(function($) {
  $("h1").css('color',"#f00");
})
