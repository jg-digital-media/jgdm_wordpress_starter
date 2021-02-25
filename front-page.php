<?php

?>

<?php require("template-parts/header.php"); ?>

        <section class="primary">

            <p>front-page.php</p>

            <h2> <?php bloginfo("site_title"); ?> </h2>

            <p>This is the template that has no individual permalink and therefore serves as the site home page.</p>

            <hr />

            <p><a href="<?php echo get_site_url(); ?>/article" class="goto_page">Go to Articles List</a></p>

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

                <?php if ( $main_post_list->have_posts() ) : while ( $main_post_list->have_posts() ) : $main_post_list->the_post(); ?>

                    <li><a href="<?php the_permalink(); ?>" class="post_list_item"><?php the_title(); ?></a></li> 

                <?php endwhile; else: ?>

                    <?php echo "No Article data"; ?>

                <?php endif;  ?>   

            </ul>

            <!-- Pagination -->
            <div class="pagination">
                    
                <?php echo paginate_links(); ?>
                
                <p> <?php posts_nav_link(' || ','Previous Items','Next Items'); ?> </p>  

                <span> <?php previous_posts_link('&lt;&lt; Go to Previous Page'); ?> </span> 
                
                <span> <?php next_posts_link('Go to Next Page &gt;&gt;'); ?> </span> 

            </div>
                   
        </section>

<?php require("template-parts/footer.php"); ?>