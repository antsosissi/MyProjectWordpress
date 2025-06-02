<?php
/**
 * Template Name: Actualités
 * Created by PhpStorm.
 * Date: 19/05/2020
 * Time: 14:35
 */
get_header();
global $post;
//$data_especes_arbre = CEspeceArbre::getBy($post->ID);
//mp($data_especes_arbre);
$oPage = CPage::getById($post->ID);

$data = CActualite::getBy();
//$datas = CActualite::bondy_get_actualiter_vedette();
?>

<div class="actualite-bloc">
    <!-- banniere -->
    <?php include get_template_directory() . '/template-part/banniere-page.php'; ?>
    <!-- fin baniere -->

    <!-- fil d ariane -->
    <?php
    set_query_var( 'var', $oPage );
    get_template_part('template-part/fil_ariane.tpl');
    ?>
    <!-- fin fil d ariane -->
    
    <div class="bg-white">
        <!-- introduction de la page -->
        <?php include get_template_directory() . '/template-part/titre-page.php'; ?>
        <!-- fin introduction de la page -->

        <!-- section list actualite -->     
        <div class="bloc-item full-temoignage-slider ">
            <div class="container">
                <div class="actus-bloc">
                    <?php
                    set_query_var( 'objectPage', $oPage);
                    get_template_part('/template-part/actualite/section-liste-actualite-pagination.tpl');
                    ?>
                </div>
            </div>
        </div>
        <!-- fin section liste actualite -->
    </div>
    
    <!-- template abonnement-->
    <?php get_template_part('template-part/section-abonnement.tpl'); ?>
    <!-- fin template abonnement-->

    <div class="enParle-bloc bloc-item full-temoignage-slider">
        <div class="container">
                <!-- ils parles de nous-->
                <?php
                set_query_var( 'objectPage', $oPage );
                get_template_part('template-part/ils_parle_de_nous.tpl');
                ?>
                <!-- fin ils parles de nous-->
        </div>
    </div>
</div>

<?php
get_footer();