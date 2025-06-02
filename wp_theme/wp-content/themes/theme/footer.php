<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage theme
 * @since theme 1.0
 * @author : sissi
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">


			<div id="site-generator">
				<?php do_action( 'theme_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'theme' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'theme' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'theme' ), 'WordPress' ); ?></a>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>