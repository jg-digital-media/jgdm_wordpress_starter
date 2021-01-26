<?php
/*

Template Name: Article Single Template

*/

?>

<?php require("template-parts/header.php"); ?>

        <aside>

            <div class="featured_image">

                <?php if( !has_post_thumbnail() ): ?>

                    <img src="<?php echo get_template_directory_uri() . '/img/logo.png'; ?>" alt="main logo" title="main logo" id="main_image" />

                <?php else: ?>

                  <?php the_post_thumbnail(); ?>

                <?php endif; ?>

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

        </aside>

        <section class="article_container">

            <h2 ><?php the_title();  ?> </h2>

            <!-- Start the Loop. -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <p> <?php the_content(); ?> </p>

            <?php endwhile; else : ?>

                <p>Loop endif - no loop content</p>

            <?php endif; ?>

            <div class="authorship">
                <p>Authored by: <?php the_author_posts_link(); ?> </a></p>
                <p>Date: <a href="# "><?php the_time('d M Y ---  g:i a');  ?></a></p>
            </div>

        </section>
        
    
    <?php require("template-parts/footer.php"); ?>