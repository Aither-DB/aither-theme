<?php

function general_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('no_conflict', get_template_directory_uri() . '/js/no_conflict.js', array('jquery'), '1.0.0');
        wp_enqueue_script('no_conflict');

        wp_register_script('buggyfill', get_template_directory_uri() . '/js/viewport-units-buggyfill.js', array(), '1.6.0', true);
        wp_enqueue_script('buggyfill');

        wp_register_script('bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), '3.3.4', true);
        wp_enqueue_script('bootstrap');

        wp_register_script('slick', get_template_directory_uri() . '/js/slick.min.js', array(), '1.6.0', true);
        wp_enqueue_script('slick');

        wp_register_script('svg-injector', get_template_directory_uri() . '/js/svg-injector.min.js', array(), '1.0.0', true);
        wp_enqueue_script('svg-injector');

        wp_register_script('jquery-cookie', get_template_directory_uri() . '/js/jquery-cookie.min.js', array(), '1.0.0');
        wp_enqueue_script('jquery-cookie');

        wp_register_script('epicup-library', get_template_directory_uri() . '/js/epicup-library.min.js', array(), '1.1.0');
        wp_enqueue_script('epicup-library');

        // wp_register_script('simple-lightbox', get_template_directory_uri() . '/js/simple-lightbox.min.js', array(), '1.0.0', true);
        // wp_enqueue_script('simple-lightbox');

        wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.min.js', array(), '1.2.2', true);
        wp_enqueue_script('scripts');

        
    }

    if (is_page_template('page-temp/home.php')) {

        wp_register_script('player', get_template_directory_uri() . '/js/player.min.js', array(), '1.0.0', true);
        wp_enqueue_script('player');

        wp_register_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.js', array(), '1.1.0', true);
        wp_enqueue_script('jquery-ui');

        wp_register_script('select-box-it', get_template_directory_uri() . '/js/jquery.selectBoxIt.min.js', array(), '1.1.0', true);
        wp_enqueue_script('select-box-it');

        wp_register_script('swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), '1.14.15', true);
        wp_enqueue_script('swiper');

        wp_register_script('home', get_template_directory_uri() . '/js/home.js', array(), '1.1.3', true);
        wp_enqueue_script('home');

        wp_register_script('pop_up_news', get_template_directory_uri() . '/js/pop_up_news.min.js', array('jquery-cookie', 'epicup-library'), '1.0.1', true);
        wp_enqueue_script('pop_up_news');

        wp_register_script('parsley', get_template_directory_uri() . '/js/parsley.min.js', array(), '1.0.0', true);
        wp_enqueue_script('parsley');

        wp_register_script('newsletter', get_template_directory_uri() . '/js/newsletter.min.js', array(), '1.0.0', true);
        wp_enqueue_script('newsletter');
        $url = add_query_arg("action", 'newsletter', admin_url("admin-ajax.php"));
        wp_localize_script('newsletter', 'newsletter' . "Handle", array("url" => $url));

    }
    if (is_page_template('page-temp/landing_page.php')) {

        wp_register_script('ScrollMagic', get_template_directory_uri() . '/js/ScrollMagic.min.js', array(), '1.0.0', true);
        wp_enqueue_script('ScrollMagic');

        wp_register_script('landing_page', get_template_directory_uri() . '/js/landing_page.min.js', array(), '1.0.0', true);
        wp_enqueue_script('landing_page');

    }
    // 

    if (is_page_template('page-temp/advisors.php') || is_home()) {

        wp_register_script('shufflejs', get_template_directory_uri() . '/js/node_modules/shufflejs/dist/shuffle.js', array(), '1.0.0', true);
        wp_enqueue_script('shufflejs');

        wp_register_script('fixed_bar', get_template_directory_uri() . '/js/fixed_bar.min.js', array(), '1.0.1', true);
        wp_enqueue_script('fixed_bar');

    }
    
    if ( is_home() ){
        wp_register_script('player', get_template_directory_uri() . '/js/player.min.js', array(), '1.0.0', true);
        wp_enqueue_script('player');

        wp_register_script('insights_index', get_template_directory_uri() . '/js/insights_index.js', array(), '1.0.0', true);
        wp_enqueue_script('insights_index');

        wp_register_script('insights_filter', get_template_directory_uri() . '/js/insights_filter.js', array(), '1.1.0', true);
        wp_enqueue_script('insights_filter');

        wp_register_script('pop_up_news', get_template_directory_uri() . '/js/pop_up_news.min.js', array('jquery-cookie', 'epicup-library'), '1.0.0', true);
        wp_enqueue_script('pop_up_news');

        wp_register_script('parsley', get_template_directory_uri() . '/js/parsley.min.js', array(), '1.0.0', true);
        wp_enqueue_script('parsley');

        wp_register_script('newsletter', get_template_directory_uri() . '/js/newsletter.min.js', array(), '1.0.0', true);
        wp_enqueue_script('newsletter');
        $url = add_query_arg("action", 'newsletter', admin_url("admin-ajax.php"));
        wp_localize_script('newsletter', 'newsletter' . "Handle", array("url" => $url));
    }

    if (is_page_template('page-temp/advisors.php')) {
        wp_register_script('advisors', get_template_directory_uri() . '/js/advisors.js', array(), '1.0.0', true);
        wp_enqueue_script('advisors');
    }
        

    if ( get_post_type() == "post" && is_single() ){

        wp_register_script('player', get_template_directory_uri() . '/js/player.min.js', array(), '1.0.0', true);
        wp_enqueue_script('player');

        wp_register_script('swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), '1.14.15', true);
        wp_enqueue_script('swiper');

        wp_register_script('bokeh', get_template_directory_uri() . '/js/bokeh-1.0.0.min.js', array(), '1.2.0', true);
        wp_enqueue_script('bokeh');

        wp_register_script('bokeh_widgets', get_template_directory_uri() . '/js/bokeh-widgets-1.0.0.min.js', array(), '1.2.0', true);
        wp_enqueue_script('bokeh_widgets');

        wp_register_script('bokeh_tables', get_template_directory_uri() . '/js/bokeh-tables-1.0.0.min.js', array(), '1.2.0', true);
        wp_enqueue_script('bokeh_tables');

        wp_register_script('bokeh_api', get_template_directory_uri() . '/js/bokeh-api-1.0.0.min.js', array(), '1.2.0', true);
        wp_enqueue_script('bokeh_api');

        wp_register_script('insights_single', get_template_directory_uri() . '/js/insights_single.min.js', array(), '1.14.15', true);
        wp_enqueue_script('insights_single');

    }

    if (get_post_type() == 'page' && !is_page_template()) {

        wp_register_script('player', get_template_directory_uri() . '/js/player.min.js', array(), '1.0.0', true);
        wp_enqueue_script('player');

        wp_register_script('swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), '1.14.15', true);
        wp_enqueue_script('swiper');

        wp_register_script('default_temp', get_template_directory_uri() . '/js/default_temp.min.js', array(), '1.0.0', true);
        wp_enqueue_script('default_temp');
    }

    if (is_page_template('page-temp/advisor_profile.php')) {

        wp_register_script('swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), '1.0.0', true);
        wp_enqueue_script('swiper');

        wp_register_script('advisor_profile', get_template_directory_uri() . '/js/advisor_profile.min.js', array(), '1.0.0', true);
        wp_enqueue_script('advisor_profile');

    }

    if (is_page_template('page-temp/sectors_services.php')) {

        wp_register_script('swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), '1.0.0', true);
        wp_enqueue_script('swiper');

        wp_register_script('sectors_services', get_template_directory_uri() . '/js/sectors_services.min.js', array(), '1.2.0', true);
        wp_enqueue_script('sectors_services');

    }

    if (is_page_template('page-temp/contact.php')) {

        wp_register_script('swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), '1.0.0', true);
        wp_enqueue_script('swiper');

        wp_register_script('googleapis','https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBtD5Cu6mUPAw4QAB2x8yM4SItI9O5yzOI&sensor=false', array(), '1.0.0', true); //staging
        // wp_register_script('googleapis','https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyClSyZduH8KgZju5kj8Z-aUb8uyD2HJmvA&sensor=false', array(), '1.0.0', true); //live

        wp_enqueue_script('googleapis');

        wp_register_script('map', get_template_directory_uri() . '/js/map.min.js', array(), '1.0.0', true);
        wp_enqueue_script('map');

        wp_register_script('contact', get_template_directory_uri() . '/js/contact.min.js', array(), '1.0.0', true);
        wp_enqueue_script('contact');
        
    }

    if ( is_page_template('page-temp/report_page.php') ){

        wp_register_script('swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), '1.14.15', true);
        wp_enqueue_script('swiper');

        wp_register_script('raport_page', get_template_directory_uri() . '/js/raport_page.min.js', array(), '1.0.0', true);
        wp_enqueue_script('raport_page');

        wp_register_script('bokeh', get_template_directory_uri() . '/js/bokeh-1.0.0.min.js', array(), '1.2.0', true);
        wp_enqueue_script('bokeh');

        wp_register_script('bokeh_widgets', get_template_directory_uri() . '/js/bokeh-widgets-1.0.0.min.js', array(), '1.2.0', true);
        wp_enqueue_script('bokeh_widgets');

        wp_register_script('bokeh_tables', get_template_directory_uri() . '/js/bokeh-tables-1.0.0.min.js', array(), '1.2.0', true);
        wp_enqueue_script('bokeh_tables');

        wp_register_script('bokeh_api', get_template_directory_uri() . '/js/bokeh-api-1.0.0.min.js', array(), '1.2.0', true);
        wp_enqueue_script('bokeh_api');

        wp_register_script('graphs_report', get_template_directory_uri() . '/js/graphs_report.min.js', array(), '1.0.0', true);
        wp_enqueue_script('graphs_report');

    }
    
}

add_action( 'wp_enqueue_scripts', 'general_scripts' );
