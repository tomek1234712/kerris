<?php


class AppCustomPostType {
    function __construct() {
        $this->init();
    }

    public function init() {
        //add_action('init', array($this, 'registerCustomPostTypes') ) ;
        //add_action('init', array($this, 'registerCustomTaxonomies') ) ;
    }


    public function registerCustomPostTypes() {
        
        //Slider home
        
        $labels = array(
            'name'               => __( 'Slider home', 'hello' ),
            'singular_name'      => __( 'Slider home', 'hello' ),
            'menu_name'          => __( 'Slider home', 'hello' ),
            'name_admin_bar'     => __( 'Slider home', 'hello' ),
            'add_new'            => __( 'Add slide', 'hello' ),
            'add_new_item'       => __( 'Add slide', 'hello' ),
            'new_item'           => __( 'Add slide', 'hello' ),
            'edit_item'          => __( 'Edit', 'hello' ),
            'view_item'          => __( 'Show', 'hello' ),
            'all_items'          => __( 'All', 'hello' ),
            'search_items'       => __( 'Search', 'hello' ),
            'parent_item_colon'  => __( 'Parent:', 'hello' ),
            'not_found'          => __( 'Not found.', 'hello' ),
            'not_found_in_trash' => __( 'Not found in trash', 'hello' )
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'taxonomies'         => array(),
            'rewrite'            => array( 'slug' => 'slider' ),
            'capability_type'    => 'post',
            'menu_icon'          => 'dashicons-slides',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title')
        );

        register_post_type( 'slider', $args );
        
        //Download
        
        $labels = array(
            'name'               => __( 'Download', 'hello' ),
            'singular_name'      => __( 'Download', 'hello' ),
            'menu_name'          => __( 'Download', 'hello' ),
            'name_admin_bar'     => __( 'Download', 'hello' ),
            'add_new'            => __( 'Add item', 'hello' ),
            'add_new_item'       => __( 'Add item', 'hello' ),
            'new_item'           => __( 'Add item', 'hello' ),
            'edit_item'          => __( 'Edit', 'hello' ),
            'view_item'          => __( 'Show', 'hello' ),
            'all_items'          => __( 'All', 'hello' ),
            'search_items'       => __( 'Search', 'hello' ),
            'parent_item_colon'  => __( 'Parent:', 'hello' ),
            'not_found'          => __( 'Not found.', 'hello' ),
            'not_found_in_trash' => __( 'Not found in trash', 'hello' )
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'taxonomies'         => array(),
            'rewrite'            => array( 'slug' => 'freefiles' ),
            'capability_type'    => 'post',
            'menu_icon'          => 'dashicons-download',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title')
        );

        register_post_type( 'download', $args );
     
        //Products
        
        $labels = array(
            'name'               => __( 'Products', 'hello' ),
            'singular_name'      => __( 'Products', 'hello' ),
            'menu_name'          => __( 'Products', 'hello' ),
            'name_admin_bar'     => __( 'Products', 'hello' ),
            'add_new'            => __( 'Add product', 'hello' ),
            'add_new_item'       => __( 'Add product', 'hello' ),
            'new_item'           => __( 'Add product', 'hello' ),
            'edit_item'          => __( 'Edit', 'hello' ),
            'view_item'          => __( 'Show', 'hello' ),
            'all_items'          => __( 'All', 'hello' ),
            'search_items'       => __( 'Search', 'hello' ),
            'parent_item_colon'  => __( 'Parent:', 'hello' ),
            'not_found'          => __( 'Not found.', 'hello' ),
            'not_found_in_trash' => __( 'Not found in trash', 'hello' )
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'taxonomies'         => array(),
            'rewrite'            => array( 'slug' => 'product' ),
            'capability_type'    => 'post',
            'menu_icon'          => 'dashicons-book',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt')
        );

        register_post_type( 'dictionary', $args );
     
    }
    
    public function registerCustomTaxonomies() {
        $labels = array(
		'name'              => __( 'Languages'),
		'singular_name'     => __( 'Languages'),
		'search_items'      => __( 'Search' ),
		'all_items'         => __( 'All' ),
		'parent_item'       => __( 'Parent' ),
		'parent_item_colon' => __( 'Parent:' ),
		'edit_item'         => __( 'Edit' ),
		'update_item'       => __( 'Update' ),
		'add_new_item'      => __( 'Add new' ),
		'new_item_name'     => __( 'Add new' ),
		'menu_name'         => __( 'Languages' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'languages' ),
	);

	register_taxonomy( 'languages', array( 'dictionary' ), $args );

        $labels = array(
		'name'              => __( 'Destinations'),
		'singular_name'     => __( 'Destinations'),
		'search_items'      => __( 'Search' ),
		'all_items'         => __( 'All' ),
		'parent_item'       => __( 'Parent' ),
		'parent_item_colon' => __( 'Parent:' ),
		'edit_item'         => __( 'Edit' ),
		'update_item'       => __( 'Update' ),
		'add_new_item'      => __( 'Add new' ),
		'new_item_name'     => __( 'Add new' ),
		'menu_name'         => __( 'Destinations' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'destinations' ),
	);

	register_taxonomy( 'destinations', array( 'dictionary' ), $args );
        
        $labels = array(
		'name'              => __( 'Series'),
		'singular_name'     => __( 'Series'),
		'search_items'      => __( 'Search' ),
		'all_items'         => __( 'All' ),
		'parent_item'       => __( 'Parent' ),
		'parent_item_colon' => __( 'Parent:' ),
		'edit_item'         => __( 'Edit' ),
		'update_item'       => __( 'Update' ),
		'add_new_item'      => __( 'Add new' ),
		'new_item_name'     => __( 'Add new' ),
		'menu_name'         => __( 'Series' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'series' ),//!!
	);

	register_taxonomy( 'series', array( 'dictionary' ), $args );
        
        $labels = array(
		'name'              => __( 'Categories'),
		'singular_name'     => __( 'Categories'),
		'search_items'      => __( 'Categories' ),
		'all_items'         => __( 'All' ),
		'parent_item'       => __( 'Parent' ),
		'parent_item_colon' => __( 'Parent:' ),
		'edit_item'         => __( 'Edit' ),
		'update_item'       => __( 'Update' ),
		'add_new_item'      => __( 'Add new' ),
		'new_item_name'     => __( 'Add new' ),
		'menu_name'         => __( 'Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'downloadcat' ),
	);

	register_taxonomy( 'downloadcat', array( 'download' ), $args );
    }
}