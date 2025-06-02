<?php
/**
 * Created by PhpStorm.
 * Date: 08/05/2020
 * Time: 08:45
 */
global $post;
//$oPage = Qsomme_nous::getById($post->ID);

    $titrePage = CPage::getById($post->ID);
    $value = "";
    if($post->post_name == URL_QUI_SOMMES_NOUS){
        $value = "titre-quiSommeNous bg-white";
    }


    if((isset($titrePage->titre_page) && !empty($titrePage->titre_page)) || (isset($titrePage->introduction_page) && !empty($titrePage->introduction_page))) {
?>


<article class="bloc-item bg-white titre-page-bloc <?php echo $value;?>">
    <div class="container">
        <?php
        if( isset($titrePage->titre_page) && !empty($titrePage->titre_page)) {
        ?>
            <?php echo $titrePage->titre_page ?>
        <?php
        }
        ?>
        <?php
             if( isset($titrePage->introduction_page) && !empty($titrePage->introduction_page)) {
        ?>

            <div class="rich-text chapo-txt">
                <?php echo apply_filters('ths_content', $titrePage->introduction_page); ?>
            </div>
        <?php
            }
        ?>
    </div>
</article>
<?php
}
?>
