# Setting up your WordPress theme.  - **Last Update:** 16-02-2021

## This Repository contains the theme files you will need to help you get started building your own WordPress Theme

+ **Theme Name:** jgdm_wordpress_starter
+ **Updated** 16-02-2021 

## Version 1.0.0

## Setup: 

Link: http://localhost/wordpress/subdomain/ 

+ Your theme will need to be uploaded to a WordPress installation.

+ Each WordPress theme requests at least an **index.php**, a **functions.php**, a **style.css** file and a **screenshot.png**

+ You will need a local server via localhost or a public web host in order to house your WordPress website.

+ You will need to set up a backend database to power your unique/dynamic content.

+ Feel free to switch out the included screenshot.png file with your own theme image of 800px width and 600px height.

+ Blog pages show at most **40** pages. 


## Makeup and Theme Support.

+ The starter theme Uses Google Font: **Merriweather Sans**.

+ Theme Static Files Developed in SASS/CSS and HTML.

+ Theme built using PHP. 

+ Theme includes theme supports for the following
  + ```add_theme_support( 'post-thumbnails' );``` - For Featured Images
  + ```add_theme_support( 'post-formats' );``` - For Post Formats
  + ```add_theme_support( 'menus' );``` - For Theme Navigation Menus
  + ```add_theme_support( 'widgets' );``` - For Using WordPress widget areas and its range of widgets. 

## Template files included:

+ index.php 
+ page.php 
+ articles.php 
+ single.php 
+ archive.php 
+ autbor.php 
+ date.php 
+ search.php 
+ searchpage.php
+ 404.php
+ functions.php


## Loops

+ Use loops like this to display content from the WordPress Admin area

```php

<?php


    <!-- Start the Loop. -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>                
        
    <?php endwhile; else : ?>

        <p>Unfortunately there is no content to display Please add a new post or try a new search.</p>

        <p> <?php get_search_form(); ?> </p>

    <?php endif; ?>

?>

```

## Menus

+ in functions.php

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

+ Place your code somewhere on your website

```php

 <?php  
                    
    $main_menu = array(
        'container'=> false,
        'theme_location' => 'main_menu'

    );  wp_nav_menu($main_menu);  
    
?>
```

## Enqueuing Assets

+ Enqueue Scripts

```php

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

+  Place in code. 

```php
 dynamic_sidebar( "widgetarea_search" );
```



## Search
+  Use the WordPress loop to generate the dynamic content needed to display search results. 

```php

 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <?php endwhile; else: ?>

 <?php endif; ?>

```

+ get search form template - to generate search textbox and button

```php

<?php 
 
 <p> <?php get_search_form(); ?> </p>

 ?>
```

## Author and Archival Templates

+ For a list of authors (i.e. WordPress users) associated with the site. 
 
 ```php 

    <?php the_author_posts_link(); ?>

 ?>
 ```

+ Archives

```php

    <?php wp_get_archives('type=monthly'); ?>

```


## Recommended Plugins

+ **Crayon Syntax Highlighter** - Version 2.8.4 | By Aram Kocharyan | View details | Settings | Theme Editor | Donate
+ **Akismet ** - 
+ **Yoast** - 



## To come!

+ Pagination
+ Custom Post Types

## Pagination 

+
+


## Custom Post Types
+ 
+


# **Designed by** [Jonnie Grieve Digital Media](https://www.jonniegrieve.co.uk)
