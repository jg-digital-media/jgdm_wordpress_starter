# Setting up your WordPress theme.- **Last Update:** 06-09-2024 - 09:56

## Preview the Static Design Files - 

[Link target="_blank"](http://localhost/jgdm_wordpress_starter/assets/static_design_files/index.php)

## **Theme Details**

+ **Theme Name:**: JGDM WordPress Starter Repository
+ **Theme Slug**: jgdm_wordpress_starter
+ **Theme Version**: v2.5.0
+ **Description**: This Repository contains the theme files you will need to help you get started building your own WordPress Theme. Use this to modify your themes for your own needs rather than starting from scratch.

## **Sections**

  + [Setup](#setup)

  + [Customising the Theme](#customising-the-theme)

  + [Code Snippets](#code-snippets)

  + [To Come](#to-come)

### **Setup:**
[Back to Top](#sections)

#### Link: http://localhost/wordpress/subdomain/ | Repo: https://github.com/jg-digital-media/jgdm_wordpress_starter/blob/master/functions.php

+ Your theme will need to be uploaded to a WordPress installation via WordPress.org.

+ You will need to set up a backend database to power your unique/dynamic content; store your plugins and set up your themes.

+ Each WordPress theme requires at least an **index.php**, a **functions.php**, a **style.css** and a **screenshot.png**. 

+ If you wish, you can use the SASS precompiler to generate your theme styles style.css. If you are using SASS, the watch command in your command line tool is `sass --watch style.scss:style.css` in the project root directory.

+ Each WordPress plugin requires its own directory, php file of the same name and should be included in the ```wp-content/plugins``` directory of a WordPress installation.

+ You will need a local server via localhost or a public web host in order to store your WordPress website.

+ Feel free to switch out the included **screenshot.png** file with your own theme image of **800px** width and **600px** height.

+ Theme contains one editable menu in a specific menu area/location. 

+ Blog pages are currently set show at most **1** page(s) on my installation. You can change this setting via ```Settings ----> Reading``` page in the Admin area.

+ The child and parent theme should be located in the ```wp-content/themes``` directory of a WordPress installation.

+ Create some standard Wordpress Posts via the admin area, ```Dashboard -> Posts``` which will appear in front-page.page, home.php and article.php templates.

+ Assign WordPress Pages to the following Template files. ```Dashboard -> Pages```

  + archive.php
  + author.php
  + search.php
  + custom_post.php
  + home.php
  + page.php

### Templates are assigned in template files using the following comment structure

```php
/*
 Template Name:  Template Identifier Goes Here!
*/
```

Look for the template in the "page attributes" tab in ghe admin area for the specific WordPress page.

### How the Design works

+ The Width of the Primary section with the class of ```.primary``` is set to 60%.  This gives it the appearance of a central placement on the browser.

+ However when you add the aside element with a class of ```.secondary```, this pushes the content to the left, giving the appearance of a 2-column layout.

### Makeup and Theme Support.

+ The starter theme Uses Google Font: **Merriweather Sans**.

+ The Theme static files Developed in SASS/CSS and HTML5.

+ Theme built using PHP with an empty JavaScript file included and enqueued using ```functions.php```. 

+ Theme includes theme supports for the following
  + ```add_theme_support( 'post-thumbnails' );``` - For Featured Images
  + ```add_theme_support( 'post-formats' );``` - For Post Formats
  + ```add_theme_support( 'menus' );``` - For Theme Navigation Menus
  + ```add_theme_support( 'widgets' );``` - For Using WordPress widget areas and its range of widgets. 

### Template files included:

+ index.php
+ home.php 
+ functions.php
+ page.php 
+ front-page.php
+ articles.php 
+ single.php 
+ single-custom_post.php
+ custom_post.php
+ archive.php 
+ author.php 
+ date.php 
+ search.php 
+ searchpage.php
+ 404.php

```primary-content.php``` and ```secondary-content.php```are included as template parts as well as the Theme header and footer. 

# Customising the Theme
[Back to Top](#sections)

How to customise your theme.

+ Reading:  http://localhost/wordpress/subdomain/articles/ - The "`Homepage`" setting on "`Reading`" page of the admin area is set up to display the "latest posts" i.e. the Posts on the database.

+ Archive Pages:  The Theme's `archive.php` template requires a page with a ```archive/``` slug.

+ Author Pages:  The theme's `author.php` template requires ```the_author_posts_link(); ``` to link to the posts author. a page with a ```author/``` slug. At this time there is no template file for a specific author.

+ Add your own WordPress Theme image by swapping out your theme's ```screenshot.png``` file and placing it in the themes root level.

+ The menu is assigned to the menu slug ```"main_menu"```.

+ Plugin directories should be added to the ```wp-content/plugins``` folder in your WordPress installation. As an example' a directory called ```jgdm-plugin-dev``` which at minimum should contain ```jgdm-plugin.dev.php``` as the main PHP file.

# Code Snippets
[Back to Top](#sections)

+ Template Hierarchy
+ Creating a Child Theme
+ WordPress Loops
+ WP Query
+ Post Pagination
+ WordPress Menu Areas
+ Widget Areas
+ Pagination
+ Search
+ Author and Archival Templates

## Template Hierarchy

WordPress templates have an order of preference for Dynamic content that is used known as the Template Hierarchy.

A Link to the latest Template Hierarchy - https://developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png

## Creating a Child Theme

+ Per the Wordpress developer documentation, *"Using a child theme lets you upgrade the parent theme without affecting the customizations you’ve made to your WordPress site."*

1. Create a folder for the child theme

2. Create and use a style.css for child theme

3. Create functions.php 

4. Make sure child theme loads the styling of the parent theme.

5. Activate Child Theme

A Child Theme should go in the same folder as the the rest of your themes (i.e. ```wp-content/themes```)

Create a ```style.css``` for your child theme.

```css

/*
Theme Name: Twenty Fifteen Child
Theme URI: http://example.com/twenty-fifteen-child/
description: Twenty Fifteen Child Theme
Author: John Doe
Author URI: http://example.com
Template: twentyfifteen
Version: 1.0.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: light, dark, two-columns, right-sidebar, responsive-layout, accessibility-ready
Text Domain: twenty-fifteen-child
*/

```

To inherit the styles from the parent theme

```css
@import url("../twentyfifteen/style.css");
```

or a function like this

```php

    <?php

    function myprefix_theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    }

    add_action( 'wp_enqueue_scripts', 'myprefix_theme_enqueue_styles' ); 


```

## WordPress Loops

+ Use loops like this to display content from the WordPress Admin area

```php

    <!-- Start the Loop. -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>                
        
    <?php endwhile; else : ?>

        <!-- Content to display when no page/post content is available. -->
        <p>Unfortunately there is no content to display Please add a new post or try a new search.</p>

        <p> <?php get_search_form(); ?> </p>

    <?php endif; ?>


```

## **Loop Syntax Examples**

### WordPress Standard Loop

```php
<ul>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <li><a href="<?php the_permalink(); ?>" class="post_list_item"><?php the_title(); ?></a></li>

    <?php endwhile; else: ?>

        <?php echo "No Article data"; ?>

    <?php endif;  ?>    

</ul>     

```


### Loop Alternative Syntax

```php
    <!-- Start the Loop. -->
    <?php if ( have_posts() ) : ?>

    <!-- Add the pagination functions here. -->


    <!-- Start of the main loop. -->
    <?php while ( have_posts() ) : the_post(); ?>

        <li><a href="<?php the_permalink(); ?>" class="post_list_item"><?php the_title(); ?></a></li> 
        
        <?php posts_nav_link(); ?>

    <?php endwhile; ?>

    <!-- Pagination -->
    <div class="navigation">
        
        <?php echo paginate_links(); ?>
        
        <p> <?php posts_nav_link(' >> ','prelabel','nextlabel'); ?> </p>  

        <?php posts_nav_link(); ?>

        <div class="next"> <?php echo next_post_link( 'Older posts' ); ?> </div>  

        <div class="last"> <?php echo previous_post_link( 'Newer posts' ); ?> </div>

    </div>

    <?php else : ?>

        <p>Loop endif - no loop content</p>

    
    <?php endif; ?>  

```


### WordPress Loop - WP Query

```php
    <?php $main_post_list = new WP_Query(array( 'post_type'=>'post' )); ?>

    <?php if ( $main_post_list->have_posts() ) : while ( $main_post_list->have_posts() ) : $main_post_list->the_post(); ?>

        <li><a href="<?php the_permalink(); ?>" class="post_list_item"><?php the_title(); ?></a></li> 

    <?php endwhile; else: ?>

        <?php echo "No Article data"; ?>

    <?php endif;  ?>  

```

###  Post Pagination (WordPress Core)

+ **Important:** Pagination functions work on the main WordPress core query, not the custom query.

+ The pagination in this theme has been tested for reading settings that make for a ```front-page.php``` or a ```home.php``` template (i.e. "your latest posts" or "a static page")

+ On the article page I've given a list of up to 50.   And I removed the red border for the pagination area since no pagination works on this custom template.

+ Posts per page option in template code file overrides the admin area setting.  ``` settings ----> reading```

+ If a homepage has not been selected, home.php is the pagination page while the articles.php template shows the full article list

```php
    <!-- Pagination -->
    <div class="navigation">
        
        <?php echo paginate_links(); ?>
        
        <p> <?php posts_nav_link(' >> ','prelabel','nextlabel'); ?> </p>  

        <div class=""> <?php next_posts_link( 'Older posts' ); ?> </div>



        <div class=""> <?php previous_posts_link( 'Newer posts' ); ?> </div>

    </div> 
```

## WordPress Menu Areas

+ Add the code below in functions.php

```php
<?php

function register_theme_menus() {
    register_nav_menus(
        array(

            'main_menu' => __('Main Menu'),
            
        )
    );
    
}

?>
```

+ Place this PHP code somewhere on your website markup (which could be your ```index.php``` or ```page.php``` template file)

```php

 <?php  
                    
    $main_menu = array(
        'container'=> false,
        'theme_location' => 'main_menu'

    );  wp_nav_menu($main_menu);  
    
?>
```

## Enqueuing Assets into your theme

+ Enqueue Scripts

```php

    <?php
    /**
     * 
     * Apply Theme Scripts
     */

    function enqueue_scripts() {
        wp_enqueue_script( 'main_app_script', get_template_directory_uri() . '/assets/scripts/app.js' );

    }

    add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
```

+ Enqueue Styles

```php

<?php
    /**
     * 
     * Apply Styling
     */

    function theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

    }

    add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
```

##  Widget Areas

+ Widgets Generation  - Create a Widget Area in functions.php

```php
<?php

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

```

+  Place the code snippet below somewhere in the PHP markup according to your design needs. 

```php
 dynamic_sidebar( "widgetarea_search" );
```



## Search

+ Use the WordPress loop to generate the dynamic content needed to display search results. 

+ By Default, this seems to display page results as well as post results.

+ Search Exclude Plugin as one way to filter what post formats are returned by WordPress Search - https://wordpress.org/plugins/search-exclude/ 


```php

//Standard WordPress loop
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <?php endwhile; else: ?>

 <?php endif; ?>

```

### WordPress Loop for pagination with WP Query

+ *This repository will be fixed to reflect pagination on the main query rather than a custom query*

```php

<?php 
                
    //Protect against arbitrary paged values
    //$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1; 
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $main_post_list = new WP_Query(
            array( 
                'post_type'=>'post',
                'posts_per_page' => 10,
                'paged'=> $paged
                )
            ); 
?>

<!-- Start the Loop. -->
<?php if ( $main_post_list->have_posts() ) : while ( $main_post_list->have_posts() ) : $main_post_list->the_post(); ?>

    <li><a href="<?php the_permalink(); ?>" class="post_list_item"><?php the_title(); ?></a></li> 

<?php endwhile; else: ?>

    <?php echo "No Article data"; ?>

<?php endif;  ?>   

```

+ ```get_search_form()``` template - to generate WordPress search text box and button functionality.

```php
 
    <!-- WordPress method to display search form -->
    <p> <?php get_search_form(); ?> </p>


```

## Author and Archival Templates

+ For a list of authors (i.e. WordPress users) associated with the site. 
 
 ```php 

    <?php the_author_posts_link(); ?>

 ?>
 ```

+ Monthly Archives

```php

    <?php wp_get_archives('type=monthly'); ?>

```


## Recommended WordPress Plugins


+ **Akismet Anti-Spam** - Version 4.1.9 | By Automattic 
+ **Yoast SEO** - Version 16.0.2 | By Team Yoast  
+ **Advanced Custom Fields** - Version 5.9.5 | By Elliot Condon  
+ **Custom Post Type UI** - Version 1.9.1 | By WebDevStudios
+ **Crayon Syntax Highlighter** - Version 2.8.4 | By Aram Kocharyan  - check 
+ **Maintenance Mode Free** - Version 1.2 | By ShapedPlugin 
+ **Code Syntax Block** - Version 2.0.3  By Marcus Kazmierczak 


## Pagination 

+ ```the_posts_pagination()``` - used for numerical pagination

```php

//code


```

+ ```posts_nav_link()``` - generates links to next and previous page of WordPress Posts.   

```php

//code


```

+ ```paginate_links()``` - Supports older installations of WordPress


```php

//code


```

+ ```previous_post_link();```
+ ```next_post_link();``` 


```php
<?php 

  <div class="next"> <?php next_post_link( '%link','Newer' ); ?> </div>  

    <span>Post Nav</span>

    <div class="last"> <?php previous_post_link( '%link', 'Older' ); ?> </div>  
?>
```


## Custom Post Types

+ As it stands this theme uses the Custom Post Type UI and Advanced Custom Fields plugins to use Custom Post Types. You will need to download these plugins in your WordPress installation. 

  + You should fill in as a minimum
    + Post Type Slug:  custom_post
    + Plural Label:	 Custom Posts
    + Singular Label: Custom Post

+ The following information tells us how to create Custom Post Types in Code.


### Register Post Type: ```register_post_type()```

+ This will create a "Movie" Custom Post Type.

+ The "Movie" Post Type will show up in field groups in your Advanced Custom Fields Plugin.

```php

<!--- Create a Custom Post Type -->
<?php
    //function for creating a custom post type
    function create_post_type() {

        register_post_type ( 

            //Generating Custom Post Type options
            'movies', 
            array(
                'labels' => array( 
                    'name' => __( 'Movie' ), 
                    'singular_name' => __( 'Movie' ) 
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
```

### Coding Custom Fields


```php
    <?php
    //Custom fields in code
    if( function_exists('acf_add_local_field_group') ):
        
        acf_add_local_field_group( array (

            //custom fields in code            
            'key' => 'group_605dc183dfdf7',
            'title' => 'Movie Details',
            'fields' => array(),
            'location' => array(),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',


        ))
    }

    endif;

```

```php

<?php
 //custom fields
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

        //field 2 in code
        array(
            'key' => 'field_2_key',
            'label' => 'Example Field 2',
            'name' => 'example_field_2',
            'type' => 'text',
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
            'prepend' => '',
            'append' => '',
            'maxlength' => '',),
)

```

## Customise Admin Area


+ Usually, the client journey begins before they come to the dashboard, at the login page. For that reason, it’s only good and proper to start our customization here

+ For example, if you would like to change the WordPress logo on the standard login page to something else, you can do so with the following piece of code:

Source Material: [https://torquemag.io/2016/08/customize-wordpress-backend-clients/](https://torquemag.io/2016/08/customize-wordpress-backend-clients/)

+  Customize the Login Page


```php
<?php function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/login-logo.png);
            padding-bottom: 30px;
        }
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'my_login_logo' );
```

+ Enqueue a Login Stylesheet

```php

<?php 
    function my_login_stylesheet() {
        wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/style-login.css' );
        wp_enqueue_script( 'custom-login', get_template_directory_uri() . '/style-login.js' );
    }
    add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
```

+ Hide/Remove Menu Elements

```php

    <?php 
    //Hide/Remove Menu Items
    function custom_menu_page_removing() {
        // remove_menu_page( $menu_slug );

        //remove_menu_page( 'index.php' );  
    } 

    add_action( 'admin_menu', 'custom_menu_page_removing' );


    remove_menu_page( 'index.php' );
    remove_menu_page( 'plugins.php' );

```
+ Hide and Remove Sub Menus

```php
    <?php 
    function wpdocs_adjust_the_wp_menu() {
        //themes - appearance menu
        $page = remove_submenu_page( 'themes.php', 'widgets.php' );

        }

        add_action( 'admin_menu', 'wpdocs_adjust_the_wp_menu', 999 );
```

+ Custom menu order for Admin area

```php
    <?php 
    function custom_menu_order($menu_ord) {
        if (!$menu_ord) return true;
        return array(

            'edit.php',
            //
        )
    }

```

## Plugin Development

```php
<?php 

/**
* Plugin Name: Name of Plugin
* Plugin URI: UTL of plugin goes here
* Description: Plugin details should go here
* Version: 1.0.0
* Author: Your name as the developer/author of the plugin to go here
* Author URI: Your URL
* License: GPL2
*/


//define( 'jgdm-plugin-dev', '1.0.0' );


/**
 * 
 *  
 * Store and Enqueue main Plugin Assets 
 ****/

$plugin_styling = plugins_url( 'app.css', 'jgdm-plugin-dev.php' );
$plugin_script = plugins_url( 'app.js', 'jgdm-plugin-dev.php' );

//returns full URL to myscript.js, such as example.com/wp-content/plugins/myplugin/myscript.js.

wp_enqueue_script( 'jgdm_plugin_script', $plugin_script, false, false, false );
wp_enqueue_style( 'jgdm_plugin_stylesheet', $plugin_styling, false, false, false );


/**
 * 
 * 
 * Plugin lifecycle hooks
 ****/

//activate plugin
function activate_jgdm_plugin() {

    //add_option( 'Activated_Plugin', 'Plugin-Slug' );
  
    /* activation code here */
    var_dump("activation function");
}
  
register_activation_hook( 'activate_jgdm-plugin-dev.php', 'activate_jgdm_plugin' );


//deactivate plugin
function deactivate_jgdm_plugin() {

    //add_option( 'Activated_Plugin', 'Plugin-Slug' );

    /* activation code here */
    var_dump("deactivation function");
}
  
register_activation_hook( 'deactivate_jgdm-plugin-dev.php', 'deactivate_jgdm_plugin' );


//hook to uninstall plugin
function jgdm_uninstall_plugin(){
    //register_uninstall_hook( 'jgdm-plugin-dev', 'jgdm_uninstall_plugin' );
    var_dump("uninstall function");
}

register_uninstall_hook('jgdm-plugin-dev', 'jgdm_uninstall_plugin');

```


+ For the plugin tied to this installation look for the ```jgdm-plugin-dev``` in the ```assets/plugin``` folder of this repository.

+ You should then upload the compressed zip folder to the ```wp-content/plugins``` folder of the WordPress installation you're using.


+ Add a Dashboard widget

```php

    <?php
    // Add Custom Dashboard Widget
    function add_custom_dashboard_widgets() {

        wp_add_dashboard_widget(
            'wpexplorer_dashboard_widget', // Widget slug.
            'My Custom Dashboard Widget', // Title.
            'custom_dashboard_widget_content' // Display function.
            );
        }

        add_action( 'wp_dashboard_setup', 'add_custom_dashboard_widgets' );

    /**
    * Create the function to output the contents of your Dashboard Widget.
    */

    function custom_dashboard_widget_content() {
    
        // Display whatever it is you want to show.
        echo "Hello there, I'm a Dashboard Widget. Edit me!";
    }

```


# To Come! 

[Back to Top](#sections)

+ Add Custom Dashboard Widget (in progress)
+ Code Syntax Formatting and displaying them in a WordPress Theme
+ WP Customizer API (in progress)
+ Plugin Development (in progress)


## Data Backup

+ ```wp_subdomain``` - minimal option backup - contains post, custom post type and plugin information for import 
+ ```wp_subdomainv1``` - contains post, custom post type and plugin information for import 


# **Written and Designed by** [Jonnie Grieve Digital Media](https://www.jonniegrieve.co.uk)