<?php use Roots\Sage\Extras; ?>

<?php the_content(); ?>

<?php if( have_rows('forms') ): ?>

	<ul class="forms">
    	
    	<?php while ( have_rows('forms') ) : the_row(); ?>

    		<?php $file = get_sub_field('file'); ?>
		
	        <li><a href="<?php echo $file['url']; ?>"><?php the_sub_field('name'); ?></a></li>
	        
		<?php endwhile; ?>
	</ul>

<?php endif; ?>

<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
