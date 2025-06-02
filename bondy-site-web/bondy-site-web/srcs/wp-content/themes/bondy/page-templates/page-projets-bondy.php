<?php
/**
 * Template Name: projets
 * Created by PhpStorm.
 * Date: 19/05/2020
 * Time: 14:35
 */
get_header();
global $post;
$oPage = CPage::getById($post->ID);
?>
    <?php include get_template_directory() . '/template-part/banniere-page.php'; ?>
    <!-- breadcrumb -->
    <!-- fil d ariane -->
    <?php
    set_query_var( 'var', $oPage );
    get_template_part('template-part/fil_ariane.tpl');
    ?>
    <?php include get_template_directory() . '/template-part/titre-page.php'; ?>

    <?php
    set_query_var( 'objectPage', $oPage );
    get_template_part('template-part/projets/section-list-projets.tpl');
    ?>
    <!-- end liste projets -->

    <!-- section especes d'arbres template-part  -->
    <?php
    set_query_var( 'objectPage', $oPage );
    get_template_part('template-part/projets/section-especes-arbres.tpl');
    ?>
    <!-- end especes d'arbres -->

    <!-- section contexte projets template-part  -->
    <?php
    set_query_var( 'objectPage', $oPage );
    get_template_part('template-part/projets/section-contexte-projets.tpl');
    ?>
    <!-- end contexte projets -->
    <div class="bloc-item  half-partenaire-slider">
        <div class="container">
            <div class="row">
                <!-- section nos partenaires template-part  -->
                <div class="col-lg-6">
                    <?php
                    set_query_var( 'objectPage', $oPage );
                    get_template_part('template-part/section-partenaires.tpl');
                    ?>
                </div>
                
                <!-- end nos partenaires -->

                <!-- section nos partenaires template-part  -->
                <div class="col-lg-6">
                    <?php
                    set_query_var( 'objectPage', $oPage );
                    get_template_part('template-part/actualite/section-list-actualite.tpl');
                    ?>
                </div>
                
                <!-- end nos partenaires -->
            </div>
        </div>
    </div>
    
    
    

    <?php
    get_footer();