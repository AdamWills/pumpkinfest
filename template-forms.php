<?php
/**
 * Template Name: Forms Page
 */
?>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'forms'); ?>
<?php endwhile; ?>
