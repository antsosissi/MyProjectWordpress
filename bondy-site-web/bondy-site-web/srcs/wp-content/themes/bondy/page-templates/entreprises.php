<?php
/**
 * Template Name: entreprises
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */
global $post;
$oPage = CEntreprise::getById($post->ID);


get_header(); ?>
<article class="entreprise-page">
    <?php

        include get_template_directory() . '/template-part/banniere-page.php';
        set_query_var( 'var', $oPage );
        get_template_part('template-part/fil_ariane.tpl');

        include get_template_directory() . '/template-part/titre-page.php';

    ?>
    <!-- mini world bloc -->
    <?php
        set_query_var( 'dataArray', $oPage->presentation_graphique );
        get_template_part('template-part/entreprise/section-rse');
        //include get_template_directory() . '/template-part/entreprise/section-rse.php';

    ?>

    <!-- main entreprises -->
    <?php
        set_query_var( 'dataArray', $oPage->contenu_de_lentreprise );
        get_template_part('template-part/entreprise/section-empreinte-ecologique');

    ?>
    <!-- main entreprises -->

    <!-- blocs connexes -->
    <div class="bloc-item  half-partenaire-slider">
        <div class="container">
            <div class="row custom-row">
                <div class="col-lg-6">
                    <!-- section nos partenaires template-part  -->
                    <?php
                    set_query_var( 'objectPage', $oPage );
                    get_template_part('template-part/section-partenaires.tpl');
                    ?>
                    <!-- section /nos partenaires template-part  -->
                </div>
                <div class="col-lg-6">
                    <!-- temoignage template-part -->
                    <section class="temoignage-bloc">
                        <?php
                            if($oPage->ils_parlent_de_nous_titre == null){ ?>
                                <h2 class="titre-bloc">Ils parlent <span>de nous</span></h2>
                        <?php } else {
                                echo $oPage->ils_parlent_de_nous_titre;
                        } ?>

                        <div class="temoignage-list slider-wrapper">
                            <div class="sous-titre-content">
                                <div class="intros-text">
                                    <p><?php echo $oPage->ils_parlent_de_nous_description; ?></p>
                                </div>
                                <span class="fxFlex"></span>
                                <!-- Boutons de navigations [dots pour mobile/tablette/ desktop] -->
                                <div class="custom-slider-nav owl-nav mobile-nav d-desktop-none" id="nav-slider-mobile-temoignage"></div>
                                <div class="custom-slider-nav owl-nav desktop-nav d-desktop-flex" id="nav-slider-desktop-temoignage"></div>
                                <!-- /Boutons de navigations [dots pour mobile/tablette/ desktop] -->
                            </div>
                            <!-- slider mobile et tablette -->
                            <div class="temoignage-slider bloc-slider slider-type-1 owl-carousel d-desktop-none" id="slider-mobile-temoignage">
                                <!-- item membre -->
                                <?php 
                                $relation_temoignage_id = $oPage->relation_temoignage_id;
                                if($relation_temoignage_id == null){
                                    $relation_temoignage_id = array();
                                    $temoignages = CTemoignage::getBy();
                                    foreach ($temoignages as $list){
                                        array_push($relation_temoignage_id,$list->id);
                                    }
                                }
                                set_query_var( 'relation_temoignage_id', $relation_temoignage_id );
                                get_template_part('template-part/section-temoignage-mobil.tpl');
                                ?>  
                        
                            </div>
                             <!-- slider desktop -->
                            <div class="temoignage-slider bloc-slider slider-type-1 owl-carousel d-none d-desktop-block" id="slider-desktop-temoignage">
                                <!-- item membre -->
                                <?php 
                                set_query_var( 'relation_temoignage_id', $relation_temoignage_id );
                                get_template_part('template-part/section-temoignage.tpl');
                                ?>
                                <!-- /item membre -->
                            </div>
                            <!-- /slider desktop -->

                            <!-- Billets de navigations [dots pour mobile/tablette/ desktop] -->
                            <div class="nav-bottom">
                                <div class="custom-slider-dots owl-dots text-center d-desktop-none" id="dots-slider-mobile-temoignage"></div>
                                <div class="custom-slider-dots owl-dots text-center d-desktop-block" id="dots-slider-desktop-temoignage"></div>
                            </div>
                            <!-- /Billets de navigations [dots pour mobile/tablette/ desktop] -->
                        </div>
                    </section>
                    <!-- /temoignage template-part -->
                </div>

                <!-- end nos partenaires -->
            </div>
        </div>
    </div>
    <!-- /blocs connexes -->
</article>
<?php
get_footer();
