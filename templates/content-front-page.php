<div class="container section-main">

<?php the_content(); ?>

</div>

<div class="news section section-primary">
    <h2>Our Latest News</h2>

    <?php
    $args = array( 'numberposts' => '1' );
    $recent_posts = wp_get_recent_posts( $args );
    foreach( $recent_posts as $recent ){
        echo '<h3><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </h3> ';
        echo '<p>'. $recent['post_content'] .'</p>';
        echo '<p><a href="/news/" class="btn btn-secondary btn-lg">View More News</a></p>';
    }
    ?>
</div>

<?php if( have_rows('sponsors') ): ?>

    <div class="sponsors section">
        <h2><?php the_field('sponsor_title'); ?></h2>
        <p class="logos">

            <?php while ( have_rows('sponsors') ) : the_row();

                $img = get_sub_field('image');?>

            <a href="<?php the_sub_field('link'); ?>"><img src="<?php echo $img['sizes']['large']; ?>" alt="<?php echo $img['alt']; ?>"></a>
            <?php endwhile; ?>
        </p>
    </div>

<?php endif; ?>

