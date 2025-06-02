<?php
/**
 * configuration par defaut
 *
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

//enlever le p auto et br auto
//enlever le p auto et br auto
add_filter('tiny_mce_before_init','bondy_tiny_mce_before_init',10,2);
function bondy_tiny_mce_before_init($mceInit, $editor_id){
  $mceInit["wpautop"] = false;
  $mceInit["remove_linebreaks"] = false;
  $mceInit["apply_source_formatting"] = true;

  //style pour en mouvement
  // on créé un tableau contenant nos styles
  $style_formats = array (
    // chaque style est un nouveau tableau
    // Style "Sous-Titre H2"
    array(
      'title' => __('Titre H1'),
      'block' => 'h1',
      'attributes' => array('class'=>''),
      'wrapper' => false
    ),

    // Style "Sous-Titre H2"
    array(
      'title' => __('Titre H2'),
      'block' => 'h2',
      'attributes' => array('class'=>''),
      'wrapper' => false
    ),

    array(
      'title' => __('Titre H3'),
      'block' => 'h3',
      'attributes' => array('class'=>''),
      'wrapper' => false
    ),

    array(
      'title' => __('Titre H4'),
      'block' => 'h4',
      'attributes' => array('class'=>''),
      'wrapper' => false
    ),

    // Style "Texte"
    array(
      'title' => __('Texte'),
      'block' => 'p',
      'attributes' => array('class'=>''),
      'wrapper' => false,
      'exact' => true
    ),

    array(
      'title' => __('H2 Bôndy'),
      'block' => 'h2',
      'attributes' => array('class'=>'titre-bloc'),
      'wrapper' => false,
    ),


    array(
      'title' => __('titre particulier vert Bôndy'),
      'inline' => 'span',
      'attributes' => array('class'=>'text-vert'),
      'wrapper' => false,
    ),


    array(
      'title' => __('Texte marron dans un H2'),
      'inline' => 'span',
      'classes' => '',
    ),

  );
  // on remplace les styles existants par les nôtres
  $mceInit['style_formats'] = json_encode( $style_formats );

  //css rte BO
  $mceInit['content_css'] = get_template_directory_uri() . "/css/rteBO.php" ;

  $mceInit['body_class'] = 'rich-text';


  return $mceInit;
}

//remplacer le style select
add_filter( 'mce_buttons_2', 'bondy_mce_buttons_2' );
function bondy_mce_buttons_2( $buttons ) {
  //desactiver les formats actuels
  unset($buttons[0]) ;
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}

//charger les images en lazy load
//add_action( 'wp_enqueue_scripts', 'bondy_default_scripts' );
function bondy_default_scripts(){
  //remplacer jquery par une version recente
  if(!is_admin()){
    wp_deregister_script('jquery');
    //wp_register_script('jquery', get_template_directory_uri() .'/js/library/jquery-3.4.1.js', false, '1.9.0',false);
    wp_enqueue_script('jquery');
  }

  //wp_enqueue_script('jquery-lazyload', get_template_directory_uri() .'/js/library/jquery.lazyload.min.js', array('jquery'), '1.8.0' , true);
}

//add_filter( 'the_content','bondy_default_the_content',9);
function bondy_default_the_content($html){
  //charger en lazy load les images wp-image
  $html = preg_replace_callback(
    '!<img(.+?)>!',
    'wp_do_lazyload_wpimage',
    $html
  );
  return $html;
}
function wp_do_lazyload_wpimage($matches){
  $lazyimage = get_template_directory_uri() .'/images/trans.gif';
  //recherche l'attribut src
  $src1 = preg_replace('!(src=)(")(.+?)(")!','$1$2'.$lazyimage.'$4 data-original="$3"',$matches[1]);
  if (preg_match('#(class=)(")(.*?)(")#', $src1)){
    $src1 = preg_replace('#(class=)(")(.*?)(")#', '$1$2$3 lazy$4', $src1);
  }else{
    $src1.= ' class="lazy"';
  }
  return '<img'.$src1 . '>';
}