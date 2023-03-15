<?php

// declare number posts per page

function post_per_page($number){
    $args = array(
        'posts_per_page' => $number,
        'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
        );
    query_posts($args);
}

function wpd_allposts_query( $query ){
    if( ! is_admin()
        && $query->is_main_query() ){
            $query->set( 'posts_per_page', -1 );
    }
}
add_action( 'pre_get_posts', 'wpd_allposts_query' );

// funkcja dzieli string na trzy części o zadklarowanej długości

// example:
// get_string_charl_respons('Jakiś długi text',150,100,50);

function get_string_charl_respons($str,$charl_d,$charl_t='',$charl_m='') {
    $string = strip_tags($str);
    if(empty($charl_t)){
        $charl_t = $charl_d;
    }
    if(empty($charl_m)){
        $charl_m = $charl_t;
    }
    $charl = array($charl_m,$charl_t-$charl_m,$charl_d-$charl_t);
    $result = array();
    $new_string = $string;
    $marker = '<p>';
    foreach ($charl as $key => $value) {
        if($value > 0){
            $wrapped = wordwrap($new_string, $value+4, $marker);
            $lines = explode($marker, $wrapped);
            $result[$key] = $lines[0];
            $new_string = mb_substr($new_string, mb_strlen($lines[0])+1);
        }else{
            $result[$key] = '';
        }
    }

    if(mb_strlen($string)>$charl_d){
        $dots_text = "<span class='dots_d'>...</span>";
    }elseif (mb_strlen($string)>$charl_t) {
        $dots_text = "<span class='dots_t hidden-lg hidden-md'>...</span>";
    }elseif (mb_strlen($string)>$charl_m) {
        $dots_text = "<span class='dots_m hidden-lg hidden-md hidden-sm'>...</span>";
    }else{
        $dots_text = "";
    }

    $result_html = '<span class="charl_m">' . $result[0] . '</span>';
    if($result[1]){
        $result_html .= '<span class="charl_t hidden-xs"> ' . $result[1] . '</span>';
    }
    if($result[2]){
        $result_html .= '<span class="charl_d hidden-sm hidden-xs"> ' . $result[2] . '</span>';
    }
    $result_html .= $dots_text;

    return $result_html;
}

function pagination()
{
    global $wp_query;
    $big = 999999999;
    echo epic_paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => __('<'),
        'next_text' => __('>'),
        'first_last' => true,
        'first_text' => ('first  '),
        'last_text' => ('  last')
    ));
}

add_action('init', 'pagination');
require_once('pagination.php');


// locate template with parameters
function epic_get_template( $template_name, $args = array() ) {
    if ( ! empty( $args ) && is_array( $args ) ) {
        extract( $args );
    }
    $located = locate_template($template_name);
    if ( ! file_exists( $located ) ) {
        return;
    }
    include( $located );
}

/*======================================
=            ACF merge tabs            =
======================================*/

add_action('admin_footer', function() {

    $screen = get_current_screen();
    
    if ( $screen->base == 'post'
        //|| $screen->base == 'dealer_page_acf-options-dealer-settings' :: for options page
         ) {
        echo '
    <!-- ACF Merge Tabs -->
    <script>
        var $boxes = jQuery("#postbox-container-2 .postbox .acf-field-tab").parent(".inside");
        if ( $boxes.length > 1 ) {

            var $firstBox = $boxes.first();

            $boxes.not($firstBox).each(function(){
                jQuery(this).children().appendTo($firstBox);
                jQuery(this).parent(".postbox").remove();
            });
        }
    </script>';
}
});

/*=====  End of ACF merge tabs  ======*/


/*
//unregister default widgets and register own

function unregister_default_widgets() {
   unregister_widget('WP_Widget_Text');
}
function Widget_init()
{
    require get_template_directory() . '/widgets/change-default-widgets.php';
    register_widget( 'Widget_Text' );
}

add_action('widgets_init', 'unregister_default_widgets', 1); //for change default widgets
add_action( 'widgets_init', 'Widget_init' );
*/


//Acf options page

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

    acf_add_options_sub_page('General options');
    //acf_add_options_sub_page('Not sure who you’re looking for?');
    // acf_add_options_page(array(
    //         'page_title' => 'Projects settings',
    //         'parent_slug' => 'edit.php?post_type=projects',
    //         'post_id' => 'projects-options',
    //         )
    //     );

}



//Acf google api

function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyCLFXtFLMRUIDMETNu33XJvfBZPwxsVK58');//staging

    // acf_update_setting('google_api_key', 'AIzaSyClSyZduH8KgZju5kj8Z-aUb8uyD2HJmvA');//live
}

add_action('acf/init', 'my_acf_init');




//Blokowanie wyświetlania typu postu


// add_action('wp','epicBlockPostTypeView');
// function epicBlockPostTypeView(){
//     if ((get_post_type() == "post"&& is_single())  || (get_post_type() == "wizyty" && is_single() ) || (get_post_type() == "wizyty_calender" && is_single() )) {
//        $homeUrl = home_url();
//        header("Location: ".$homeUrl); exit;
//    }
//   if (is_post_type_archive('post') || is_post_type_archive('wizyty') || is_post_type_archive('wizyty_calender')) {
//        $homeUrl = home_url();
//        header("Location: ".$homeUrl); exit;
//    }
//    if (is_category()) {
//        // is_tax();
//        //is_tag()
//        $homeUrl = home_url();
//        header("Location: ".$homeUrl); exit;
//  }
// }

/*===================================================
=            Cutting string with elipses            =
===================================================*/

function mb_ucfirst($str, $max_length, $enc = 'utf-8') {
    if(strlen($str) > $max_length){
        $cont = strip_tags( $str );
        $cont = wordwrap($cont, $max_length,'<break>');
        $cont = explode('<break>', $cont);
        return $cont[0].'...';
    } else {
        return $str;
    }
}

function title_short($str, $max_length, $enc = 'utf-8') {
    $string = str_replace(' ', '', $str);
    if(strlen($string) >= $max_length){
        $cont = strip_tags( $str );
        $cont = wordwrap($cont, $max_length,'<break>');
        $cont = explode('<break>', $cont);
        return $cont[0].'...';
    } else {
        return $str;
    }
} 

/*=====  End of Cutting string with elipses  ======*/


add_filter('use_block_editor_for_post', '__return_false', 10);