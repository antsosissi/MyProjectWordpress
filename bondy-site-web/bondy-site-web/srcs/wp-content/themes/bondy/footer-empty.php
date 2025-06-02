<?php
global $bondy_options;
$accesRapideMenu = Cmenu::get_menu("MenuFooterAccesRapide");
$nosServiceMenu  = Cmenu::get_menu("MenuFooterNosServices");
$urlApropos      = Cmenu::get_menu("UrlApropos");
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */
?>

</div><!-- #main -->


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>