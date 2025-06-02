<?php
/**
 * Template Name: Accueil
 *
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

get_header();
global $post;
$urlApropos = Cmenu::get_menu("UrlApropos");
$oPage = CPage::getById($post->ID);
$pageProjet = wp_get_post_by_template('page-projets-bondy.php');
?>

    <article id="fullpage" class="<?php if( is_front_page() ) { echo "home-section-wrapper"; } ?>">
        <?php
        if($oPage->image_de_bienvenue_id > 0) { ?>
            <!-- Bloc Bienvenue -->
            <div class="pre-home section section-prehome">
                <p class="big-txt"><?php echo wordwrap($oPage->texte_de_bienvenue, 10, "<br />\n") ;?></p>
                <?php
                list($img_bienvenue_mobile)  = wp_get_attachment_image_src($oPage->image_de_bienvenue_id, HOME_WELCOME_MOBILE);
                list($img_bienvenue_tablet)  = wp_get_attachment_image_src($oPage->image_de_bienvenue_id, HOME_WELCOME_TABLET);
                list($img_bienvenue_desktop) = wp_get_attachment_image_src($oPage->image_de_bienvenue_id, HOME_WELCOME_DESKTOP);
                ?>
                <!-- <figure class="ieobjectfit mask-container">
                    <img src="<?php echo $img_bienvenue_desktop; ?>"
                            srcset="
                        <?php echo $img_bienvenue_mobile; ?> 320w,
                        <?php echo $img_bienvenue_tablet; ?> 1024w,
                        <?php echo $img_bienvenue_desktop; ?> 1920w"
                            sizes="100vw"
                            alt="paysage verte" id="clipped-image">
                </figure>
                <figure class="ieobjectfit">
                    <img src="<?php echo $img_bienvenue_desktop; ?>"
                            srcset="
                        <?php echo $img_bienvenue_mobile; ?> 320w,
                        <?php echo $img_bienvenue_tablet; ?> 1024w,
                        <?php echo $img_bienvenue_desktop; ?> 1920w"
                            sizes="100vw"
                            alt="paysage verte">
                </figure> -->

                <svg id="demo" xmlns="http://www.w3.org/2000/svg" x="0" y="0" width="1600" height="900" viewBox="0 0 1600 900">
                    <defs>
                        <radialGradient id="maskGradient">
                            <stop offset="75%" stop-color="#fff"/>
                            <stop offset="100%" stop-color="#000"/>
                        </radialGradient>
                        <mask id="theMask">
                            <circle id="masker" r="250" fill="url(#maskGradient)" cx="800" cy="450" />
                        </mask>
                    </defs> 
                    <image id="lines" xlink:href="<?php echo $oPage->image_de_bienvenue_gris; ?>" x="0" y="0" width="1600" height="900" class="uncolored"/>
                    <g id="maskReveal" mask="url(#theMask)" > 
                        <image id="regular" xlink:href="<?php echo $img_bienvenue_desktop; ?>" x="0" y="0" width="1600" height="900" class="colored"/>
                    </g>
                    <circle id="ring" r="20" fill="none" stroke="#ffffff" stroke-width="2" cx="800" cy="450" />
                    <circle id="dot" r="4" fill="#ffffff" cx="800" cy="450" />
                </svg>

                <p class="scroll-wrap">
                    <label>Bringing green back</label><br>
                    <a href="#content" title="scroll" class="scrolling-down">
                        <i class="icobnd-scroll"></i>
                        <span class="scroll-txt">scroll</span>
                    </a>
                </p>
            </div>
            <!-- /Bloc Bienvenue -->
            <?php
        } ?>

        <div class="section section-home">
            <div class="content-home">
                <h1 class="d-none">BÔNDY | Transformons l'île rouge, en île verte</h1>
                <!-- Projet bôndy bloc -->
                <article class="projetBondy-bloc bloc-item">
                    <div class="container">
                        <?php
                        if ($oPage->count_projets_mise_en_avant > 0) {
                            echo $oPage->titre_home_projet_bondy; ?>
                            <div class="sous-titre-content">
                                <h3 class="sous-titre-bloc"><?php echo $oPage->sous_titre_home_projet_bondy; ?></h3>
                                <span class="fxFlex"></span>
                                <a href="<?php echo get_permalink($pageProjet->ID);?>" class="btn btn-primary btn-sm btn-outline btn-voirProjets d-none d-md-inline-flex" title="Voir tous les projets"><span>Voir tous les projets</span></a>
                                <p class="btn-slider"></p>
                                <div class="custom-slider-nav owl-nav" id="nav-slider-projet"></div>
                            </div>
                            <!-- liste des projets :: slider -->
                            <section class="projet-list">
                                <div class="project-slider bloc-slider slider-type-1 owl-carousel">
                                    <!-- item projet -->
                                    <?php
                                    set_query_var( 'projets_mise_en_avant', $oPage->projets_mise_en_avant );
                                    get_template_part('template-part/projet-bondy.tpl');
                                    ?>
                                    <!-- /item projet -->
                                </div>
                                <div class="nav-bottom">
                                    <div class="custom-slider-dots owl-dots" id="dots-slider-projet"></div>
                                    <span class="fxFlex"></span>
                                    <a href="" class="btn btn-primary btn-outline btn-voirProjets d-md-none text-nowrap"><span>Tous les projets</span></a>
                                </div>
                            </section>
                            <!-- /liste des projets -->
                            <?php
                        } ?>
                        <!-- Newsletter bloc -->
                        <?php get_template_part('template-part/section-abonnement.tpl'); ?>
                        <!-- /Newsletter bloc -->
                    </div>
                </article>
                <!-- /Projet bôndy bloc -->

                <!-- planter des arbres ? -->
                <?php
                if ($oPage->count_rubriques>0) { ?>
                    <article class="savezVous-bloc bloc-item">
                        <div class="falling-leaves"></div>
                        <!-- <span class="deco-leaf-4 d-none d-lg-inline-block"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/leaf-4.png"></span> -->
                        <div class="container">
                            <?php echo $oPage->titre_svp; ?>
                            <div class="sous-titre-content">
                                <h3 class="sous-titre-bloc"><?php echo $oPage->sous_titre_svp; ?></h3>
                            </div>
                            <div class="intros-text">
                                <p><?php echo $oPage->desc_svp; ?></p>
                            </div>

                            <div class="savezVous-content">
                                <div class="accordion-bloc" id="accordion-savezVous" role="tablist" aria-multiselectable="true">
                                    <?php
                                    if($oPage->rubriques != null){
                                        foreach ($oPage->rubriques as $k=>$rubrique) {
                                            $aria_expanded = ($k==0) ? 'true' : 'false';
                                            $hs_class      = ($k==0) ? 'show' : ''; ?>
                                            <div class="accordion-item">
                                                <div class="accordion-head">
                                                    <a href="javascript:;" data-target="#accordion-content-<?php echo $k+1; ?>" class="toggle-link" id="accordion-link-1" data-toggle="collapse" data-parent="#accordion-savezVous" role="button" aria-expanded="<?php echo $aria_expanded; ?>" aria-controls="accordion-content-<?php echo $k+1; ?>" data-link="<?php echo strtolower($rubrique[FIELD_PAGE_ACCUEIL_TITRE_RUBRIQUES]) ; ?>-iconsList">
                                                        <p class="icon"><i class="<?php echo $rubrique[FIELD_PAGE_ACCUEIL_ICON_RUBRIQUES]; ?>"></i></p>
                                                        <div class="desc-group">
                                                            <h4 class="titre-item"><span><?php echo $rubrique[FIELD_PAGE_ACCUEIL_TITRE_RUBRIQUES]; ?></span></h4>
                                                            <p class="description-txt"><?php echo $rubrique[FIELD_PAGE_ACCUEIL_DESC_RUBRIQUES]; ?></p>
                                                            <p class="wrap-btn d-none d-lg-block"><span class="btn btn-primary btn-md btn-outline btn-decouvrir" href="#" title="Découvrir"><span>Découvrir</span></span></p>
                                                        </div>
                                                        <span class="circle-toggle">
                                            <span class="horizontal"></span>
                                            <span class="vertical"></span>
                                            </span>
                                                    </a>
                                                </div>
                                                <div class="accordion-content collapse <?php echo $hs_class; ?>" id="accordion-content-<?php echo $k+1; ?>" role="tabpanel" aria-labelledby="accordion-link-<?php echo $k+1; ?>" data-parent="#accordion-savezVous">
                                                    <ul class="list">
                                                        <?php
                                                        if($rubrique[FIELD_PAGE_ACCUEIL_MOTS_CLES_RUBRIQUES] != null){
                                                            foreach ($rubrique[FIELD_PAGE_ACCUEIL_MOTS_CLES_RUBRIQUES] as $mot_cle) { ?>
                                                                <li><?php echo $mot_cle[FIELD_PAGE_ACCUEIL_TEXT_MOTS_CLES_RUBRIQUES]; ?></li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="treeShow-bloc d-none d-lg-flex">
                                    <nav class="fruitLayer-bloc">
                                        <figure class="bigTree">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/orangier-1920.png"
                                                srcset="
                                        <?php echo get_template_directory_uri(); ?>/assets/images/orangier-1024.png 10240w,
                                        <?php echo get_template_directory_uri(); ?>/assets/images/orangier-1920.png 1920w"
                                                sizes="100vw"
                                                alt="orangier">
                                        </figure>
                                        <?php
                                        if($oPage->rubriques != null){
                                            foreach ($oPage->rubriques as $nav_k=>$nav_rubrique) {
                                                $hs_class = ($nav_k==0) ? 'show' : ''; ?>
                                                <ul class="fl-item environnemental-item <?php echo $hs_class; ?>" id="<?php echo strtolower($nav_rubrique[FIELD_PAGE_ACCUEIL_TITRE_RUBRIQUES]) ; ?>-iconsList">
                                                    <?php
                                                    if($nav_rubrique[FIELD_PAGE_ACCUEIL_MOTS_CLES_RUBRIQUES] != null){
                                                        foreach ($nav_rubrique[FIELD_PAGE_ACCUEIL_MOTS_CLES_RUBRIQUES] as $nav_mot_cle) { ?>
                                                            <li class="<?php echo $nav_mot_cle[FIELD_PAGE_ACCUEIL_ICON_MOTS_CLES_RUBRIQUES]; ?>" tabindex="0" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $nav_mot_cle[FIELD_PAGE_ACCUEIL_TEXT_MOTS_CLES_RUBRIQUES]; ?>">
                                                                <i class="icobnd-<?php echo $nav_mot_cle[FIELD_PAGE_ACCUEIL_ICON_MOTS_CLES_RUBRIQUES]; ?>"></i><span><?php echo $nav_mot_cle[FIELD_PAGE_ACCUEIL_TEXT_MOTS_CLES_RUBRIQUES]; ?></span>
                                                            </li>
                                                            <?php
                                                        }
                                                    }?>
                                                </ul>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php
                } ?>
                <!-- /planter des arbres ? -->

                <?php
                if ($oPage->is_engager) { ?>
                    <!-- solution RSE -->
                    <article class="solutionRSE-bloc bloc-item">
                        <?php
                        list($img_banniere_engager_mobile)  = wp_get_attachment_image_src($oPage->banniere_engager_id, HOME_WELCOME_MOBILE);
                        list($img_banniere_engager_tablet)  = wp_get_attachment_image_src($oPage->banniere_engager_id, HOME_WELCOME_TABLET);
                        list($img_banniere_engager_desktop) = wp_get_attachment_image_src($oPage->banniere_engager_id, HOME_WELCOME_DESKTOP);
                        ?>
                        <figure class="photo-bg ieobjectfit">
                            <img src="<?php echo $img_banniere_engager_desktop; ?>"
                                srcset="
                                <?php echo $img_banniere_engager_mobile; ?> 320w,
                                <?php echo $img_banniere_engager_tablet; ?> 1024w,
                                <?php echo $img_banniere_engager_desktop; ?> 1920w"
                                sizes="100vw"
                                alt="planter l'arbre">
                        </figure>
                        <div class="container">
                            <h2 class="titre-bloc"><span><?php echo $oPage->titre_engager; ?></span></h2>
                            <div class="sous-titre-content">
                                <h3 class="sous-titre-bloc"><?php echo $oPage->sous_titre_engager; ?></h3>
                            </div>
                            <?php
                                if($oPage->bouton_lien_engager != null){ ?>
                                    <p class="wrap-btn">
                                        <a class="btn btn btn-primary btn-lg" href="<?php echo $oPage->bouton_lien_engager; ?>" title="<?php echo $oPage->bouton_text_engager; ?>"><span><?php echo $oPage->bouton_text_engager; ?></span></a></p>
                                <?php
                                }
                            ?>

                        </div>
                    </article>
                    <!-- solution RSE -->
                    <?php
                } ?>

                <!-- bloc en parle -->
                <article class="enParle-bloc bloc-item">
                    <div class="container">
                        <div class="row custom-row">
                            <div class="col-lg-6">
                                <!-- membre liste slider -->
                                <?php
                                set_query_var( 'objectPage', $oPage );
                                get_template_part('template-part/ils_parle_de_nous.tpl');
                                ?>
                                <!-- /membre liste slider -->
                            </div>
                            <!-- section actualité  -->
                            <div class="col-lg-6">
                                <?php
                                set_query_var( 'objectPage', $oPage );
                                get_template_part('template-part/actualite/section-list-actualite.tpl');
                                ?>
                            </div>
                            <!-- end section actualité -->
                        </div>
                    </div>

                </article>
                <!-- bloc en parle -->

                <!-- bloc mise en valeur  -->
                <article class="misEnvaleur-bloc bloc-item">
                    <div class="container">
                        <?php if($oPage->mettre_en_valeur_mes_terrains) ?>
                        <figure class="photo-bg ieobjectfit">
                            <?php
                            list($img_mettre_en_valeur_mobile)  = wp_get_attachment_image_src($oPage->image_mettre_en_valeur, HOME_WELCOME_MOBILE);
                            list($img_mettre_en_valeur_tablet)  = wp_get_attachment_image_src($oPage->image_mettre_en_valeur, HOME_WELCOME_TABLET);
                            list($img_mettre_en_valeur_desktop) = wp_get_attachment_image_src($oPage->image_mettre_en_valeur, HOME_WELCOME_DESKTOP);
                            $img_mettre_en_valeur_mobile = ( !empty( $img_mettre_en_valeur_mobile ) ) ? $img_mettre_en_valeur_mobile : get_template_directory_uri() . '/images/default.jpg';
                            $img_mettre_en_valeur_tablet = ( !empty( $img_mettre_en_valeur_tablet ) ) ? $img_mettre_en_valeur_tablet : get_template_directory_uri() . '/images/default.jpg';
                            $img_mettre_en_valeur_desktop = ( !empty( $img_mettre_en_valeur_desktop ) ) ? $img_mettre_en_valeur_desktop : get_template_directory_uri() . '/images/default.jpg';
                            ?>
                            <img src="<?php echo $img_mettre_en_valeur_desktop ?>"
                                srcset="
                    <?php echo $img_mettre_en_valeur_mobile; ?> 320w,
                    <?php echo $img_mettre_en_valeur_tablet; ?> 1024w,
                    <?php echo $img_mettre_en_valeur_desktop; ?> 1920w"
                                sizes="100vw"
                                alt="">
                        </figure>
                        <div class="content-txt">
                            <h2 class="titre-bloc"><span><?php echo $oPage->mettre_en_valeur_mes_terrains ?></span></h2>
                            <h3 class="sous-titre-bloc"><?php echo $oPage->description_mettre_en_valeur ?></h3>
                            <p class="wrap-btn"><a class="btn btn btn-primary btn-lg btn-red btn-savoirPlus" href="<?php echo$oPage->en_savoir_plus['url']  ?>" title="En savoir plus maintenant"><span><?php echo$oPage->en_savoir_plus['title']  ?></span></a></p>
                        </div>

                    </div>
                </article>
                <!-- /bloc mise en valeur  -->

                <!-- bloc teams -->
                <article class="team-bloc bloc-item">
                    <div class="container">
                        <?php echo $oPage->nous_sommes_pret_sous_titre; ?>
                        <section class="team-list slider-wrapper">
                            <div class="team-slider bloc-slider slider-type-1 owl-carousel" id="team-slider">
                                <!-- team items -->
                                <?php
                                set_query_var( 'relation_equipe_id', $oPage->relation_equipe_id );
                                get_template_part('template-part/section-equipe.tpl');
                                ?>
                            </div>
                            <div class="nav-bottom">
                                <div class="custom-slider-dots owl-dots text-center" id="dots-slider-team"></div>
                            </div>
                        </section>
                    </div>
                </article>
                <!-- /bloc teams -->
                <!--Footer-->
                <?php
                    get_template_part('template-part/footer/footer.tpl');
                ?>
            </div>
        </div>
    </article><!-- #primary -->

    <?php get_template_part('template-part/footer/modal-popin.tpl'); ?>
</div>

</div><!-- #page -->

<?php wp_footer(); ?>
    <!-- btn srollTop -->
    <button type="button" class="scrolltop"><i class="icobnd-arrow-up-rounded"></i></button>
    <!-- /btn srollTop -->
</body>
</html>
