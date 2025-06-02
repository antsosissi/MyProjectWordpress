<?php
/**
 * Created by PhpStorm.
 * Date: 19/05/2020
 * Time: 09:49
 */

$actus_pagination = new WP_Infinite_Loading('projet-pagination-box');
//set list or table view
$actus_pagination->setListView('other');

//number of item on first load

$actus_pagination->setItemNumberOnLoad(NOMBRE_PAGINATON_PAR_PAGE);
$actus_pagination->setItemNumberToLoad(NOMBRE_PAGINATON_PAR_PAGE);


//container class
$actus_pagination->setContainerClasses('projet_content_bondy');

//item classes
$actus_pagination->setItemClasses('projet-item-bondy');
$actus_pagination->setMessageNotFound('<span class="empty-projet-item">Aucun projet pour le moment</span>');
//set function callback for customize item template
$actus_pagination->setRenderItemCallback(array('CProjet','renderItemCallbackProjet'));
//set function callback for getting items by offset, limit, filter and sort
$actus_pagination->setGetItemsCallback(array('CProjet', 'getItemsCallbackProjet'));

$actus_pagination->addFilter('filtre_projet_avancement');
$actus_pagination->addFilter('filtre_projet_date_debut');
$actus_pagination->addFilter('filtre_projet_date_fin');

$actus_pagination->setInfiniteLoadButton(
    array(
        'id'=>'load-more',
        'tpl'=>'<div class="footer" id="load-more"><p class="wrap-btn text-center"><a class="btn btn-voirPlusProjets btn-md btn-default" href="javascript:;" title="Voir plus de projets">Voir plus de projets</a></p></div>',
    ),
    array(
        'id'=>'no-load-more',
        'tpl'=>'<div id="no-load-more" class="footer-hide-button"></div>'
    )
);
?>

<article class="list-projets-bloc bloc-item bg-white">
    <div class="container">
        <!-- filtres d'affichage projets -->
        <div class="filter-bloc form-bloc">
            <h2>Afficher par :</h2>
            <form action="#" class="filter-form">
                <div class="filter-status">
                    <label>Status :</label>
                    <div class="customSelect">
                        <select class="filtre_projet_avancement" data-filter="avancement">
                            <option  value="all" selected="selected">Tous</option>
                            <?php

                            $avancement = CAvancementProjet::getBy();
                            foreach ($avancement as $listAvan){ ?>
                                <option value="<?php echo $listAvan->id ?>"><?php echo $listAvan->titre ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="filter-dates">
                    <div class="date-item debut-item">
                        <label for="date-debut">Début projet :</label>
                        <div class="field-group">
                            <label for="date-debut" class="icon-calendar"><i class="icobnd-calendar"></i></label>
                            <input type="text" class="filtre_projet_date_debut form-control date-apartir" id="date-dsebut" data-filter="date_debut" placeholder="date début" value="">
                        </div>
                    </div>

                    <div class="date-item fin-item">
                        <label for="date-fin">au</label>
                        <div class="field-group">
                            <label for="date-fin" class="icon-calendar"><i class="icobnd-calendar"></i></label>
                            <input type="text" class="filtre_projet_date_fin form-control date-anterieur" data-filter="date_fin" placeholder="date fin" value="">
                        </div>
                    </div>
                    <!-- filter hidden -->
                </div>
            </form>
        </div>
        <!-- /filtres d'affichage projets -->

        <section class="projet-list-wrapper">
            <div class="projet-list projet-list-simple">
                <?php
                //display pagination loading box
                $actus_pagination->displayItems();
                //display the pagination loading button
                $actus_pagination->displayInfiniteLoadButton();
                ?>
                <!--p class="wrap-btn text-center"><a class="btn btn-voirPlusProjets btn-sm btn-default" href="" title="Voir plus de projets">Voir plus de projets</a></p-->
            </div>
        </section>
    </div>
</article>
