<?php

/**
 * Construction de la page options du thème
 */

  function cl_build_options_page() {
    $theme_opts = get_option('cl_opts');
?>

    <div class="wrap">
      <div class="container">

        <?php
          if(isset($_GET['status']) && $_GET['status'] == 1) {
            echo '<div class="alert alert-success">Mise à jour effectuée avec succès.</div>';
          }
        ?>

        <div class="jumbotron">
          <h1>Paramètres du site</h1>
        </div><!-- EOF jumbotron -->

        <form id="form-cl-options" class="form-horizontal" action="admin-post.php" method="post">
          <input type="hidden" name="action" value="cl_save_options">
          <?php
            wp_nonce_field('cl_options_verify');
          ?>

          <div class="col-xs-12">
            <h1 class="h2">Image du logo en page d'accueil (haut de page)</h1>
            <div class="row">
              <div class="col-lg-5">
                <img style="margin-bottom:20px;" id="img_preview_01" src="<?php echo $theme_opts['image_01_url']; ?>" class="img-responsive img-thumbnail" alt="">
              </div>
              <div class="col-lg-6 col-lg-offset-1">
                <button class="btn btn-primary btn-lg btn-select-img" type="button" id="btn_img_01">Choisir une image pour le logo</button>
              </div>
            </div><!-- EOF row -->
            <div class="form-group">
              <label for="cl_image_01" class="col-sm-2 control-label">Image sauvegardée</label>
              <div class="col-sm-10">
                <input type="text" width="300px" id="cl_image_01" name="cl_image_01" disabled value="<?php echo $theme_opts['image_01_url']; ?>" style="width:100%;"/>
                <input type="hidden" width="300px" id="cl_image_url_01" name="cl_image_url_01" value="<?php echo $theme_opts['image_01_url']; ?>" style="width:100%;"/>
              </div>
            </div><!-- EOF form-group -->
          </div><!-- EOF col-xs-12 -->

          <div class="col-xs-12">
            <div class="form-group">
              <label for="cl_legend_01" class="col-sm-2" control-label>Légende</label>
              <div class="col-sm-10">
                <input type="text" id="cl_legend_01" name="cl_legend_01" value="<?php echo $theme_opts['legend_01']; ?>" style="width:100%;">
              </div>
            </div><!-- EOF form-group -->
          </div><!-- EOF col-xs-12 -->

          <div class="">
            <button id="validator" type="submit" class="btn btn-success btn-lg">Mettre à jour les options</button>
          </div>

        </form>
      </div><!-- EOF container -->
    </div><!-- EOF wrap -->

<?php
  }
?>
