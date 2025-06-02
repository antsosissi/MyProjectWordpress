<?php
    $posts_in_post_type = get_posts( array(
        'fields' => 'ids',
        'post_type' => 'espece_arbre',
        'posts_per_page' => -1,
    ) );
    $terms_espece_arbre = wp_get_object_terms( $posts_in_post_type, array('etiquette_especes_arbres'), array( 'ids' ) );?>
    <div class="filtre_especes_arbres">
        <label for="">Filtre :</label>
        <div id="myDIV">
                <button class="filtre_etiquette_especes_arbres all btn btn-active" data-filterby="all" data-filter="filtre_etiquette_especes_arbres" >Tous</button>
                <?php foreach($terms_espece_arbre as $item):
                    ?>
                    <button class="filtre_etiquette_especes_arbres  btn" id="btn<?php echo $item->term_id;?>" data-filterby="<?php echo $item->term_id;?>" data-filter="filtre_etiquette_especes_arbres"><?php echo $item->name;?></button>

                <?php endforeach;?>
        </div>
        <script>
            jQuery(document).ready(function($) {

                var header = document.getElementById("myDIV");
                var btns = header.getElementsByClassName("filtre_etiquette_especes_arbres");
                for (var i = 0; i < btns.length; i++) {
                    btns[i].addEventListener("click", function() {
                        var current = document.getElementsByClassName("btn-active");
                        current[0].className = current[0].className.replace("btn-active", "");
                        this.className += " btn-active";
                    });
                }
            })
        </script>
    </div>

    <?php
    /**
     * Created by PhpStorm.
     * Date: 19/05/2020
     * Time: 09:49
     */

    $actus_pagination = new WP_Infinite_Loading('especes-arbres-pagination-box');
    //set list or table view
    $actus_pagination->setListView('other');

    //number of item on first load
    $actus_pagination->setItemNumberOnLoad(NOMBRE_PAGINATON_PAR_PAGE);
    $actus_pagination->setItemNumberToLoad(NOMBRE_PAGINATON_PAR_PAGE);

    //container class
    $actus_pagination->setContainerClasses('especes-arbres_content_bondy');

    //item classes
    $actus_pagination->setItemClasses('especes-arbres-item-bondy');
    $actus_pagination->setMessageNotFound('Aucun projet pour le moment');
    //set function callback for customize item template
    $actus_pagination->setRenderItemCallback(array('CEspeceArbre','renderItemCallbackEspeceArbre'));
    //set function callback for getting items by offset, limit, filter and sort
    $actus_pagination->setGetItemsCallback(array('CEspeceArbre', 'getItemsCallbackEspeceArbre'));

    $actus_pagination->addFilter('filtre_etiquette_especes_arbres');

    $actus_pagination->setInfiniteLoadButton(
        array(
            'id'=>'load-more',
            'tpl'=>'<div class="footer" id="load-more"><a href="javascript:;" class="btn btn-default">Voir plus</a></div>'
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