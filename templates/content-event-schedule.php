<?php use Roots\Sage\Extras; ?>

<?php the_content(); ?>

<?php if( have_rows('days') ): ?>

    <ul id="days" class="nav-schedule-days nav nav-tabs">
    <?php $i=1; while ( have_rows('days') ) : the_row();  ?>

        <li><a href="#day-<?php echo $i; ?>"><?php the_sub_field('date'); ?></a></li>

    <?php $i++; endwhile; $i=1; ?>

    </ul>

    <?php  while ( have_rows('days') ) : the_row();?>

        <div class="schedule-day">

            <h2 id="day-<?php echo $i; ?>"><?php the_sub_field('date'); ?></h2>

            <?php if (have_rows( 'events' ) ) : ?>

                <div class="schedule-day-events">

                    <?php while ( have_rows( 'events' ) ) : the_row(); ?>

                        <?php $location = get_sub_field( 'location' );  ?>

                        <h3><?php the_sub_field( 'title' ); ?></h3>

                        <?php if ( get_sub_field( 'description' ) ) : ?>
                            <p class="description"><?php the_sub_field('description'); ?></p>
                        <?php endif; ?>
                        
                        <p>Time: <?php the_sub_field('start_time'); ?>

                            <?php if ( get_sub_field( 'end_time' ) ) : ?>
                                - <?php the_sub_field( 'end_time' ); ?>
                            <?php endif; ?>

                        </p>


                        <?php if (!empty($location->post_title)): ?>
                            <?php $coords = get_field('location', $location->ID); ?>
                            <p>Location: <?php echo $location->post_title; ?> (<a href="http://www.google.com/maps/place/<?php echo $coords['address']; ?>"><?php _e('View Map', 'sage'); ?><span class="sr-only"> of <?php echo $location->post_title; ?></span></a>)</p>
                        <?php endif; ?>

                    <?php endwhile; ?>

                </div>

            <?php endif; ?>

            <p><a class="btn btn-primary btn-to-top" href="#days">Back to top</a></p>

        </div>

    <?php $i++; endwhile; ?>

<?php endif; ?>

