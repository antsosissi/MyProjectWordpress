<?php
/**
 * Created by PhpStorm.
 * User: Fanomezana
 * Date: 19/06/2020
 * Time: 09:11
 */
$oEntreprise = get_query_var( 'dataArray' );
$titre_representation = ( !empty( $oEntreprise->titre_representation ) && isset( $oEntreprise->titre_representation ) && !empty( $oEntreprise->titre_representation ) ) ? $oEntreprise->titre_representation : "";
$titre_representation_1 = ( !empty( $oEntreprise['titre_representation_1'] ) && isset( $oEntreprise['titre_representation_1'] ) && !empty( $oEntreprise['titre_representation_1'] ) ) ? $oEntreprise['titre_representation_1'] : "";
$titre_representation_2 = ( !empty( $oEntreprise['titre_representation_2'] ) && isset( $oEntreprise['titre_representation_2'] )&& !empty( $oEntreprise['titre_representation_2']) ) ? $oEntreprise['titre_representation_2'] : "";
$titre_representation_3 = ( !empty( $oEntreprise['titre_representation_3'] ) && isset( $oEntreprise['titre_representation_3'] ) && !empty($oEntreprise['titre_representation_3'] ) ) ? $oEntreprise['titre_representation_3'] : "";
$titre_representation_4 = ( !empty($oEntreprise['titre_representation_4'] ) && isset( $oEntreprise['titre_representation_4'] ) && !empty(  $oEntreprise['titre_representation_4'] ) ) ?  $oEntreprise['titre_representation_4'] : "";
$titre_representation_5 = ( !empty($oEntreprise['titre_representation_5'] ) && isset( $oEntreprise['titre_representation_5'] ) && !empty( $oEntreprise['titre_representation_5'] ) ) ? $oEntreprise['titre_representation_5'] : "";
?>
<section class="miniWorld-bloc">
    <div class="container">
        <div class="miniWorld-content">
            <h2 class="d-none"></h2>
            <figure class="big-photo"><img src="<?php echo get_template_directory_uri() ?>/assets/svg/miniWorld-2.svg" alt="mini-world"></figure>

            <ul class="list-cleRSE">
                <li class="item climat-item">
                    <i class="icon-svgcolor thermometer-color"><img src="<?php echo get_template_directory_uri() ?>/assets/svg/thermometer-color.svg" width="39" alt="Image svg"></i>
                    <span><?php echo $titre_representation_1;?></span>
                </li>
                <li class="item erosion-item">
                    <i class="icon-svgcolor erosion-color"><img src="<?php echo get_template_directory_uri() ?>/assets/svg/erosion-color.svg" width="87" alt="Image svg"></i>
                    <span><?php echo $titre_representation_2;?></span>
                </li>
                <li class="item biodiversite-item">
                    <i class="icon-svgcolor biodiversite-color"><img src="<?php echo get_template_directory_uri() ?>/assets/svg/biodiversite-color.svg" width="84" alt="Image svg"></i>
                    <span><?php echo $titre_representation_3;?></span>
                </li>
                <li class="item emancipation-item">
                    <i class="icon-svgcolor rural-emancipation-color"><img src="<?php echo get_template_directory_uri() ?>/assets/svg/rural-emancipation-color.svg" width="90" alt="Image svg"></i>
                    <span><?php echo $titre_representation_4;?></span>
                </li>
                <li class="item entreprenariat-item">
                    <i class="icon-svgcolor builder-color"><img src="<?php echo get_template_directory_uri() ?>/assets/svg/builder-color.svg" width="80" alt="Image svg"></i>
                    <span><?php echo $titre_representation_5;?></span>
                </li>
            </ul>
        </div>
    </div>
</section>