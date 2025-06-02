<?php
/**
 * Template Name: Page particulier
 *
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */
global $post;
$oPage = CParticulier::getById($post->ID);

get_header(); ?>

  <div class="particulier-bloc bloc-item full-temoignage-slider ">
    <!-- banniere -->
    <?php include get_template_directory() . '/template-part/banniere-page.php'; ?>
    <!-- fin baniere -->

    <!-- fil d ariane -->
   <?php
    set_query_var( 'var', $oPage );
    get_template_part('template-part/fil_ariane.tpl');
    ?>
    <!-- fin fil d ariane -->

    <!-- mettre en valeur mes terrain -->


    <!-- introduction de la page -->
    <?php include get_template_directory() . '/template-part/titre-page.php'; ?>
    <!-- fin introduction de la page -->

    <!-- liste valeur terrain -->
    <section class="liste-valeur-terrain">
        <div class="container">
            <ul>
                <li>
                    <i class="icon-svgcolor <?php echo $oPage->icones['bondy_icone_picto_1']; ?>">
                        <img src="<?php echo get_home_url()."/wp-content/themes/bondy/src/images/svg/color-icons/".$oPage->icones['bondy_icone_picto_1'].".svg";?>" alt="">
                    </i>
                    <p><?php if ($oPage->icones['description_icone_1']) {echo $oPage->icones['description_icone_1'];} ?></p>
                </li>
                <li class="arrow"><i class="icobnd-arrow-dotted"></i></li>
                <li>
                    <i class="icon-svgcolor <?php echo $oPage->icones['bondy_icone_picto_2']; ?>">
                        <img src="<?php echo get_home_url()."/wp-content/themes/bondy/src/images/svg/color-icons/".$oPage->icones['bondy_icone_picto_2'].".svg";?>" alt="">
                    </i>
                    <p><?php if ($oPage->icones['description_icone_2']) {echo $oPage->icones['description_icone_2'];} ?></p>
                </li>
                <li class="arrow"><i class="icobnd-arrow-dotted-2"></i></li>
                <li>
                    <i class="icon-svgcolor <?php echo $oPage->icones['bondy_icone_picto_3']; ?>">
                        <img src="<?php echo get_home_url()."/wp-content/themes/bondy/src/images/svg/color-icons/".$oPage->icones['bondy_icone_picto_3'].".svg";?>" alt="">
                    </i>
                    <p><?php if ($oPage->icones['description_icone_4']) {echo $oPage->icones['description_icone_3'];} ?></p></li>
                <li class="arrow"><i class="icobnd-arrow-dotted"></i></li>
                <li>
                    <i class="icon-svgcolor <?php echo $oPage->icones['bondy_icone_picto_4']; ?>">
                        <img src="<?php echo get_home_url()."/wp-content/themes/bondy/src/images/svg/color-icons/".$oPage->icones['bondy_icone_picto_4'].".svg";?>" alt="">
                    </i>
                    <p><?php if ($oPage->icones['description_icone_4']) {echo $oPage->icones['description_icone_4'];} ?></p></li>
            </ul>
        </div>
    </section>

    <!-- solutions adaptés -->
    <section class="solution-adapte">
        <div class="container">
                <div class="rich-text">
                    <h3><?php echo $oPage->titre_solutions_adaptees; ?></h3>
                </div>
                <div class="tabs-accordion navTabsAccordion-bloc">
                    <nav class="nav-tabs">
                        <ul id="tabsParticulier" class="tabsParticulier nav nav-tabs" role="tablist">
                            <?php 
                            if ($oPage->contenu_particulier){
                                $compteur=0;
                                foreach ($oPage->contenu_particulier as $item) {
                                    if ($item['contenu']=='Oui'){
                                            $setActive=$compteur==0?'active':'';
                                        ?>
                                                <li class="nav-item <?php  echo $setActive;  ?>">
                                                    <a href="#tabForm-particulier-<?php echo $compteur;?>" class="nav-link <?php  echo $setActive;  ?> collapsed" data-toggle="tab" role="tab" aria-controls="tabForm-particulier-<?php echo $compteur;?>" aria-selected="true">
                                                        <i class="icobnd-<?php echo $item['icon_representatif']; ?>"></i>
                                                        <span><?php echo $item['titre'];?></span>
                                                        <button class="btn btn-default btn-md">En savoir plus</button>
                                                        <span class="angle">
                                                            <i class="icobnd-chevron-down"></i>
                                                            <i class="icobnd-angle-down"></i>
                                                        </span>
                                                        <span class="circle-toggle">
                                                            <span class="horizontal"></span>
                                                            <span class="vertical"></span>  
                                                        </span>
                                                    </a>
                                                </li>
                                    <?php 
                                    $compteur=$compteur+1;
                                    }  
                                    else{?>
                                        <li class="nav-item">
                                            <a href="<?php echo $item['lien_du_bouton']; ?>" class="nav-link">
                                                <i class="icobnd-<?php echo $item['icon_representatif']; ?>"></i>
                                                <span><?php echo $item['titre'];?></span>
                                                <button class="btn btn-default btn-md"><?php echo $item['titre_du_bouton']; ?></button>
                                            </a>
                                        </li>
                                    <?php
                                    }   
                                }?>
                        </ul>
                    </nav> 
                    <div id="tab-content-particulier" class="tab-content tab-content-particulier" role="tablist">
                        <?php
                        $compteur=0;
                        foreach ($oPage->contenu_particulier as $item) {
                            // if ($item['contenu']=='Oui'){
                                if ($item['block_contenu']){
                                    $data= new stdClass();
                                    $data->contenu=$item['block_contenu'];
                                    $data->icone=$item['icon_representatif'];
                                    $data->titre=$item['titre'];
                                    $data->contenuoui=$item['contenu'];
                                    $data->compteur=$compteur;
                                    set_query_var( 'objectPage', $data);
                                    get_template_part('/template-part/particulier/affiche-contenu.tpl');
                                    if($item['contenu'] == 'Oui')
                                        $compteur++;
                                } else { ?>
                                    <div class="tab-pane fade">
                                        <div class="card-header" role="tab">
                                            <h5 class="card-title">
                                                <a class="card-title-link" href="<?php echo $item['lien_du_bouton']; ?>">
                                                <i class="icobnd-<?php echo $item['icon_representatif']; ?>"></i>
                                                <span><?php echo $item['titre'];?></span>
                                                    
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                <?php }
                            // }
                        }
                        ?>
                    </div>
                    <?php  }?>
        
        <hr class="d-lg-none d-block">
        
        <!-- fin solutions adaptés -->

        <!-- temoignage -->
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
        <!-- fin temoignage -->
        </div>
    </section>
</div>

<?php get_footer(); ?>