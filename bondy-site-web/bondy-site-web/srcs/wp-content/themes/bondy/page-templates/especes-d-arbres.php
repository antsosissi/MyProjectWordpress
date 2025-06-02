<?php
/**
 * Template Name: Espèces d'arbres
 * Created by PhpStorm.
 * Date: 19/05/2020
 * Time: 14:35
 */
get_header();
global $post;
$data_especes_arbre = CEspeceArbre::getBy($post->ID);
//mp($data_especes_arbre);
$oPage = CPage::getById($post->ID);
?>
    <div class="especes-arbres-bloc enParle-bloc bloc-item  full-temoignage-slider">
        <div class="bg-white">
            <?php include get_template_directory() . '/template-part/banniere-page.php'; ?>
            <!-- breadcrumb -->
            <!-- fil d ariane -->
            <?php
            set_query_var( 'var', $oPage );
            get_template_part('template-part/fil_ariane.tpl');
            ?>
            <?php include get_template_directory() . '/template-part/titre-page.php'; ?>
            <div class="container">
                <div class="liste-especes-arbre especeArbre-bloc bloc-item">
                    <?php
                    set_query_var( 'objectPage', $data_especes_arbre);
                    get_template_part('/template-part/especes-arbres/section-liste-especes-arbres-pagination.tpl');
                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- template abonnement-->
            <?php get_template_part('template-part/section-abonnement.tpl'); ?>
            <div class="enParle-bloc full-temoignage-slider">
                <!-- ils parles de nous-->
                <?php
                set_query_var( 'objectPage', $oPage );
                get_template_part('template-part/ils_parle_de_nous.tpl');
                ?>
            </div>
            
        </div>
    </div>
        
<?php
get_footer();