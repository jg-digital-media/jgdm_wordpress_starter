<?php
/*

Template Name: Index Template

*/

?>

<?php require("template-parts/header.php"); ?>

        <section class="primary">

            <div class="filestamp">

                <p>index.php</p>
                
            </div>

            <h2>This is the index template.</h2>

            <p>This is where the catch all template lives and serves as a home page template. </p>

            <p><a href="<?php echo get_site_url(); ?>/article" class="goto_page">Go to Articles List</a></p>
            <p><a href="<?php echo get_site_url(); ?>/custom/">Custom Post Type.</a></p>

            <ul class="article_list"> 

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
                
                <?php endwhile; else : ?>

                    <p>Unfortunately there is no content to display Please add a new post or try a new search.</p>

                    <p> <?php get_search_form(); ?> </p>

                <?php endif; ?>

            </ul>
            
            <!-- Pagination -->
            <div class="pagination">
                    
                <?php echo paginate_links(); ?>
                
                <p> <?php posts_nav_link(' || ','Next Items','Previous Items'); ?> </p>  

                <span> <?php previous_posts_link('&lt;&lt; Go to Previous page'); ?> </span> 
                
                <span> <?php next_posts_link('Go to Next Page &gt;&gt;'); ?> </span> 

            </div>
            
        </section>

<?php require("template-parts/footer.php"); ?>