<?php
/**
 * Created by PhpStorm.
 * Date: 15/05/2020
 * Time: 13:56
 */
$data_fil_ariane = bondy_breadcrumg();
?>
<div class="breadcrumb-background">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo esc_url(home_url()); ?>" title="Accueil"><i class="icobnd-home"></i></a></li>
            <?php
            $it = 1;
            foreach ($data_fil_ariane as $list){?>
                <li>
                    <?php if ( isset( $list['link'] ) && !empty( $list['link'] ) ):?>
                    <a href="<?php echo $list['link'] ?>" title="<?php echo $list['title']; ?>"><?php echo ($list['title']); ?></a>
                    <?php else:?>
                        <span class="breadcrumb-no-link"><?php echo ($list['title']); ?></span>
                    <?php endif;?>
                </li>
           <?php }?>

        </ul>
    </div>
</div>
