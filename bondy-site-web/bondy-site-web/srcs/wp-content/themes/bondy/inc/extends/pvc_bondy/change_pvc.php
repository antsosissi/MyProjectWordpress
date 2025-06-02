<?php
/**
 * Created by PhpStorm.
 * Date: 11/05/2020
 * Time: 15:27
 */

if (class_exists("\A3Rev\PageViewsCount\A3_PVC")) {

    function pvc_statss( $postid, $have_echo = 1, $attributes = array() ) {
        return \A3Rev\PageViewsCount\MY_A3_PVC::custom_stats_echo( $postid, $have_echo, $attributes );
    }

    function pvc_statss_update( $postid, $have_echo = 1, $attributes = array() ) {
        return \A3Rev\PageViewsCount\MY_A3_PVC::custom_stats_update_echo( $postid, $have_echo, $attributes );
    }
}

?>