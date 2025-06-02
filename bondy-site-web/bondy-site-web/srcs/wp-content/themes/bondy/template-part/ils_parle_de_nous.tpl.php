
<?php $oPage = get_query_var( 'objectPage' );?>

                <!-- membre liste slider -->
                <section class="temoignage-bloc">

                    <?php
                    if($oPage->ils_parlent_de_nous_titre == null){ ?>
                        <h2 class="titre-bloc">Ils parlent <br/><span>de nous</span></h2>
                    <?php } else {
                        echo $oPage->ils_parlent_de_nous_titre;
                    } ?>
                    <!-- liste membres :: slider -->
                    <div class="temoignage-list slider-wrapper">
                        <div class="sous-titre-content">
                            <div class="intros-text">
                                <p><?php echo $oPage->ils_parlent_de_nous_description; ?></p>
                            </div>
                            <span class="fxFlex"></span>
                            <!-- Boutons de navigations [dots pour mobile/tablette/ desktop] -->
                            <div class="custom-slider-nav owl-nav mobile-nav d-desktop-none" id="nav-slider-mobile-temoignage"></div>
                            <div class="custom-slider-nav owl-nav desktop-nav d-desktop-block" id="nav-slider-desktop-temoignage"></div>
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
                            <!-- /item membre -->
                        </div>
                            <!-- ils parlent de nous -->

                        <!--condition page d'accueil-->
                        <div class="temoignage-slider bloc-slider slider-type-1 owl-carousel d-none d-desktop-block" id="slider-desktop-temoignage">
                            <!-- item membre -->
                            <?php
                            set_query_var( 'relation_temoignage_id', $relation_temoignage_id );
                            get_template_part('template-part/section-temoignage.tpl');
                            ?>
                        </div>
                        <!-- Billets de navigations [dots pour mobile/tablette/ desktop] -->
                        <div class="nav-bottom">
                            <div class="custom-slider-dots owl-dots text-center d-desktop-none" id="dots-slider-mobile-temoignage"></div>
                            <div class="custom-slider-dots owl-dots text-center d-desktop-block" id="dots-slider-desktop-temoignage"></div>
                        </div>
                        <!-- /Billets de navigations [dots pour mobile/tablette/ desktop] -->
                        <!-- /liste membres -->
                    </div>
                </section>
                <!-- /membre liste slider -->
