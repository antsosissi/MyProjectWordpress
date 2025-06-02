<?php
/**
 * The template for displaying search forms in theme
 *
 * @package WordPress
 * @subpackage theme
 * @since theme 1.0
 * @author : sissi
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'theme' ); ?></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'theme' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'theme' ); ?>" />
	</form>
