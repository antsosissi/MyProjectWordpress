<?php
/**
 * Created by PhpStorm.
 * User: alitiana.harimalala
 * Date: 28/05/2020
 * Time: 09:03
 */
global $bondy_options;
$accesRapideMenu = Cmenu::get_menu("MenuFooterAccesRapide");
$nosServiceMenu  = Cmenu::get_menu("MenuFooterNosServices");
$urlApropos      = Cmenu::get_menu("UrlApropos");
?>
<footer id="colophon" role="contentinfo">

    <section class="footer-links">
        <div class="container">
            <div class="row" id="accordion-footer" role="tablist" aria-multiselectable="true">
                <div class="item-content col-lg-2">
                    <figure class="logo-footer">

                        <?php
                        $zLogoFooter = ( isset( $bondy_options["logo-footer"] ) && !empty( $bondy_options["logo-footer"] ) ) ? $bondy_options["logo-footer"] : get_template_directory_uri()."/assets/images/logo-bondy-hz-140.png";
                        $zLogoFooter1 = ( isset( $bondy_options["logo-footer1"] ) && !empty( $bondy_options["logo-footer1"] ) ) ? $bondy_options["logo-footer1"] : get_template_directory_uri()."/assets/images/logo-bondy-vh-210.png";
                        ?>
<img class="d-inline-block d-lg-none" src="<?php echo $zLogoFooter1; ?>" alt="<?php echo bloginfo(); ?>">
<img class="d-none d-lg-inline-block" src="<?php echo $zLogoFooter;; ?>" alt="<?php echo bloginfo(); ?>">
</figure>
</div>
<div class="item-content aPropos-bloc col-lg-3">
    <div class="footer-content">
        <?php
        if($bondy_options["texte-footer"]){ ?>
            <p><?php echo $bondy_options["texte-footer"]; ?></p>
            <?php
        }
        ?>
    </div>
</div>
<div class="col-lg-1 d-none d-1280-flex"></div>
<div class="item-content blocLink-item col-lg-2">
    <h2>
        <a href="javascript:;" data-target="#footer-link-01" class="" id="footer-head-01" data-toggle="collapse" data-parent="#accordion-footer" role="button" aria-expanded="true" aria-controls="footer-link-01">Accès rapide</a>
    </h2>
    <div class="footer-content collapse show" id="footer-link-01" role="tabpanel" aria-labelledby="footer-head-01" data-parent="#accordion-footer">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'MenuFooterAccesRapide',
                'menu_class'     => '',
                'container'      => '',
                'link_before'    => '',
                'link_after'     => "",
                'items_wrap'     => '<ul>%3$s</ul>',
                'walker'         => new CustomWalkerNavMenuFooter()
            )
        );
        ?>
    </div>
</div>
<div class="item-content blocLink-item col-lg-2">
    <h2><a href="javascript:;" data-target="#footer-link-02" class="" id="footer-head-02" data-toggle="collapse" data-parent="#accordion-footer" role="button" aria-expanded="false" aria-controls="footer-link-02">Nos services</a></h2>

    <div class="footer-content collapse" id="footer-link-02" role="tabpanel" aria-labelledby="footer-head-02" data-parent="#accordion-footer">

        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'MenuFooterNosServices',
                'menu_class'     => '',
                'container'      => '',
                'link_before'    => '',
                'link_after'     => "",
                'items_wrap'     => '<ul>%3$s</ul>',
                'walker'         => new CustomWalkerNavMenuFooter()
            )
        );
        ?>
    </div>

</div>
<div class="item-content col-lg-2">
    <h2>
        <a href="javascript:;" data-target="#footer-link-03" class="" id="footer-head-03" data-toggle="collapse" data-parent="#accordion-footer" role="button" aria-expanded="false" aria-controls="footer-link-03"><?php echo $bondy_options["reston-en-contact"]; ?></a>
    </h2>
    <div class="footer-content collapse" id="footer-link-03" role="tabpanel" aria-labelledby="footer-head-03" data-parent="#accordion-footer">
        <div class="adresse-bloc">
            <p><i class="icobnd-phone"></i>&nbsp;<span><?php echo $bondy_options["telephone"]; ?></span></p>
            <p><i class="icobnd-mail-full"></i>&nbsp;<a href="mailto:<?php echo $bondy_options["email"]; ?>"><span><?php echo $bondy_options["email"]; ?></span></a> </p>
            <!-- <p>Fax: <span><?php echo $bondy_options["fax"]; ?></span></p> -->
            <p class="reso-list">
                <?php if($bondy_options["facebook"] != null){ ?>
                    <a href="<?php echo $bondy_options["facebook"]; ?>" title="Facebook"><i class="icobnd-facebook"></i></a>
                <?php } if($bondy_options["instagram"] != null) {?>
                    <a href="<?php echo $bondy_options["instagram"]; ?>" title="Instagram"><i class="icobnd-instagram"></i></a>
                <?php } if($bondy_options["linkedin"] != null) {?>
                    <a href="<?php echo $bondy_options["linkedin"];?>" title="Linkedin"><i class="icobnd-linkedin-2"></i></a>
                <?php } if($bondy_options["youtube"] != null) {?>
                    <a href="<?php echo $bondy_options["youtube"]; ?>" title="Youtube"><i class="icobnd-youtube"></i></a>
                <?php } ?>
            </p>
        </div>
    </div>
</div>
</div>
</div>
</section>

<section class="footer-newsletter">
    <div class="container">
        <div class="row no-gutters">
            <section class="newsletter-bloc offset-lg-3 col-lg-6">
                <h2><?php if($bondy_options["titleNewsletterFooter"] != null){ echo $bondy_options["titleNewsletterFooter"];} else { ?>Rejoignez le mouvement <?php } ?> </h2>
                <?php if($bondy_options["texteNewsletterFooter"] != null)
                {
                    ?>
                    <div class="intro-txt">
                        <p><?php echo nl2br($bondy_options["texteNewsletterFooter"]); ?>
                    </div>
                <?php } ?>
                <div class="form-bloc">
                    <form action="#" method="POST" id="formNewslettersFooter" class="form-newsletter">
                        <div class="form-group footer">
                            <input type="text" class="form-control" id="newsletter_mail" name="newsletter_mail" placeholder="Saisissez votre adresse email" value="">
                            <button type="button" class="btn btn-primary btn-lg sabonner send-MailNl">s'abonner</button>
                            <span class="span-message-mail"></span>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

</section>



<section class="copyright-bloc">
    <p>L’utilisation de ce site entraîne votre acceptation des <a href="<?php echo $urlApropos[0]->url ?>" title="<?php echo $urlApropos[0]->title ?>"><?php echo $urlApropos[0]->title ?></a> et de la <a href="<?php echo $urlApropos[1]->url ?>" title="<?php echo $urlApropos[1]->title ?>"><?php echo $urlApropos[1]->title ?></a>.</p>
    <hr>
    <p>Copyright 2020 © Bôndy. Tous droits réservés. Designed & Developed with <i class="icobnd-heart-outline"></i> by <a href="<?php echo $urlApropos[2]->url ?>" title="<?php echo $urlApropos[2]->title ?>"><?php echo $urlApropos[2]->title ?></a></p>
</section>

<!-- srollTop -->
<button class="scrolltop"><i class="icobnd-arrow-up-rounded"></i></button>

</footer><!-- #colophon -->