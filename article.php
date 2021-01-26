<?php
/*

Template Name: Article List Template

*/

?>

<?php require("template-parts/header.php"); ?>

<aside>

            <div class="featured_image">

                <img src="<?php echo get_template_directory_uri() . '/img/logo.png'; ?> " alt="main logo" title="main logo" id="main_image" />

            </div>

            <div class="post_list">

                <h3>Recent Posts</h3>

                <ul>
                    <?php
                        global $post;
                    
                        $myposts = get_posts( array(
                            'post_type' => 'post',
                            'posts_per_page' => 5,
                            'order' => 'DESC'
                        ) );
                    
                        if ( $myposts ) {
                            foreach ( $myposts as $post ) : 
                                setup_postdata( $post ); ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            <?php
                            endforeach;
                            wp_reset_postdata();
                        }
                    ?>
                </ul>

            </div>

            <div class="ad_sense">

                <!-- input code here-->
                
            </div>

            <div class="archived_posts">

                <h3>Archives</h3>

                <!-- input code here-->                

                <h4>Yearly</h4>

                <?php 
                    
                    //get archive list - yearly post archive.
                    wp_get_archives('type=yearly') ?>

                <hr />

                <h4> Monthly </h4>

                <?php 

                    //get archive list - monthly post archive
                    wp_get_archives('type=monthly'); ?> 
                
            </div>

            <div class="widget_area">

                <?php 
                
                    the_widget( "search" );
                    dynamic_sidebar( "widgetarea_search" );
                ?>
                        
            </div>

        </aside>

        <section class="article_container">

            <h2>Article list</h2>          

            <ul class="article_list">
            

                <?php $main_post_list = new WP_Query(array( 'post_type'=>'post' )); ?>

                <?php if ( have_posts() ) : while ( $main_post_list->have_posts() ) : $main_post_list->the_post(); ?>

                    <!-- -->   
                    <li><a href="<?php the_permalink(); ?>" class="post_list_item"><?php the_title(); ?></a></li>
                    

                <?php endwhile; else: ?>

                    <?php echo "No Article data"; ?>

                <?php endif;  ?>

            </ul>

        </section>

<?php require("template-parts/footer.php"); ?>
