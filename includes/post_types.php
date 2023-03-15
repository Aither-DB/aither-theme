<?php
function advisors_posts() {

    $labels = array(
        'name'                => _x( 'Advisors', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Advisors', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Advisors', 'text_domain' ),
        'name_admin_bar'      => __( 'Advisors', 'text_domain' ),
        'parent_item_colon'   => __( 'Advisors:', 'text_domain' ),
        'all_items'           => __( 'All', 'text_domain' ),
        'add_new_item'        => __( 'New', 'text_domain' ),
        'add_new'             => __( 'New', 'text_domain' ),
        'new_item'            => __( 'New', 'text_domain' ),
        'edit_item'           => __( 'Edit', 'text_domain' ),
        'update_item'         => __( 'Update', 'text_domain' ),
        'view_item'           => __( 'View', 'text_domain' ),
        'search_items'        => __( 'Search', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'Advisors', 'text_domain' ),
        'description'         => __( 'Advisors ', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor'),
        'taxonomies'          => array( '' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'menu_icon'           => 'dashicons-groups',
        // 'rewrite' => array(
        //     'slug' => 'banking'
        // )
    );

    register_post_type( 'advisors_posts', $args );

}

function specialisations() {

    $labels = array(
        'name'                => _x( 'Specialisations', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Specialisations', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Specialisations', 'text_domain' ),
        'name_admin_bar'      => __( 'Specialisations', 'text_domain' ),
        'parent_item_colon'   => __( 'Specialisations:', 'text_domain' ),
        'all_items'           => __( 'All', 'text_domain' ),
        'add_new_item'        => __( 'New', 'text_domain' ),
        'add_new'             => __( 'New', 'text_domain' ),
        'new_item'            => __( 'New', 'text_domain' ),
        'edit_item'           => __( 'Edit', 'text_domain' ),
        'update_item'         => __( 'Update', 'text_domain' ),
        'view_item'           => __( 'View', 'text_domain' ),
        'search_items'        => __( 'Search', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'Specialisations', 'text_domain' ),
        'description'         => __( 'Specialisations ', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor'),
        'taxonomies'          => array( '' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'menu_icon'           => 'dashicons-awards',
        // 'rewrite' => array(
        //     'slug' => 'banking'
        // )
    );

    register_post_type( 'specialisations', $args );

}

// Hook into the 'init' action
add_action( 'init', 'advisors_posts', 0 );
add_action( 'init', 'specialisations', 0 );

add_action( 'init', 'build_taxonomie1', 0 );
add_action( 'init', 'build_taxonomie2', 0 );
add_action( 'init', 'build_taxonomie3', 0 );

function build_taxonomie1() {
    register_taxonomy( 'services', 'advisors_posts', array(
        'hierarchical'                  => true,
        'label'                         => 'Services',
        'query_var'                     => true,
        'rewrite'                       => true,
        'public'                        => true,
        'show_ui'                       => true,
        'show_in_menu'                  => true,
        'show_admin_column'             => true,
        'show_in_nav_menus'             => true,
        'show_tagcloud'                 => true
        )
    );
}

function build_taxonomie2() {
    register_taxonomy( 'sectors', 'advisors_posts', array(
        'hierarchical'                  => true,
        'label'                         => 'Sectors',
        'query_var'                     => true,
        'rewrite'                       => true,
        'public'                        => true,
        'show_ui'                       => true,
        'show_in_menu'                  => true,
        'show_admin_column'             => true,
        'show_in_nav_menus'             => true,
        'show_tagcloud'                 => true
        )
    );
}

function build_taxonomie3() {
    register_taxonomy( 'roles', 'advisors_posts', array(
        'hierarchical'                  => true,
        'label'                         => 'Roles',
        'query_var'                     => true,
        'rewrite'                       => true,
        'public'                        => true,
        'show_ui'                       => true,
        'show_in_menu'                  => true,
        'show_admin_column'             => true,
        'show_in_nav_menus'             => true,
        'show_tagcloud'                 => true
        )
    );
}


//default post taxonomie

add_action( 'init', 'build_taxonomie_post', 0 );
add_action( 'init', 'build_taxonomie_post2', 0 );

function build_taxonomie_post() {
    register_taxonomy( 'post_services', 'post', array(
        'hierarchical'                  => true,
        'label'                         => 'Services',
        'query_var'                     => true,
        'rewrite'                       => true,
        'public'                        => true,
        'show_ui'                       => true,
        'show_in_menu'                  => true,
        'show_admin_column'             => true,
        'show_in_nav_menus'             => true,
        'show_tagcloud'                 => true
        )
    );
}

function build_taxonomie_post2() {
    register_taxonomy( 'post_sectors', 'post', array(
        'hierarchical'                  => true,
        'label'                         => 'Sectors',
        'query_var'                     => true,
        'rewrite'                       => true,
        'public'                        => true,
        'show_ui'                       => true,
        'show_in_menu'                  => true,
        'show_admin_column'             => true,
        'show_in_nav_menus'             => true,
        'show_tagcloud'                 => true
        )
    );
}

function post() {

    $labels = array(
        'name'                => _x( 'Post', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Post', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Post', 'text_domain' ),
        'name_admin_bar'      => __( 'Post', 'text_domain' ),
        'parent_item_colon'   => __( 'Post:', 'text_domain' ),
        'all_items'           => __( 'All', 'text_domain' ),
        'add_new_item'        => __( 'New', 'text_domain' ),
        'add_new'             => __( 'New', 'text_domain' ),
        'new_item'            => __( 'New', 'text_domain' ),
        'edit_item'           => __( 'Edit', 'text_domain' ),
        'update_item'         => __( 'Update', 'text_domain' ),
        'view_item'           => __( 'View', 'text_domain' ),
        'search_items'        => __( 'Search', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'Post', 'text_domain' ),
        'description'         => __( 'Post ', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor'),
        'taxonomies'          => array( '' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'menu_icon'           => 'dashicons-awards',
        // 'rewrite' => array(
        //     'slug' => 'banking'
        // )
    );

    register_post_type( 'post', $args );

}

// Hook into the 'init' action
add_action( 'init', 'advisors_posts', 0 );

/* To make change in default post type */

// function revcon_change_post_label() {
//     global $menu;
//     global $submenu;
//     $menu[5][0] = 'News';
//     $submenu['edit.php'][5][0] = 'News';
//     $submenu['edit.php'][10][0] = 'Add News';
//     $submenu['edit.php'][16][0] = 'News Tags';
//     echo '';
// }
// function revcon_change_post_object() {
//     global $wp_post_types;
//     $labels = &$wp_post_types['post']->labels;
//     $labels->name = 'News';
//     $labels->singular_name = 'News';
//     $labels->add_new = 'Add News';
//     $labels->add_new_item = 'Add News';
//     $labels->edit_item = 'Edit News';
//     $labels->new_item = 'News';
//     $labels->view_item = 'View News';
//     $labels->search_items = 'Search News';
//     $labels->not_found = 'No News found';
//     $labels->not_found_in_trash = 'No News found in Trash';
//     $labels->all_items = 'All News';
//     $labels->menu_name = 'News';
//     $labels->name_admin_bar = 'News';
// }

// add_action( 'admin_menu', 'revcon_change_post_label' );
// add_action( 'init', 'revcon_change_post_object' );