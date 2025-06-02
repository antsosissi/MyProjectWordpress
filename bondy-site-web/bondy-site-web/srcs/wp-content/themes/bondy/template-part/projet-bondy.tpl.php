<?php
  $projets_mise_en_avant = get_query_var( 'projets_mise_en_avant' );
  foreach ($projets_mise_en_avant as $id_projet) {
    $oProjet        = CProjet::getById($id_projet);
    $cntEspeceArbre = CProjet::getNbEspeceArbre($id_projet);
    $dataArray = [$oProjet,$cntEspeceArbre];
      set_query_var( 'objectPage', $dataArray );
      get_template_part('template-part/projets/section-projet.tpl');
    ?>
  <?php
  }
