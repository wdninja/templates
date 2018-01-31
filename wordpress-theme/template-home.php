<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <section class="brand-film" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri(); ?>/images/boy-on-tracks.jpg" data-speed="0.8">
                    <div class="inner">
                        <div class="tagline-wrapper">
                            <div class="tagline">
                                <span class="line animated fadeIn"><?php the_field('line_one'); ?></span>
                                <span class="line animated fadeIn"><?php the_field('line_two'); ?></span>
                                <span class="line animated fadeIn"><?php the_field('line_three'); ?></span>
                            </div>
                            <span class="underline animated fadeInLeft"><span></span></span>
                            <span class="watch-film animated fadeIn"><?php the_field('brand_film_button_text'); ?> <?php echo file_get_contents(get_template_directory().'/images/arrowRight.svg'); ?></span>
                        </div>
                    </div>
                    <div class="overlay animated" id="brand-film">
                        <div class="video">
                            <iframe class="" src="<?php the_field('brand_film_url'); ?>" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>
                        <span class="close"></span>
                    </div>
                </section>
                <section class="home-hook container-light">
                    <div class="inner">
                        <div class="aniview" data-av-animation="fadeIn">
                            <?php the_field('hook_content'); ?>
                        </div>
                    </div>
                </section>
                <section class="home-work container-dark">
                    <div class="inner">
                        <div class="aniview" data-av-animation="fadeIn">
                            <h2><span class="heading">Our Work</span><span class="link"><a href="/work/science-museum-of-virginia/">More <?php echo file_get_contents(get_template_directory().'/images/arrowRight.svg'); ?></a></span></h2>
                        </div>

                        <?php
                        $posts = get_field('work');
                        if( $posts ): ?>
                            <div class="work-grid">
                                <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                                    <?php $featuredImage = get_field('work_featured_image'); ?>
                                    <?php setup_postdata($post); ?>
                                    <a href="<?php the_permalink(); ?>" class="work-item">
                                        <img src="<?php echo $featuredImage['sizes']['thumbnail']; ?>" alt="<?php echo $featuredImage['alt']; ?>" />
                                        <div class="overlay">
                                            <h2><?php the_title(); ?></h2>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                        <?php endif; ?>

                    </div>
                </section>

            <?php endwhile; else : ?>
            	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>

<?php get_footer(); ?>
