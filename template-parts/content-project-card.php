<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Young,_Dumb_and_Bright
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<?php 
	if ( is_singular('project') ) :
		the_title( '<h1 class="entry-title">', '</h1>' );
	else :
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	endif;
	?>
	</header><!-- .entry-header -->

	<?php young_dumb_bright_post_thumbnail(); ?>

	<div class="entry-content">
		<?php

		the_excerpt();

		// the_content();

		?><a href="<?php echo get_permalink(); ?>" class="button">More</a>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
