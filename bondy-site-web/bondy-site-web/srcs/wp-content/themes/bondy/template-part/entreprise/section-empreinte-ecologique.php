<?php
/**
 * Created by PhpStorm.
 * User: Fanomezana
 * Date: 19/06/2020
 * Time: 09:13
 */
$oEntreprise = get_query_var( 'dataArray' );
$pageContact = wp_get_post_by_template( 'contact.php' );
if($oEntreprise != null){
?>
<!-- main entreprises -->
<section class="allEntreprise-bloc navTabsAccordion-bloc">
    <div class="container">
        <div class="allEntreprise-content">
            <nav class="nav-tabs-list">
                <ul id="tabsEntreprise" class="nav nav-tabs tabsEntreprise" role="tablist">
                    <?php
                    if($oEntreprise != null){
                        $tempIteration = 1;
                        foreach ($oEntreprise as $list){
                            ?>
                            <li class="nav-item <?php if($tempIteration == 1) echo "active"  ?>">
                                <a href="#tabContent-entreprise-<?php echo $tempIteration ?>" class="nav-link <?php if($tempIteration == 1) echo "active"  ?>" data-toggle="tab" role="tab" aria-controls="tabContent-entreprise-<?php echo $tempIteration ?>" aria-selected="<?php if($tempIteration == 1) echo "true" ; else echo "false"?>">
                                    <i class="icobnd-<?php echo $list['icon_representatif'] ?>"></i>
                                    <span class="txt"><?php echo $list['titre'] ?></span>
                                    <span class="btn btn-default btn-md">Découvrir nos projets</span>
                                    <span class="angle">
                                        <i class="icobnd-chevron-down"></i>
                                        <i class="icobnd-angle-down"></i>
                                    </span>
                                </a>
                            </li>
                            <?php
                            $tempIteration ++ ;
                        }
                    }
                    ?>
                </ul>
            </nav>
            <div id="tab-content-entreprise" class="tab-content tab-content-entreprise" role="tablist">
                <!-- pane entreprise 1 -->
                <?php
                if($oEntreprise != null){
                    $tempIteration = 1;
                    $active = "show in active";
                    $non_active = "fade";
                    foreach ($oEntreprise as $list){?>

                        <div class="tab-pane <?php  if ($tempIteration == 1) echo $active; else echo $non_active ?>" id="tabContent-entreprise-<?php echo $tempIteration ?>" aria-labelledby="tabLink-entreprise-<?php echo $tempIteration ?>" role="tabpane<?php echo $tempIteration ?>">
                            <div class="card-header" id="head-collapse-ent-<?php echo $tempIteration ?>" role="tab" >
                                <p class="card-title">
                                    <a class="card-title-link" data-toggle="collapse" href="#content-collapse-ent-<?php echo $tempIteration ?>" data-parent="#tab-content-entreprise" aria-expanded="false" aria-controls="content-collapse-ent-<?php echo $tempIteration ?>">
                                        <i class="icobnd-<?php echo $list['icon_representatif'] ?>"></i>
                                        <span class="txt"><?php echo $list['titre'] ?></span>
                                        <span class="circle-toggle">
                                <span class="horizontal"></span>
                                <span class="vertical"></span>
                            </span>
                                    </a>
                                </p>
                            </div>
                            <div id="content-collapse-ent-<?php echo $tempIteration ?>" class="card-body collapse false<?php if($tempIteration == 1) echo "true" ;?>" role="tabpanel" aria-labelledby="head-collapse-ent-<?php echo $tempIteration ?>"  data-parent="#tab-content-entreprise">

                                <div class="content-item">
                                    <h2><span><?php echo $list['titre'] ?></span></h2>
                                    <div class="chapo-txt">
                                        <?php echo $list['decription'] ?>
                                    </div>
                                    <div class="content-flex">
                                        <nav class="list-cleEntreprise">
                                            <ul>
                                                <?php
                                                if($list['pictogrammes'] != null){
                                                    foreach ($list['pictogrammes'] as $contenu){
                                                        ?>
                                                    <li>
                                                        <i class="icon-svgcolor <?php echo $contenu['picto'] ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/svg/<?php echo $contenu['picto'] ?>.svg" alt="<?php echo $contenu['titre'] ?>"></i>
                                                        <div class="desc-txt">
                                                            <h3><?php echo $contenu['titre'] ?></h3>
                                                            <?php echo $contenu['description'] ?>
                                                        </div>
                                                    </li>


                                                <?php }
                                                }?>

                                            </ul>
                                        </nav>

                                        <?php
                                        if($list['image'] != null){
                                            list($img_entreprise_mobile)  = wp_get_attachment_image_src($list['image'], HOME_WELCOME_MOBILE);
                                            list($img_entreprise_tablet)  = wp_get_attachment_image_src($list['image'], HOME_WELCOME_TABLET);
                                            list($img_entreprise_desktop) = wp_get_attachment_image_src($list['image'], HOME_WELCOME_DESKTOP);
                                            $img_entreprise_mobile = ( !empty($img_entreprise_mobile)) ? $img_entreprise_mobile : get_template_directory_uri() . '/images/default.jpg';
                                            $img_entreprise_tablet = ( !empty( $img_entreprise_tablet ) ) ? $img_entreprise_tablet : get_template_directory_uri() . '/images/default.jpg';
                                            $img_entreprise_desktop = ( !empty( $img_entreprise_desktop ) ) ? $img_entreprise_desktop : get_template_directory_uri() . '/images/default.jpg';
                                            ?>
                                            <figure class="d-none d-lg-flex photo">
                                                <img src="<?php echo $img_entreprise_desktop; ?>"
                                                     srcset="
                                                <?php echo $img_entreprise_mobile; ?> 320w,
                                                <?php echo $img_entreprise_tablet; ?> 1024w,
                                                <?php echo $img_entreprise_desktop; ?> 1920W"
                                                     alt="<?php echo $list['titre'] ?>" sizes="100vw">
                                            </figure>
                                        <?php
                                        }?>

                                    </div>
                                    <p class="wrap-btn"><a href="<?php echo add_query_arg('type',true, get_permalink($pageContact->ID)); ?>" class="btn btn-primary btn-md" title="Contactez-nous">Contactez-nous</a></p>



                                    <?php
                                        if($list['exemple_de_partenaies'] != null){ ?>
                                            <section class="example-partenariat-bloc">
                                                <h3>Exemples de partenariat</h3>
                                                <?php
                                            foreach ($list['exemple_de_partenaies'] as $ex_partenaire){
                                                $partenaire = CPartenaire::getById($ex_partenaire->ID);
                                                ?>
                                                <div class="partenariat-item">
                                                    <?php
                                                    list($img_partenaire_desktop) = wp_get_attachment_image_src($partenaire->logo_partenaire_id, HOME_PARTENAIRE_DESKTOP);
                                                    $img_partenaire_desktop = (!empty($img_partenaire_desktop)) ? $img_partenaire_desktop : get_template_directory_uri() . '/images/default.jpg';

                                                    ?>
                                                    <figure class="partenariat-logo"><a href="<?php echo $partenaire->lien_partenaire ?>">

                                                            <img src="<?php echo $img_partenaire_desktop; ?>"
                                                                 alt="<?php echo $partenaire->titre; ?>" alt="<?php echo $partenaire->titre; ?>">
                                                            <?php if ($partenaire != null){ ?> </a><?php } ?>
                                                    </figure>
                                                    <div class="partenariat-desc">
                                                        <p class="m-b-10"><label>Client :&nbsp;</label><span><?php echo $partenaire->titre; ?></span></p>
                                                        <?php
                                                        if($partenaire->concept != ""): ?>
                                                            <p class="m-b-10">

                                                                <label>Concept :&nbsp;</label>
                                                                <span><?php echo $partenaire->concept; ?></span>
                                                            </p>
                                                            <?php endif;?>
                                                            <?php
                                                            if($partenaire->description != ""): ?>
                                                                <div class="rich-text"><?php echo apply_filters('the_content', $partenaire->description); ?>
                                                                </div>
                                                            <?php endif;?>

                                                    </div>
                                                </div>
                                                </br>
                                                <?php
                                            } ?>
                                            </section>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        $tempIteration ++ ;
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- /main entreprises -->
<?php } ?>