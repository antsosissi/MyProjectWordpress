<?php

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
<?php
    get_template_part('template-part/footer/footer.tpl');
    get_template_part('template-part/footer/modal-popin.tpl');
?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>