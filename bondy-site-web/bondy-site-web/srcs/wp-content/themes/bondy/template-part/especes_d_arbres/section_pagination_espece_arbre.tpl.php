
<?php
$oProjet = get_query_var( 'objectPage' );
?>
    <p><?php echo 'titre: '.$oProjet->titre;?></p>
    <p>
        <img class="async-done" src="<?php echo $oProjet->image; ?>" width="258" height="258" alt="">
    </p>
    <p>icon:</p>
    <?php  foreach ($oProjet->type_utilisation as $val):
        $pictogramme = CTypeUtilisation::getById($val->term_id);?>
        <i class="icobnd-<?php echo $pictogramme->picto_utilisation;?>  icon-desk" alt="<?php echo $pictogramme->picto_name;?>"></i>
    <?php endforeach;?>
    <?php  foreach ($oProjet->specificite as $val):
        $pictogramme = CSpecificite::getById($val->term_id);?>
        <i class="icobnd-<?php echo $pictogramme->picto_utilisation;?>  icon-desk" alt="<?php echo $pictogramme->picto_name;?>"></i>
    <?php endforeach;?>
