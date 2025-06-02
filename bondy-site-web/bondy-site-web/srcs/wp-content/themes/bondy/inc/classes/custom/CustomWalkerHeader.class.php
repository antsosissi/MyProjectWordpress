<?php

class CustomWalkerNavMenuHeader extends Walker_Nav_Menu
{
/**
* Start the element output.
*
* @param  string $output Passed by reference. Used to append additional content.
* @param  object $item   Menu item data object.
* @param  int $depth     Depth of menu item. May be used for padding.
* @param  array $args    Additional strings.
* @return void
*/
public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

$output     .= '';
$attributes  = '';
$countChild =CMenu::get_CountSubMenu("MenuHeader",$item->ID);

! empty ( $item->attr_title )
// Avoid redundant titles
and $item->attr_title !== $item->title
and $attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';

    if($countChild > 0 )  {
        $attributes .= ' href="' . esc_attr( $item->url ) .'" title="' . $item->title .'" ';
    } else {
        ! empty ( $item->url )
        and $attributes .= ' href="' . esc_attr( $item->url ) .'" title="' . $item->title .'" ';
    }




$classes     = empty( $item->classes ) ? array() : (array) $item->classes;

if($item->menu_item_parent == 0) {
    $zClassLi = 'class="nav-item"';
}
else{
    $zClassLi = 'class="dropdown-item"';
}

$output      .= '<li '.$zClassLi.'>';

$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
$class_names = '';
$attributes  .= $class_names;

if($item->target != '')
{
$attributes  .= ' target="'.$item->target.'" ';
}

$zClassA = '';

    if(in_array('current_page_item', $item->classes)) {
        $zClassA  .= 'active ';
    }

//echo "<pre>";print_r($item);echo "</pre>";
if($item->menu_item_parent == 0) {

    $zClassA  .= 'nav-link ';
}

    $attrSuppl = "";
if($countChild > 0 )  {
    $zClassA  .= 'dropdown-toggle ';
    $attrSuppl = ' id="projets-dropdownlink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ';
}

if($zClassA != "") {
    $attributes  .= ' class="'.$zClassA.'" ';
}

//echo "<li>".print_r($attributes)."</li>";
$attributes  .= $attrSuppl;
$attributes  = trim( $attributes );

if(in_array('cls-home', $item->classes)) {
        $title = '<i class="icobnd-home"></i>';
}
else{
        $title       = apply_filters( 'the_title', $item->title, $item->ID );
}



$item_output = "$args->before<a $attributes>$args->link_before$title</a>";
if( trim($args->link_after)!='' && $item->menu_order < $args->menu->count ){
$item_output = $item_output.$args->link_after.$args->after;
}

// Since $output is called by reference we don't need to return anything.


$output .= apply_filters(
'walker_nav_menu_start_el'
,   $item_output
,   $item
,   $depth
,   $args
);
}

/**
* @see Walker::start_lvl()
*
* @param string $output Passed by reference. Used to append additional content.
* @return void
*/public function start_lvl( &$output, $depth = 0, $args = null ) {

$output .= '<ul class="dropdown-menu" aria-labelledby="projets-dropdownlink">';
}

/**
* @see Walker::end_lvl()
*
* @param string $output Passed by reference. Used to append additional content.
* @return void
*/
public function end_lvl( &$output, $depth = 0, $args = null ) {
$output .= '</ul>';
}

/**
* @see Walker::end_el()
*
* @param string $output Passed by reference. Used to append additional content.
* @return void
*/
public function end_el( &$output, $item, $depth = 0, $args = null ) {

$output .= '</li>';
}
}
?>