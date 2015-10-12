<?php dynamic_sidebar('sidebar-primary'); ?>

<a href="https://www.facebook.com/waterfordpumpkinfest" class="ad-facebook">
	<img src="<?php echo Roots\Sage\Assets\asset_path('images/sidebar-community.jpg'); ?>" alt="Join the Community">
</a>

<?php if( have_rows('sponsors', 1064) ): ?>

    <div class="sponsors">
        <h2 class="h3"><?php the_field('sponsor_title', 1064); ?></h2>
        <p class="logos">

            <?php while ( have_rows('sponsors', 1064) ) : the_row();

                $img = get_sub_field('image');?>

            <a href="<?php the_sub_field('link'); ?>"><img src="<?php echo $img['sizes']['large']; ?>" alt="<?php echo $img['alt']; ?>"></a>
            <?php endwhile; ?>
        </p>
    </div>

<?php endif; ?>