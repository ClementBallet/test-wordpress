/**
 *
 * ATTENTION : dans WordPress, il faut déclarer "$" en paramètre de la fonction.
 * Objectif : éviter les conflits si d'autres modules ou dépendances de WordPress utilisent le "$".
 *
 */

jQuery(document).ready(function($) {

  if (document.getElementById("slider-01")) {
    var $myCarousel = $('.carousel');

    // départ du Carousel
    $myCarousel.carousel({
      interval: 5000
    });

    $myCarousel.on('slide.bs.carousel', function(e) {
      var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");

      doAnimations($animatingElems);
    });

    var $firstAnimatedElement = $myCarousel.find(".item:first").find("[data-animation ^= 'animated']"); // Prise en compte de l'animation pour le premier élément

    doAnimations($firstAnimatedElement);

    function doAnimations(elems) {
      var animEndEv = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationEnd animationEnd';

      elems.each(function() {
        var $this = $(this);

        $animationType = $this.data('animation');
        console.log($animationType);
        $this.addClass($animationType).one(animEndEv, function() {
          $this.removeClass($animationType)
        });
      }); // EOF each
    } // EOF doAnimations()
  } // EOF document.getElementById

}); // EOF jquery ready
