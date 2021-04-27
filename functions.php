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


/**
 * 
 * Customisation of Admin Area
*/

//Custom login page
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo-login.png);
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


//Enqueue a Login Stylesheet
function login_screen_style() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/assets/styles/style-login.css' );
    wp_enqueue_script( 'custom-login', get_template_directory_uri() . '/assets/scripts/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'login_screen_style' );

    
//Hide/Remove Menu Items
function custom_menu_page_removing() {

    // remove_menu_page( $menu_slug );  

    //remove_menu_page( 'edit.php' );                                   // Hides Post Page Menu    
    //remove_menu_page( 'upload.php' );                                 // Hides Media Menu  
    //remove_menu_page( 'edit.php?post_type=page' );                    // Hides Page Menu
    //remove_menu_page( 'edit-comments.php' );                          // Hides Comments Menu 
    //remove_menu_page( 'index.php' );                                  // Admin Area Dashboard button
    //remove_menu_page( 'plugins.php' );                                // Hides Plugins Page
    //remove_menu_page( 'widgets.php' );                                // Hides Widgets Page                            
    //remove_menu_page( 'themes.php' );                                 // Hides Appearance Menu
    //remove_menu_page( 'users.php' );                                  // Hides User Roles page
    //remove_menu_page( 'tools.php' );                                  // Hides Admin Area Tools Page 
    //remove_menu_page( 'options-general.php' );                        // Hides Settings Menus  
    remove_menu_page( 'customize.php' );                                // Hides WordPress Theme Customizer
    remove_menu_page( 'nav-menus.php' );                              // Hides Nav Menus
    remove_menu_page( 'theme-editor.php' );                           // Hides Theme editor

    //remove_menu_page( 'edit.php?post_type=acf-field-group' );         // hide individual plugin  
    //remove_menu_page( 'edit.php?post_type=custom_post' );             // "custom post" custom post type
    //remove_menu_page( 'edit.php?post_type=movies' );                  // movies custom post type


    //remove_menu_page( 'admin.php?page=cptui_manage_post_types' );     // ""
    //remove_menu_page( 'admin.php?page=cptui_manage_post_types' );     // "" 

}

add_action( 'admin_menu', 'custom_menu_page_removing' );


//Hide/Removes Menu Sub items;
function wpdocs_adjust_the_wp_menu() {

    //themes - appearance menu
    //$page = remove_submenu_page( 'themes.php', 'widgets.php' );
    $page = remove_submenu_page( 'themes.php', 'customize.php' );
    $page = remove_submenu_page( 'themes.php', 'customize.php?return=%2Fwp-admin%2Findex.php' );
    $page = remove_submenu_page( 'themes.php', 'nav-menus.php' );
    $page = remove_submenu_page( 'themes.php', 'theme-editor.php' );

    //settings menu
    remove_submenu_page( 'options-general.php', 'options-discussion.php' );
    remove_submenu_page( 'options-general.php', 'options-writing.php' );
    remove_submenu_page( 'options-general.php', 'options-reading.php' );
    remove_submenu_page( 'options-general.php', 'options-media.php' );
    remove_submenu_page( 'options-general.php', 'options-permalink.php' );
    remove_submenu_page( 'options-general.php', 'options-privacy.php' );

    //users
    remove_submenu_page( 'users.php', 'user-new.php' );
    remove_submenu_page( 'users.php', 'profile.php' );

    //plugins
    remove_submenu_page( 'plugins.php', 'plugin-install.php' );
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );


    // $page[0] is the menu title
    // $page[1] is the minimum level or capability required
    // $page[2] is the URL to the item's file
}

add_action( 'admin_menu', 'wpdocs_adjust_the_wp_menu', 999 );

//Custom menu order for Admin area
function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
    return array(

        'edit.php',
        'edit.php',                       
        'upload.php',    
        'edit.php?post_type=page', 
        'edit-comments.php',          
        'index.php',                         
        'plugins.php',              
        'widgets.php',                            
        'themes.php',                  
        'users.php',                   
        'tools.php',                          
        'options-general.php', 
        'index.php',         
    );
}

add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');


/**
 * 
 * Add a Dashboard Widget
 */

 // Add Custom Dashboard Widget
function add_custom_dashboard_widgets() {

    wp_add_dashboard_widget(
	    'wpexplorer_dashboard_widget', // Widget slug.
	    'My Custom Dashboard Widget', // Title.
	    'custom_dashboard_widget_content' // Display function.
        );
    }

	add_action( 'wp_dashboard_setup', 'add_custom_dashboard_widgets' );


/*
*
* Create the function to output the contents of your Dashboard Widget.
*/

	function custom_dashboard_widget_content() {
	    // Display whatever it is you want to show.
	    echo "WordPress Project Starter: Version 2.4.4 - Creating a child theme";
	}


/**
 * 
 * Child Theme Creation
 */

 //+ Child theme name: ```jgdm_wordpress_starter-child```

 
/**
 * 
 * Remove Dashboard Widgets
 */

 // Remove dashboard widgets
function remove_dashboard_meta() {
	if ( ! current_user_can( 'manage_options' ) ) {
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
	}
}
add_action( 'admin_init', 'remove_dashboard_meta' ); 
