<?php
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5eb2a0ceca235',
        'title' => 'BANIÈRE DE LA PAGE',
        'fields' => array(
            array(
                'key' => 'field_5eb2a0f80179f',
                'label' => 'Image principale du bannière',
                'name' => 'bondy_banniere_image',
                'type' => 'image',
                'instructions' => 'Taille de l\'image optimale 1920 x 485',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
//            array(
//                'key' => 'field_5eb2a117017a0',
//                'label' => 'Titre de la bannière',
//                'name' => 'bondy_banniere_titre',
//                'type' => 'text',
//                'instructions' => '',
//                'required' => 0,
//                'conditional_logic' => 0,
//                'wrapper' => array(
//                    'width' => '',
//                    'class' => '',
//                    'id' => '',
//                ),
//                'default_value' => '',
//                'placeholder' => '',
//                'prepend' => '',
//                'append' => '',
//                'maxlength' => '',
//            ),
            array(
                'key' => 'field_5eb2a338bc8b1',
                'label' => 'Description de la bannière',
                'name' => 'bondy_banniere_description',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
                'delay' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
               /* array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => 'page-templates/especes-d-arbres.php',
                ),*/
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;