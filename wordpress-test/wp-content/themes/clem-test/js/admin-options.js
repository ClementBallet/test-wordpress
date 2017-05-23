jQuery(document).ready(function($) {

  /**
   * Ajout image dans page
   */

  var frame = wp.media({
    title:'Sélectionner une image',
    button: {
      text: 'Utiliser ce média'
    },
    multiple: false
  });

  $("#form-cl-options #btn_img_01").click(function(e) {
    e.preventDefault();
    frame.open();
  });

  frame.on('select', function(){

    var objImg = frame.state().get('selection').first().toJSON();

    var mon_url = objImg.sizes.medium_large.url; // Récupère url images medium_large

    $("img#img_preview_01").attr('src', mon_url); // Rajoute une image dans un bloc dans build-options-page.php
    $("input#cl_image_01").attr('value', mon_url); // Rajoute l'url de l'image dans un bloc dans build-options-page.php
    $("input#cl_image_url_01").attr('value', mon_url);
  });
});
