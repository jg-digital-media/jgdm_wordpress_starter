# Setting up your WordPress theme.  - **Last Update:** 14-04-2021 - 13:50


+ **Theme Name:**: JGDM WordPress Starter Repository
+ **Theme Slug**: jgdm_wordpress_starter
+ **Version**: v2.3
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

+ Each WordPress theme requires at least an **index.php**, a **functions.php**, a **style.css** and a **screenshot.png**. 

+ You will need a local server via localhost or a public web host in order to house your WordPress website.

+ You will need to set up a backend database to power your unique/dynamic content; store your plugins and set up your themes.

+ Feel free to switch out the included **screenshot.png** file with your own theme image of **800px** width and **600px** height.

+ Blog pages are currently show at most **40** pages on my installaton. You an change this setting via ```Settings ----> Reading``` in the Admin area.

### Templates to page

Assign WordPress Pages to the following Template files.

+ archive.php
+ author.php
+ search.php
+ custom_post.php
+ home.php
+ page.php

Templates are assigned in template files using the following comment steucture

```php
/*
 Template Name:  Template Identifier Goes Here!
*/
```

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
+ functions.php
+ page.php 
+ front-page.php
+ articles.php 
+ single.php 
+ single-custom_post.php
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

+ Reading:  http://localhost/wordpress/subdomain/articles/ - "Homepage" setting on "Readings" page is set up to display the "latest posts"
+ Archive Pages:  The Theme's archive.php template requires a page with a ```archive/``` slug.
+ Author Pages:  The theme's author.php template requires ```the_author_posts_link(); ``` to link to the posts author. a page with a ```author/``` slug. At this time there is no template file for a specific author.
+ Add your own theme image by swapping out your theme's ```screenshot.png``` file.


# Code Snippets
[Back to Top](#sections)

## Template Hierarchy

WordPress templates have an order of preference for Dynamic content that is used known as the Template Hierarchy.

```php
// Content to go here


```

## WordPress Loops

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

```html
    <?php $main_post_list = new WP_Query(array( 'post_type'=>'post' )); ?>

    <?php if ( $main_post_list->have_posts() ) : while ( $main_post_list->have_posts() ) : $main_post_list->the_post(); ?>

        <li><a href="<?php the_permalink(); ?>" class="post_list_item"><?php the_title(); ?></a></li> 

    <?php endwhile; else: ?>

        <?php echo "No Article data"; ?>

    <?php endif;  ?>  

```

###  Post Pagination

```html
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

+  Place the code snippet below somewhere in the PHP markup according to your design needs. 

```php
 dynamic_sidebar( "widgetarea_search" );
```



## Search

+ Use the WordPress loop to generate the dynamic content needed to display search results. 

+ By Default, this seems to display page results as well as post results.

+ Search Exclude as one way to filter what post formats are returned by WordPress Search - https://wordpress.org/plugins/search-exclude/ 


```php

//Standard WordPress loop
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <?php endwhile; else: ?>

 <?php endif; ?>

```

### WordPress loop for pagination with WP Query

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

<?php 
 
    //wordpress method to display search form
    <p> <?php get_search_form(); ?> </p>

 ?>
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

+ **Crayon Syntax Highlighter** - Version 2.8.4 | By Aram Kocharyan 
+ **Akismet Anti-Spam** - Version 4.1.9 | By Automattic 
+ **Yoast SEO** - Version 16.0.2 | By Team Yoast  
+ **Advanced Custom Fields** - Version 5.9.5 | By Elliot Condon  
+ **Custom Post Type UI** - Version 1.8.2 | By WebDevStudios 
+ **Maintenance Mode Free** - Version 1.2 | By ShapedPlugin 

## Pagination 

+ e.g. page/3

The log frontpage template must be the one that is showing up as the post page... the page according to the WordPress Admin area that has the default collection of WordPress posts. 

+ ```paginate_links()```  - this seeems to be showing some numbered pagination. It generates the following classes in WordPress output. .prev .next .page-numbers For the purposes for CSS, page number as generated by the markup output comes before the .pre and .next classes in the order of preference.

+ ```posts_nav_link()```  - does not seem to generate its own classes. So feel free to surround these with your own.

likewise for ```next_post_link()``` and ```previous_post_link()```

+ e.g.

```php
<?php 

  <div class="next"> <?php next_post_link( '%link','Newer' ); ?> </div>  

    <span>Post Nav</span>

    <div class="last"> <?php previous_post_link( '%link', 'Older' ); ?> </div>  
?>
```


## Custom Post Types

### As it stands this theme uses the Custom Post Type UI and Advanced Custom Fields plugins to use Custom Post Types. You will need to download these plugins in your WordPress installation. The following information tels us how to create Custom Post Types in Code.


### You should fill in as a minimum
+ Post Type Slug:  custom_post
+ Plural Label:	 Custom Posts
+ Singular Label: Custom Post

Populate the other additional labels

The goal for later on is to learn to build up custom post types in code.  (register_post_type et all.)

Custom Post: - http://localhost/wordpress/subdomain/custom/  Which assumes a custom post type as a "slug" of Custom post.

### Register Post Type


+ This will create a "Movie" Custom Post Type.

+ The "Movie" Post Type will show up in field groups in your Advanced Custom Fields Plugin.

```php

<!--- Create a Custom Post Type -->
<?php
    //function for creating a custom post type
    function create_posttype() {

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
    add_action( 'init', 'create_posttype' );
```

### Coding Custom Fields


```php

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

# **Designed by** [Jonnie Grieve Digital Media](https://www.jonniegrieve.co.uk)

# To Come! 
[Back to Top](#sections)

...

## Data Backup

+ ```wp_subdomain``` - minimal option backup - contains post, custom post type and plugin information for import 
+ ```wp_subdomainv1``` - contains post, custom post type and plugin information for import 