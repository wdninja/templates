<?php get_header(); ?>

            <?php if ( have_posts() ) : ?>

            <?php else : ?>
            	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>

<?php get_footer(); ?>
