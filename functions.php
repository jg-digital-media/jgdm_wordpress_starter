<?php 

/**
 * 
 * Add Theme Supports 
 */

add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats' );
add_theme_support( 'menus' );
add_theme_support( 'widgets' );


/**
 * 
 * Apply Styling
 */


function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


/**
 * 
 * Apply Theme Scripts
 */

function enqueue_scripts() {
    wp_enqueue_script( 'main_app_script', get_template_directory_uri() . '/assets/scripts/app.js' );
    
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

/**
 * 
 * Menus 
 */

function register_theme_menus() {
    register_nav_menus(
        array(

            'main_menu' => __('Main Menu'),
            
        )
    );
    
}

//when wordpress is initialising, call the above function
add_action('init', 'register_theme_menus');




/**
 *
 * Theme Widget areas
 */
function widget_area_one() {

	register_sidebar( array(
		'name'          => 'Search',
        'id'            => 'widgetarea_search',
        'description'   => 'Search Widget Area'
		//'before_widget' => '<div>',
		//..'after_widget'  => '</div>',
		//'before_title'  => '<h2 class="rounded">',
		//'after_title'   => '</h2>',
	) );

}

add_action( 'widgets_init', 'widget_area_one' );
?>




<?php

/**
 * 
 * Display Pagination Links
 */

/* 
the_posts_pagination( array(
    'mid_size'  => 2,
    'prev_text' => __( 'Back', 'wordpress_starter_theme' ),
    'next_text' => __( 'Onward', 'wordpress_starter_theme' ),
) );

function jgdm_wordpress_pagination(){
    global $wp_query; 
    echo paginate_links();
}

add_action( 'init', 'jgdm_wordpress_pagination' );
apply_filters( 'paginate_links', $link ); */

?>
