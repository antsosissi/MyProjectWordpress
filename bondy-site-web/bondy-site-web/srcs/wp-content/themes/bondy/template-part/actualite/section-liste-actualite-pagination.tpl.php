<?php
    $posts_in_post_type_actualite = get_posts( array(
    'fields' => 'ids',
    'post_type' => 'actualite',
    'posts_per_page' => -1,
    ) );
    $terms_actualtes = wp_get_object_terms( $posts_in_post_type_actualite, array('etiquette_actualites'), array( 'ids' ) );
    $tags = ( isset( $_REQUEST['tags']) && !empty( $_REQUEST['tags'] ) && intval($_REQUEST['tags'])> 0 && term_exists( intval($_REQUEST['tags']), TAXONOMY_ACTUALITES ) )? $_REQUEST['tags'] : "";
    ?>
    <!-- filtre actus -->
    <div class="filtre-bloc form-bloc filtre-actus">
        <div class="filtre-tag">
            <div id="myDIV" class="list-tag firstInit-tag">
                <label for="">Dans les actus :</label>
                <button class="add_check_actus filtre_etiquette_actualiter all btn <?php if ( $tags == "" ):?>btn-active<?php endif;?>" data-filterby=""
                        data-filter="filtre_etiquette_actualiter" >Tous</button>
                <?php foreach($terms_actualtes as $item):
                    ?>
                    <button class="add_check_actus filtre_etiquette_actualiter  btn <?php if ( $tags == $item->term_id ):?>btn-active<?php endif;?>"
                            id="btn<?php echo $item->term_id;?>" data-filterby="<?php echo $item->term_id;?>"
                            data-filter="filtre_etiquette_actualiter"><?php echo $item->name;?></button>
                <?php endforeach;?>
            </div>
        </div>
        <span class="plus-tag show-mobile">Voir plus de tags</span>
        <div class="filtre-select">
            <label for="">Trier par :</label>
            <div class="customSelect">
                <select class="sorting-name add_check_actus" data-orderby="date" >
                    <option class="sortDown"  title="Descendant" value="DESC" selected="selected">Les + récents</option>
                    <option class="sortUp" title="Ascendant" value="ASC">Les + anciens</option>
                </select>
            </div>  
        </div>
        <!-- script -->
        <script>
            jQuery(document).ready(function($) {
                var header = document.getElementById("myDIV");
                var btns = header.getElementsByClassName("filtre_etiquette_actualiter");
                for (var i = 0; i < btns.length; i++) {
                    btns[i].addEventListener("click", function() {
                        var current = document.getElementsByClassName("btn-active");
                        current[0].className = current[0].className.replace("btn-active", "");
                        this.className += " btn-active";

                    });
                }

            })
        </script>
        <!-- fin script -->
    </div>
    <span class="plus-tag hide-mobile">Voir plus de tags</span>
    <!-- fin filtre actus -->
<?php
//$page = CActualite::getById();
/**
 * Created by PhpStorm.
 * Date: 19/05/2020
 * Time: 09:49
 */

$actus_pagination = new WP_Infinite_Loading('actualiter-pagination-box');
//set list or table view
$actus_pagination->setListView('other');

//number of item on first load
if ( !empty(CActualite::getActusVedette()) ){
    $actus_pagination->setItemNumberOnLoad(7);
} else {
    $actus_pagination->setItemNumberOnLoad(NOMBRE_PAGINATON_PAR_PAGE);
}

$actus_pagination->setItemNumberToLoad(NOMBRE_PAGINATON_PAR_PAGE);

//container class
$actus_pagination->setContainerClasses('actualiter_content_bondy');

//item classes
$actus_pagination->setItemClasses('actualiter-item-bondy');
$actus_pagination->setMessageNotFound('Aucun projet pour le moment');
//set function callback for customize item template
$actus_pagination->setRenderItemCallback(array('CActualite','renderItemCallbackActualites'));
//set function callback for getting items by offset, limit, filter and sort
$actus_pagination->setGetItemsCallback(array('CActualite', 'getItemsCallbackActualites'));

$actus_pagination->addFilter('filtre_etiquette_actualiter');

$actus_pagination->addSorting('sorting-name');

if ( !empty($tags) && intval($tags) > 0 ){
    $actus_pagination->setOnLoadFilter(array(
        'filtre_etiquette_actualiter' => $tags
    ));
}

$actus_pagination->setInfiniteLoadButton(
    array(
        'id'=>'load-more',
        'tpl'=>'<div class="footer" id="load-more"><a href="javascript:;" class="add_check_actus btn btn-default">Voir plus</a></div>'
    ),
    array(
        'id'=>'no-load-more',
        'tpl'=>'<div id="no-load-more" class="footer-hide-button"></div>'
    )
);
?>
<div class="list-espece-arbre bloc-item">
    <?php
    //display pagination loading box
    $actus_pagination->displayItems();
    ?>
</div>
<?php
//display the pagination loading button
$actus_pagination->displayInfiniteLoadButton();
?>
