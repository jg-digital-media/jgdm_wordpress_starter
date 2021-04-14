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


/**
 * 
 * Custom Post Type in Code
 */


//Function for creating a "Movies" custom post type
function create_post_type() {

    register_post_type ( 

        //Generating Custom Post Type options
        'movies', 
        array(
            'labels' => array ( 
                'name' => __( 'My Movies (Code)' ), 
                'singular_name' => __( 'Movie (Code)' ),
                'add_new_item' => __( 'Add New Movie (Code)' ),
                'all_items' => __( 'All Movies (Code)' ) 
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'movies'),
            'show_in_rest' => true,
        )
   );  
}

//Hook to initial theme setup
add_action( 'init', 'create_post_type' );


//Custom fields in code
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_605dc183dfdf7',
        'title' => 'Movie Details - Custom Fields in Code',
        'fields' => array(
            array(
                'key' => 'field_605dc1eaac82d',
                'label' => 'Movie Name in Code',
                'name' => 'movie_field_in_code',
                'type' => 'text',
                'instructions' => 'Enter the name of your movie - in Code.',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),

            //field 2
            array(
                'key' => 'field_2',
                'label' => 'Custom Field 2 Code',
                'name' => 'movie_field_in_code_two',
                'type' => 'text',
                'instructions' => 'Enter the value for 2nd custom code',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),

        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'movies',
                ),
            ),
        ),
        
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;



function create_post_type_example() {

    register_post_type ( 

        //Generating Custom Post Type options
        'custom_post', 
        array(
            'labels' => array ( 
                'name' => __( 'My Custom Posts' ), 
                'singular_name' => __( 'Custom Post' ), 
                'add_new_item' => __( 'Add New Custom Post Code' ),
                'add_new' => __( 'Add New Custom Post Code' ), 
                'all_items' => __( 'All Custom Posts Code' ) 
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'custom_post'),
            'show_in_rest' => true,
        )

    );
}

//Hook to initial theme setup
add_action( 'init', 'create_post_type_example' );


//"Example Fields" - Field Group
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_605c792b2640e',
        'title' => 'Example Field Group',
        'fields' => array(
            array(
                'key' => 'field_605c794ba3c91',
                'label' => 'Example Field 1',
                'name' => 'example_field_1',
                'type' => 'text',
                'instructions' => 'Instructional information for your custom post field. #1',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_605c79e1a3c92',
                'label' => 'Text Area #2',
                'name' => 'example_field_2',
                'type' => 'textarea',
                'instructions' => 'Instructional information for your custom post field. #2',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_605c7a25b9f97',
                'label' => 'Select Area #3',
                'name' => 'example_field_3',
                'type' => 'select',
                'instructions' => 'Instructional information for your custom post field. #3',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'option 1' => 'Option 1',
                    'option 2' => 'Option 2',
                    'option 3' => 'Option 3',
                ),
                'default_value' => false,
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_605c7accb9f98',
                'label' => 'Example Field 4 - Image',
                'name' => 'example_field_4',
                'type' => 'image',
                'instructions' => 'Instructional information for your custom post field. #4',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'large',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_605dcb1061032',
                'label' => 'Example Field 5',
                'name' => 'example_field_5',
                'type' => 'radio',
                'instructions' => 'Instructional information for your custom post field. #5',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'On' => 'Choice 1',
                    'Off' => 'Choice 2',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_605dcb5699c19',
                'label' => 'Example Field 6',
                'name' => 'example_field_6',
                'type' => 'number',
                'instructions' => 'Instructional information for your custom post field. #6',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'custom_post',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    endif;