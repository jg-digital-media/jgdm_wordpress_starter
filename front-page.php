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

                <?php $main_post_list = new WP_Query(array( 'post_type'=>'post' )); ?>

                <?php if ( have_posts() ) : while ( $main_post_list->have_posts() ) : $main_post_list->the_post(); ?>

                    <li><a href="<?php the_permalink(); ?>" class="post_list_item"><?php the_title(); ?></a></li> 

                <?php endwhile; else: ?>

                    <?php echo "No Article data"; ?>

                <?php endif;  ?>   

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