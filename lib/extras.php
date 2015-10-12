<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

function show_business_directory() {
      
      // List posts by the terms for a custom taxonomy of any post type
      $post_type = 'business';
      $tax = 'business-category';
      $tax_terms = get_terms( $tax, 'orderby=name&order=ASC');
      if ($tax_terms) {
          foreach ($tax_terms  as $tax_term) {
              $args = array(
                  'post_type'         => $post_type,
                  "$tax"              => $tax_term->slug,
                  'post_status'       => 'publish',
                  'posts_per_page'    => -1,
                  'orderby'           => 'name',
                  'order'             => 'ASC'
              );

              $my_query = null;
              $my_query = new \WP_Query($args);

              if( $my_query->have_posts() ) : ?>

                  <h2><?php echo $tax_term->name; // Group name (taxonomy) ?></h2>

                  <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                      
                      <h3><?php the_title(); ?></h3>
                      <?php $location = get_field('location'); ?>
                      <p>
                        <a href="<?php echo get_map_link($location['address']); ?>"><?php echo format_address($location['address']); ?></a><br>
                        <a href="tel:<?php the_field('phone_number'); ?>"><?php the_field('phone_number'); ?></a>
                      </p>

                  <?php endwhile; // end of loop ?>

              <?php endif; // if have_posts()
              wp_reset_query();

          } // end foreach #tax_terms
      } // end if tax_terms
}

function format_address($address) {
  $parts = explode(",", $address);
  return $parts[0];
}

function get_map_link($address) {
  return 'https://maps.google.com/maps?q=loc:' . $address;
}

function show_event_schedule() {
  
  $args = array(
      'post_type'         => 'event',
      'post_status'       => 'publish',
      'posts_per_page'    => -1,
      'meta_key'          => 'start_date',
      'orderby'           => 'meta_value_num',
      'order'             => 'DESC'

  );
  // TODO => put in order of start date

  $my_query = new \WP_Query($args);

  if( $my_query->have_posts() ) : ?>

      <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
          
          <h3><?php the_title(); ?></h3>

          <p><?php the_field('date'); ?> - <?php the_field('end_time'); ?></p>

          <?php $location = get_field('location')[0]; ?>

          <p><?php echo $location->post_title; ?></p>


      <?php endwhile; // end of loop ?>

  <?php endif; // if have_posts()
  wp_reset_query();
}