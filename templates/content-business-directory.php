<?php use Roots\Sage\Extras; ?>

<?php Extras\show_business_directory(); ?>

<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
