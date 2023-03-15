<?php

function styles()
{
	// wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '3.3.4', 'all');
 //    wp_enqueue_style('bootstrap');

    wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.6.0', 'all');
    wp_enqueue_style('font-awesome');

    wp_register_style('slick', get_template_directory_uri() . '/css/slick.css', array(), '1.6.0', 'all');
    wp_enqueue_style('slick');

    // wp_register_style('simplelightbox', get_template_directory_uri() . '/css/simplelightbox.css', array(), '1.0', 'all');
    // wp_enqueue_style('simplelightbox');

    wp_register_style('swiper', get_template_directory_uri() . '/css/swiper.min.css', array(), '1.0', 'all');
    wp_enqueue_style('swiper');

    wp_register_style('typekit-font', 'https://use.typekit.net/brc4obr.css', array(), '1.0', 'all');
    wp_enqueue_style('typekit-font');

    wp_register_style('style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('style');

    wp_register_style('styles', get_template_directory_uri() . '/css/styles.css', array(), '1.4', 'all');
    wp_enqueue_style('styles');

    wp_register_style('page', get_template_directory_uri() . '/css/page.css', array(), '1.0', 'all');
    wp_enqueue_style('page');

    wp_register_style('page_d', get_template_directory_uri() . '/css/page_d.css', array(), '1.0', 'all');
    wp_enqueue_style('page_d');

    wp_register_style('parts', get_template_directory_uri() . '/css/parts.css', array(), '1.1', 'all');
    wp_enqueue_style('parts');

    wp_register_style('home', get_template_directory_uri() . '/css/home.css', array(), '1.2', 'all');
    wp_enqueue_style('home');

    wp_register_style('insights_index', get_template_directory_uri() . '/css/insights_index.css', array(), '1.2', 'all');
    wp_enqueue_style('insights_index');

    wp_register_style('insights_single', get_template_directory_uri() . '/css/insights_single.css', array(), '1.0', 'all');
    wp_enqueue_style('insights_single');

    wp_register_style('advisors', get_template_directory_uri() . '/css/advisors.css', array(), '1.0', 'all');
    wp_enqueue_style('advisors');

    wp_register_style('advisor_profile', get_template_directory_uri() . '/css/advisor_profile.css', array(), '1.1', 'all');
    wp_enqueue_style('advisor_profile');

    wp_register_style('sec_ser_temp', get_template_directory_uri() . '/css/sec_ser_temp.css', array(), '1.2', 'all');
    wp_enqueue_style('sec_ser_temp');

    wp_register_style('contact', get_template_directory_uri() . '/css/contact.css', array(), '1.2', 'all');
    wp_enqueue_style('contact');

    wp_register_style('bokeh', get_template_directory_uri() . '/css/bokeh-1.0.0.min.css', array(), '1.0', 'all');
    wp_enqueue_style('bokeh');

    wp_register_style('bokeh_widgets', get_template_directory_uri() . '/css/bokeh-widgets-1.0.0.min.css', array(), '1.2', 'all');
    wp_enqueue_style('bokeh_widgets');

    wp_register_style('bokeh_tables', get_template_directory_uri() . '/css/bokeh-tables-1.0.0.min.css', array(), '1.2', 'all');
    wp_enqueue_style('bokeh_tables');

    wp_register_style('report_page', get_template_directory_uri() . '/css/report_page.css', array(), '1.0', 'all');
    wp_enqueue_style('report_page');

    wp_register_style('pop_up_news', get_template_directory_uri() . '/css/pop_up_news.css', array(), '1.0', 'all');
    wp_enqueue_style('pop_up_news'); 
    
}

add_action( 'wp_enqueue_scripts', 'styles' );