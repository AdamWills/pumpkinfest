<?php
/**
 * Template Name:  Event Schedule
 */
?>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'event-schedule'); ?>
<?php endwhile; ?>