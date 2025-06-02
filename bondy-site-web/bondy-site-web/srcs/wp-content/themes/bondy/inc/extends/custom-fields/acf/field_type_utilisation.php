<?php
/**
 * Created by PhpStorm.
 * Date: 20/05/2020
 * Time: 13:00
 */
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5ec5042653f7a',
        'title' => '',
        'fields' => array(
            array(
                'key' => 'field_5ec5041524aa6',
                'label' => 'Pictogramme ',
                'name' => 'pictogramme_utilisation',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'apple-2' => '<i class="icobnd-apple-2"></i>',
                    'tree-up' => '<i class="icobnd-tree-up"></i>',
                    'trees-2' => '<i class="icobnd-trees-2"></i>',
                    'noforest' => '<i class="icobnd-noforest"></i>',
                    'tree_money' => '<i class="icobnd-tree_money"></i>',
                    'leaves' => '<i class="icobnd-leaves"></i>',
                    'wood' => '<i class="icobnd-wood"></i>',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'type_utilisation',
                ),
            ),
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'specificite',
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
