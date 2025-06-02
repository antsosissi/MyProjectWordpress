<?php
/*
 * ajouter ici les templates dont vous voulez desactiver le wysiwyg principal
 * */
function remove_main_editor() {
    if (isset($_GET['post'])) {
        $id = $_GET['post'];
        $template = get_post_meta($id, '_wp_page_template', true);
        switch ($template) {
            case 'page-templates/mycustomtemplate.php':
            case 'page-templates/accueil.php':
                remove_post_type_support('page', 'editor');
                break;
            default :
                // Don't remove any other template.
                break;
        }
    }
}
add_action('init', 'remove_main_editor');
?>