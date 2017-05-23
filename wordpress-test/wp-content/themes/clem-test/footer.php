  <footer >
    <div class="container">
      <div class="row">

        <?php if(is_active_sidebar('widgetized-footer')): ?>
          <?php dynamic_sidebar('widgetized-footer'); ?>
        <?php else: ?>

        <div class="col-xs-12">
          <h2>Footer de notre site test</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </div><!-- EOF col-xs-12 -->
      <?php endif; ?>
      </div><!-- EOF row -->
    </div><!-- EOF container -->
  </footer>

  <!-- Fonction wp_footer() qui appelle les feuilles javascript à la fin du body -->
  <?php wp_footer(); ?>

</body>
</html>
