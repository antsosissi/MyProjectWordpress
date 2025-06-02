
<?php
/**
 * Created by PhpStorm.
 * Date: 08/05/2020
 * Time: 08:47
 */
//global $post;
//$oPage = Qsomme_nous::getById($post->ID);
if(!empty($oPage->bondy_banniere_image) && isset($oPage->bondy_banniere_image)){
    ?>
    <section class="banniere">
        <figure class="ieobjectfit">
            <img class="content-img" src="<?php echo $oPage->bondy_banniere_image; ?>" alt="<?php echo bloginfo(); ?>" >
            <span class="overlay"></span>
        </figure>
        <div class="container content-txt">
            <h1 class="titre"><?php echo $oPage->titre ?></h1>
            <div class="txt"><?php echo $oPage->bondy_banniere_description ?></div>
        </div>
    </section>
    <?php
} else { 
    ?>
    <h1 class="d-none"><?php echo $oPage->titre ?></h1>
<?php
}

?>