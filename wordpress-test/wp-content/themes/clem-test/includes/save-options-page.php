<?php

  function cl_save_options() {
    if(!current_user_can('publish_pages')) {  // On vérifie si l'utilisateur est habilité à faire les changements. Ici "publish_pages" = editor (voir codex).
      wp_die('Vous n\'êtes pas autorisé à effectuer cette opération.');
    }
    check_admin_referer('cl_options_verify');

    $opts = get_option('cl_opts');

    // Sauvegarde légende
    $opts['legend_01'] = sanitize_text_field($_POST["cl_legend_01"]);
    // Connexion bdd
    update_option('cl_opts', $opts);

    wp_redirect(admin_url('admin.php?page=cl_theme_opts&status=1'));
    exit;
  }

?>
