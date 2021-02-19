<?php
/*

Template Name: Article List Template

*/

?>

<?php require("template-parts/header.php"); ?>


        <aside class="secondary">

            <?php require("template-parts/secondary-content.php"); ?>

        </aside>

        <section class="primary article">

            <p>article.php</p>

            <p> <a href="<?php echo get_site_url() ?>" class="goto_page">Go back to front page</a> <p> 

            <h2>Article list</h2>          

            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum, blanditiis. Et necessitatibus alias eligendi accusamus soluta aperiam ratione libero fuga. Debitis ab voluptatibus dolorum, repudiandae voluptatum fugit quasi provident ea.</p>

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
