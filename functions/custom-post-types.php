<?php

 
// Register Custom Post Types

add_action( 'init', 'create_post_type' );

function create_post_type() {

	//Pieces

	$plugin_labels = array(
		'name' => __( 'Plugins' ),
		'singular_name' => __( 'Plugin' )
	);

	$plugin_args = array(
		'labels'        	 => $plugin_labels,
		'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
		'rewrite' 			 => array('slug' => 'plugin'), // We keep this slug, in order to keep back-wards compatibiltiy with urls
		'has_archive'        => true,
        'show_in_nav_menus'  => true,
        'hierarchical'       => false,
        'menu_position'      => null,
		'supports'           => array( 'title', 'author', 'editor', 'excerpt', 'revisions', 'custom-fields', 'thumbnail'),
	);

	register_post_type( 'plugin', $plugin_args);

	$theme_labels = array(
        'name'               => 'Themes',
        'singular_name'      => 'Theme',
        'add_new'            => 'Add Theme',
        'add_new_item'       => 'Add New Theme',
        'edit_item'          => 'Edit Theme',
        'new_item'           => 'New Theme',
        'all_items'          => 'All Themes',
        'view_item'          => 'View Themes',
        'search_items'       => 'Search Themes',
        'not_found'          => 'No Themes found',
        'not_found_in_trash' => 'No Themes found in Trash',
        'parent_item_colon'  => __( 'Parent Theme Page' ),
        'parent'             => __( 'Parent Theme Page' ),
        'menu_name'          => 'Themes'
    );

    $theme_args = array(
        'labels'             => $theme_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'themes' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'show_in_nav_menus'  => true,
        'menu_position'      => null,
        'supports'           => array( 'title', 'author', 'editor', 'excerpt', 'revisions', 'custom-fields', 'thumbnail'),
    );

    register_post_type( 'theme', $theme_args );

}

/* For Custom Post Ordering */
if ( class_exists("global_posts_ordering") ) {
    $global_posts_ordering = new global_posts_ordering(array("piece"));
}

?>