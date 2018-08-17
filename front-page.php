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
	<?php 
	get_template_part( 'template-parts/content', 'cta' );
	?>

<?php
get_footer();
