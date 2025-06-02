<?php
/**
 * Created by PhpStorm.
 * Date: 11/05/2020
 * Time: 13:52
 */
global $post;
$chaqueContenu = get_query_var('objectPage');

$setActive=$chaqueContenu->compteur==0?'active':'';
$pageContact = wp_get_post_by_template( 'contact.php' );?>
<div class="tab-pane show in <?php  echo $setActive;  ?>" id="tabForm-particulier-<?php echo $chaqueContenu->compteur ?>" aria-labelledby="tabLink-entreprise-<?php echo $chaqueContenu->compteur ?>" role="tabpane<?php echo $chaqueContenu->compteur ?>">
	<div class="card-header" role="tab" id="head-collapse-part-<?php echo $chaqueContenu->compteur ?>">
		<h5 class="card-title">
			<a class="card-title-link" data-toggle="collapse" href="#content-collapse-part-<?php echo $chaqueContenu->compteur ?>" data-parent="#tab-content-particulier" aria-expanded="false" aria-controls="content-collapse-part-<?php echo $chaqueContenu->compteur ?>">
				<i class="icobnd-<?php echo $chaqueContenu->icone; ?>"></i>
				<span class="txt"><?php echo $chaqueContenu->titre; ?></span>
				<span class="circle-toggle">
					<span class="horizontal"></span>
					<span class="vertical"></span>
				</span>
			</a>
		</h5>
	</div>

<div id="content-collapse-part-<?php echo $chaqueContenu->compteur ?>" class="card-body collapse true" role="tabpanel" aria-labelledby="head-collapse-part-<?php echo $chaqueContenu->compteur ?>" data-parent="#tab-content-particulier">
<?php
foreach ($chaqueContenu->contenu as $item) {?>
	<div class="tab-content-type tab-content-type<?php echo $item['position_de_limage']=='droite'?1:2; ?> rich-text">
	    <h3><span><?php echo $item['titre_du_bloc_contenu'];?></span></h3>
	    <div class="tab-description">
	        <figure>
	            <img src="<?php echo $item['image_du_bloc_de_contenu'];?>" alt="">
	            <?php
	            $imgContenu=$item['image_du_bloc_de_contenu'];
	            if ($imgContenu){
	            list($img_actus_mobile)  = wp_get_attachment_image_src($imgContenu, IMAGE_ESPECE_ARBRE_MOBILE);
                list($img_actus_tablet)  = wp_get_attachment_image_src($imgContenu, IMAGE_ESPECE_ARBRE_TABLET);
                list($img_actus_desktop) = wp_get_attachment_image_src($imgContenu, IMAGE_ESPECE_ARBRE_DESKTOP); ?>
                    <img src="<?php echo $img_actus_desktop; ?>"
                         srcset="
                        <?php echo $img_actus_mobile; ?> 320w,
                        <?php echo $img_actus_tablet; ?> 1024w,
                        <?php echo $img_actus_desktop; ?> 1920w"
                         alt="<?php echo $chaqueActu->titre; ?>">
                 <?php } ?>
	        </figure>
	        <div class="txt">
	            <?php echo $item['texte_du_bloc'];?>
	            <div class="bouton">
		            	<a class="btn btn-md btn-primary" href="<?php echo get_permalink($pageContact->ID);?>" title="Contactez-nous">
		            		 Contactez-nous
		            	</a>
	                
	            </div>
	        </div>
	    </div>
	</div>
<?php
}
?>
</div>
</div>
