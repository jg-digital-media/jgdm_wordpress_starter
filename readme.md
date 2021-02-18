# Setting up your WordPress theme.  - **Last Update:** 18-02-2021


+ **Theme Name:**: JGDM WordPress Starter Repository
+ **Theme Slug**: jgdm_wordpress_starter
+ **Version**: v1 
+ **Description**: This Repository contains the theme files you will need to help you get started building your own WordPress Theme. Use this to modify your themes for your own needs rather than starting from scratch.

[To Come](#to_come)

## Setup: 

Link: http://localhost/wordpress/subdomain/ 

+ Your theme will need to be uploaded to a WordPress installation via WordPress.org.

+ Each WordPress theme requires at least an **index.php**, a **functions.php**, a **style.css** and a **screenshot.png**. 

+ You will need a local server via localhost or a public web host in order to house your WordPress website.

+ You will need to set up a backend database to power your unique/dynamic content; store your plugins and set up your themes.

+ Feel free to switch out the included **screenshot.png** file with your own theme image of **800px** width and **600px** height.

+ Blog pages are currently show at most **40** pages on my installaton. You an change this setting via ```Settings ----> Reading``` in the Admin area.

## How the Design works

+ The Width of the Primary section with the class of ```.primary``` is set to 60%.  This gives it the appearance of a central placement on the browser.

+ However when you add the aside element with a class of ```.secondary```, this pushes the content to the left, giving the appearance of a 2-column layout.

## Makeup and Theme Support.

+ The starter theme Uses Google Font: **Merriweather Sans**.

+ The Theme static files Developed in SASS/CSS and HTML5.

+ Theme built using PHP with an empty JavaScript file included and equeued using ```functions.php```. 

+ Theme includes theme supports for the following
  + ```add_theme_support( 'post-thumbnails' );``` - For Featured Images
  + ```add_theme_support( 'post-formats' );``` - For Post Formats
  + ```add_theme_support( 'menus' );``` - For Theme Navigation Menus
  + ```add_theme_support( 'widgets' );``` - For Using WordPress widget areas and its range of widgets. 

## Template files included:

+ index.php 
+ page.php 
+ front-page.php
+ articles.php 
+ single.php 
+ archive.php 
+ autbor.php 
+ date.php 
+ search.php 
+ searchpage.php
+ 404.php
+ functions.php

```primary-content.php``` and ```secondary-content.php```are included as template parts as well as the Theme header and footer. 



# Code Snippets

## Template Hierarchy

WordPress templates have an order of preference for Dynamic content that is used known as the Template Hierarchy.

```
// Content to go here


```

## Loops

+ Use loops like this to display content from the WordPress Admin area

```php

<?php


    /* Start the Loop. */
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>                
        
    <?php endwhile; else : ?>

        /* Content to display when no page/post content is available. */
        <p>Unfortunately there is no content to display Please add a new post or try a new search.</p>

        <p> <?php get_search_form(); ?> </p>

    <?php endif; ?>

?>

```

## WordPress Menu Areas

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


<a href="#to_come"></a>
# To come! [To come](#to_come)

+ Pagination
+ Custom Post Types

## Pagination 

+
+


## Custom Post Types
+ 
+


# **Designed by** [Jonnie Grieve Digital Media](https://www.jonniegrieve.co.uk)
