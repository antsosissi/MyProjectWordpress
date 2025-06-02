<?php

global $bondy_options;
global $wp;
$menuHeader = Cmenu::get_menu("MenuHeader");
$lienContact = Cmenu::get_menu("LienContact");

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */
?><!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta http-equiv="x-ua-compatible" content="IE=edge">
<title><?php
  /*
   * Print the <title> tag based on what is being viewed.
   */
  global $page, $paged;

  wp_title( '|', true, 'right' );

  // Add the blog name.
  bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', 'bondy' ), max( $paged, $page ) );

  // si url de tous les réseaux sociaux vide
    if ( empty($bondy_options["facebook"]) && empty($bondy_options["instagram"]) && empty($bondy_options["linkedin"]) && empty($bondy_options["youtube"]) ) {
        $_is_RS_empty = true;
    } else {
        $_is_RS_empty = false;
    }

  ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<!-- <link rel="stylesheet" type="text/css" media="all" href="<**?php bloginfo( 'stylesheet_url' ); ?>" /> -->

<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri();?>/assets/css/critical.css" media="all" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri();?>/assets/css/main.css" media="no" onload="if(media!='all')media='all'" />
<noscript>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/main.css" >
</noscript>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!-- favicon -->
<link rel="icon" href="<?php if($bondy_options['favicon'] == null){echo get_template_directory_uri() ?>/favicon.ico"<?php } else { echo $bondy_options['favicon']; } ?> />

    <?php
  /* We add some JavaScript to pages with the comment form
   * to support sites with threaded comments (when in use).
   */
  if ( is_singular() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );

  /* Always have wp_head() just before the closing </head>
   * tag of your theme, or you will break many plugins, which
   * generally use this hook to add elements to <head> such
   * as styles, scripts, and meta tags.
   */
  wp_head();
  $pageContact = wp_get_post_by_template( 'contact.php' );
?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed">
    <div id="layer-loader">
        <div class="loader">
            <figure>
            <img  src="<?php echo get_template_directory_uri() ."/assets/images/logo-bondy-vh-210.png"; ?>" alt="<?php echo bloginfo(); ?>" >
            </figure>
            <div class="loader-content">
                <div class="box-loader"></div>
                <div class="box-loader"></div>
                <div class="box-loader"></div>
                <div class="box-loader"></div>
                <div class="box-loader"></div>
            </div>
        </div>
    </div>
    <div class="layerMask-menu"></div>
	<!-- fixed panel -->
	<div class="fixed-panel social-panel">
        <nav class="list-bloc">
            <ul>
                <li>
                    <a href="<?php echo get_permalink($pageContact->ID) ?>" title="Contact"><i class="icobnd-mail"></i><span>Contact</span></a>
                </li>
                <?php if ( !$_is_RS_empty ): ?>
                    <li class="nav-item dropdown">
                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="reso-dropdownlink" title="Réseaux sociaux"><i class="icobnd-link-social"></i><span>Réseaux sociaux</span></a>
                        <div aria-labelledby="reso-dropdownlink" class="dropdown-menu">
                            <ul>
                                <?php if($bondy_options["facebook"] != null){ ?>
                                <li>
                                    <a href="<?php echo $bondy_options["facebook"]; ?>" title="Facebook" target="_blank"><i class="icobnd-facebook"></i></a>
                                </li>
                                <?php
                                }
                                if($bondy_options["instagram"] != null)
                                {
                                    ?>
                                <li>
                                    <a href="<?php echo $bondy_options["instagram"]; ?>" title="Instagram" target="_blank"><i class="icobnd-instagram"></i></a>
                                </li>
                                <?php
                                }
                                if($bondy_options["linkedin"] != null)
                                {
                                    ?>
                                <li>
                                    <a href="<?php echo $bondy_options["linkedin"]; ?>" title="Linkedin" target="_blank"><i class="icobnd-linkedin-2"></i></a>
                                </li>
                                <?php
                                }
                                if($bondy_options["youtube"] != null) {
                                    ?>
                                <li>
                                    <a href="<?php echo $bondy_options["youtube"]; ?>" title="Youtube" target="_blank"><i class="icobnd-youtube"></i></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
	<!-- fixed panel -->
    <header class="header-main" id="branding" role="banner">
        <!-- top bar -->
        <article class="top-bar">
            <div class="container">
                <a href="<?php echo home_url( '/' ) ?>" class="logo-bondy" title="Bôndy">
                    <?php
                        $zLogoHeader = ( isset( $bondy_options["logo"] ) && !empty( $bondy_options["logo"] ) ) ? $bondy_options["logo"] : get_template_directory_uri() ."/assets/images/logo-bondy-vh-210.png";
                        $zLogoHeader1 = ( isset( $bondy_options["logo-retracte"] ) && !empty( $bondy_options["logo-retracte"] ) )? $bondy_options["logo-retracte"] : get_template_directory_uri()."/assets/images/logo-bondy-hz-140.png";
                    ?>
                    <img class="logotype1" src="<?php echo $zLogoHeader; ?>" alt="<?php echo bloginfo(); ?>" >
                    <img class="logotype2" src="<?php echo $zLogoHeader1; ?>" alt="<?php echo bloginfo(); ?>" >
                </a>
                <span class="fxFlex"></span>
                <!-- main menu -->
                <div class="main-menu">
                    <button class="burger-menu navbar-toggler d-lg-none" type="button" >
                        <span class="navbar-toggler-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                    <div class="innerWrap-menu content-menu">
                        <div class="menu-header">
                            <p class="titreMenu">Menu</p>
                            <span class="fxFlex"></span>
                            <button class="close" type="button"><i class="icobnd-close"></i></button>
                        </div>
                        <nav class="menu-list">
                            <?php
                                wp_nav_menu(
                                    array(
                                    'theme_location' => 'MenuHeader',
                                    'menu_class'     => 'navbar-nav',
                                    'container'      => '',
                                    'link_before'    => '',
                                    'link_after'     => "",
                                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'walker'         => new CustomWalkerNavMenuHeader()
                                    )
                                );
                            ?>
                        </nav>
                    </div>
                </div>
                <!-- /main menu -->

                <!-- Favoris count -->
                <?php
                if ( in_array('favorites/favorites.php', apply_filters('active_plugins', get_option('active_plugins') ) ) ) {
                    $countFavorites = get_user_favorites_count(); ?>
                    <a href="JavaScript:;" class="favoris-link" id="a-nb-count-favori">
                        <i class="icobnd-star-outline"></i>
                        <span class="badge" id="nb-count-favori"><?php echo $countFavorites; ?></span>
                    </a>
                    <?php
                } ?>
                <!-- /Favoris count -->
            </div>
        </article>
        <!-- /top bar -->

        <?php get_template_part('template-part/header/side-favoris-list.tpl'); ?>
    </header>


    <!-- main content here -->
    <div id="main">