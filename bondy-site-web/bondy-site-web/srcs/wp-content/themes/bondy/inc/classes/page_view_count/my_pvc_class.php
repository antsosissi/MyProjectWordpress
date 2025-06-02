<?php
/**
 * Created by PhpStorm.
 * Date: 11/05/2020
 * Time: 15:18
 */
namespace A3Rev\PageViewsCount;

if (class_exists('A3Rev\PageViewsCount\A3_PVC')) {

    class MY_A3_PVC extends A3_PVC
    {
        public static function custom_stats_echo($postid=0, $have_echo = 1, $attributes = array() ){
            if($have_echo == 1)
                echo self::pvc_stats_counter($postid, false, $attributes);
            else
                return self::pvc_stats_counter($postid, false, $attributes );
        }


        // get the total page views and daily page views for the post
        public static function pvc_stats_counter( $post_id, $increase_views = false, $attributes = array() )
        {
            return self::pvc_get_stats($post_id);
        }



        public static function pvc_get_stats( $post_id, $views_type = 'all' ) {
            global $wpdb;

            $output_html = '';
            // get all the post view info to display
            $total = self::pvc_fetch_post_total( $post_id );
            $today = self::pvc_fetch_post_today( $post_id );

            if ( ! empty( $total ) ) {

                $output_html .= number_format( $total );//.__('total views', 'page-views-count');
                //$output_html .= ', ';

                if ( ! empty( $today ) ) {
                    //$output_html .= number_format( $today ) . '&nbsp;' ;//.__('views today', 'page-views-count');
                } else {
                    $output_html .= "0";//__('no views today', 'page-views-count');
                }

            } else {
                $output_html .=  "0";//__('No views yet', 'page-views-count');
            }

            $output_html = apply_filters( 'pvc_filter_get_stats', $output_html, $post_id );

            return $output_html;
        }

    }

}
