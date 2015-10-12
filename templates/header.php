<button type="button" class="btn btn-default navbar-toggle collapsed">Menu</button>

<header class="banner" role="banner">
  <div class="hero">
    <?php get_template_part('templates/content', 'hero'); ?>
  </div>
  <div class="container">
    <nav role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
  </div>
</header>
