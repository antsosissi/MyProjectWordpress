<?php
/**
 * Created by PhpStorm.
 * Date: 12/05/2020
 * Time: 15:44
 */

$equipeID = get_query_var( 'relation_equipe_id' );
if($equipeID != null ){

$default_img_team = get_template_directory_uri() . '/src/images/default_user.png';
foreach ($equipeID as $idx){
    $chaqueEqui = CEquipe::getById($idx);
    ?>
    <div class="team-item">
        <div class="content-team">
            <figure class="photo-team">
                <a title="<?php echo $chaqueEqui->prenom_equipe; ?>&nbsp;<?php echo $chaqueEqui->nom_equipe; ?>">
                    <?php
                    $img_equipe_mobile = ( isset($chaqueEqui->photo_equipe_id) && !empty($chaqueEqui->photo_equipe_id) ) ? wp_get_attachment_image_src($chaqueEqui->photo_equipe_id, HOME_EQUIPE_MOBILE)["0"] : $default_img_team;
                    $img_equipe_tablet = ( isset($chaqueEqui->photo_equipe_id) && !empty($chaqueEqui->photo_equipe_id) ) ? wp_get_attachment_image_src($chaqueEqui->photo_equipe_id, HOME_EQUIPE_MOBILE)["0"] : $default_img_team;
                    $img_equipe_desktop = ( isset($chaqueEqui->photo_equipe_id) && !empty($chaqueEqui->photo_equipe_id) ) ? wp_get_attachment_image_src($chaqueEqui->photo_equipe_id, HOME_EQUIPE_DESKTOP)["0"] : $default_img_team;
                    ?>
                    <img src="<?php echo $img_equipe_desktop; ?>"
                         srcset="
      <?php echo $img_equipe_mobile; ?> 320w,
      <?php echo $img_equipe_tablet; ?> 1024w,
      <?php echo $img_equipe_desktop; ?> 1920w"
                         alt="<?php echo $chaqueEqui->prenom_equipe ?>">
                </a>
            </figure>
            <div class="info-team">
                <h3 class="nom-team"><a title="<?php echo $chaqueEqui->prenom_equipe; ?>&nbsp;<?php echo $chaqueEqui->nom_equipe; ?>"><?php echo $chaqueEqui->prenom_equipe; ?> <br><?php echo $chaqueEqui->nom_equipe; ?></a></h3>
                <p class="titre-team"><?php echo $chaqueEqui->fonction_equipe; ?></p>
                <blockquote class="description-txt">
                    <p><?php echo $chaqueEqui->citation_equipe; ?></p>
                </blockquote>
            </div>
            <div class="reso-list">
                <?php if($chaqueEqui->equipe_facebook != null){ ?>
                    <a class="" href="<?php echo $chaqueEqui->equipe_facebook; ?>" title="Facebook"><i class="icobnd-facebook"></i></a>
                <?php } ?>
                <?php if($chaqueEqui->equipe_instagram != null){ ?>
                    <a class="lien-instagram-team" href="<?php echo $chaqueEqui->equipe_instagram; ?>" title="Instagram"><i class="icobnd-instagram"></i></a>
                <?php } ?>
                <?php if($chaqueEqui->equipe_linkedin != null){ ?>
                    <a class="" href="<?php echo $chaqueEqui->equipe_linkedin; ?>" title="Linkedin"><i class="icobnd-linkedin-2"></i></a>
                <?php } ?>
            </div>
        </div>
    </div>
<?php }
} ?>


