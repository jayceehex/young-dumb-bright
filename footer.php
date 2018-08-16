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

		<section class="social-buttons">
		<a href="http://twitter.com/jayceehoskins"><i class="fab fa-twitter social-icon"></i></a>
		<i class="fab fa-linkedin-in social-icon"></i>
		<i class="fab fa-github social-icon"></i>
		</section>

		<section class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'young-dumb-bright' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'young-dumb-bright' ), 'WordPress' );
				?>
			</a>
		</section><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
