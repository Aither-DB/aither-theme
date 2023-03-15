<?php

function register_menus()
{
    register_nav_menus(array(
        'header-menu' => __('Header Menu'),
        'footer-menu' => __('Footer Menu'),
        'footer-menu-xs' => __('Footer Menu Mobile')
    ));
}

if (function_exists('register_sidebar'))
{
    register_sidebar(array(
        'name' => __('Widget Area'),
        'description' => __('Description...'),
        'id' => 'widget-area',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

add_action('init', 'register_menus');