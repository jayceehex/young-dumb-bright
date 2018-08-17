<?php
/**
 * Template part for displaying CTA on pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Young,_Dumb_and_Bright
 */

$cta_result = ctaQuery();

?>

	<section class="cta">
    <?php 
    if ( $cta_result->have_posts() ) {
		while ( $cta_result->have_posts() ) : $cta_result->the_post(); ?>
            <h1><?php the_title(); ?></h1>
            
            <div class="entry-content">
                <p><?php
                the_field('summary'); ?></p>
                <p><a href="<?php echo get_post_field( 'post_name', get_post() ); ?>" class="button">Get in touch</a></p>
            </div>
	<?php
	// End the loop
	endwhile;
	wp_reset_query();
	}
    ?>
	</section>
