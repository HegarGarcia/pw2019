<!DOCTYPE html>
<html>
  <?php
  // Initialize site configuration
  require_once 'includes/config.inc.php';

  // Head
  require_once PARTIALS_PATH . 'head.partial.php';
  ?>
  
  <body>
    <?php
    require_once PARTIALS_PATH . 'header.partial.php';
    require_once VIEW_PATH . 'index.view.php';
    require_once PARTIALS_PATH . 'footer.partial.php';
    ?>
  </body>
  
</body>
</html>