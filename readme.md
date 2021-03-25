# Setting up your WordPress theme.  - **Last Update:** 26-02-2021 - 13:30pm


+ **Theme Name:**: JGDM WordPress Starter Repository
+ **Theme Slug**: jgdm_wordpress_starter
+ **Version**: v1 
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

```
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

###  WordPress Standard Loop

```php
<ul>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <li><a href="<?php the_permalink(); ?>" class="post_list_item"><?php the_title(); ?></a></li>

    <?php endwhile; else: ?>

        <?php echo "No Article data"; ?>

    <?php endif;  ?>    

</ul>     

```


###  Loop Alternative Syntax

```html
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

        <div class="next"> <?php echo next_posts_link( 'Older posts' ); ?> </div>  

        <div class="last"> <?php echo previous_posts_link( 'Newer posts' ); ?> </div>

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

+ By Default, this seems to display page results as well as post results.

+ Search Exclude as one way to filter what post formats are returned by WordPress Search - https://wordpress.org/plugins/search-exclude/ 

+ 

```php

//Standard WordPress loop
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <?php endwhile; else: ?>

 <?php endif; ?>

```

```php

//WordPress loop for pagination with WP Query
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

+ get_search_form() template - to generate WordPress search textbox and button

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

+ Archives

```php

    <?php wp_get_archives('type=monthly'); ?>

```


## Recommended Plugins

+ **Crayon Syntax Highlighter** - Version 2.8.4 | By Aram Kocharyan | View details | Settings | Theme Editor | Donate
+ **Akismet ** - 
+ **Yoast** - 


# To Come! 
[Back to Top](#sections)

+ Pagination
+ Custom Post Types

## Pagination 

+ e.g. page/3

The log frontpage template must be the one that is showing up as the post page... the page according to the WordPress Admin area that has the default collection of WordPress posts. 

+ ```paginate_links()```  - this seeems to be showing some numbered pagination. It generates the following classes in WordPress output. .prev .next .page-numbers For the purposes for CSS, page number as generated by the markup output comes before the .pre and .next classes in the order of preference.

+ ```posts_nav_link()```  - does not seem to generate it's own classes. So feel free to surround these with your own.

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

### As it stands this theme uses the Custom Post Type UI and Advanced Custom Fields plugins to run Custom Post Types. You will need to download these plugins in your WordPress installation.

### You should fill in as a minimum
+ Post Type Slug: 
+ Post Type Slug:
+ Plural Label:	
+ Singular Label:

Populate the other additional labels

Custom Post: - http://localhost/wordpress/subdomain/custom_post/custom-post/  Which assumes a custom post type as a "slug" of Custom post.

# **Designed by** [Jonnie Grieve Digital Media](https://www.jonniegrieve.co.uk)