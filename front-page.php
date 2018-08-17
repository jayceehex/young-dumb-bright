<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Young,_Dumb_and_Bright
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main front-page">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<section class="project-gallery">
	<?php 
	if ( $project_result->have_posts() ) {
		while ( $project_result->have_posts() ) : $project_result->the_post(); ?>
		<div class="project-card">
			<?php 
			get_template_part( 'template-parts/content', 'project-card' );
			?>
		</div>
	<?php
	// End the loop
	endwhile;
	wp_reset_query();
	}
	?>
	</section>
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

<?php
get_footer();
