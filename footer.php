<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Young,_Dumb_and_Bright
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

	<?php 
	echo socialMenu();
	?>

		<section class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'young-dumb-bright' ) ); ?>">
				<?php
				echo '<i class="fas fa-bolt"></i> by <i class="fab fa-wordpress-simple"></i>';
				?>
			</a>
		</section><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
