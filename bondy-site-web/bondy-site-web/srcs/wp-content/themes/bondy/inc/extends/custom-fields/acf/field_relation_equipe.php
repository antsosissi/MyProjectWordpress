<?php
/**
 * Created by PhpStorm.
 * Date: 12/05/2020
 * Time: 15:32
 */
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5eba98b1738a8',
        'title' => 'Equipe mise en avant',
        'fields' => array(
            array(
                'key' => 'field_5eba98c22280d',
                'label' => '',
                'name' => 'relation_equipe',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'equipe',
                ),
                'taxonomy' => '',
                'filters' => array(
                    0 => 'post_type',
                ),
                'elements' => '',
                'min' => '',
                'max' => '',
                'return_format' => 'id',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/accueil.php',
                ),
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