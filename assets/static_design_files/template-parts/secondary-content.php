

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

            <h4>Monthly</h4>

            <?php 

                //get archive list - monthly post archive
                wp_get_archives('type=monthly'); ?> 
            
        </div>

        <div class="widget_area">

            <h3> Widget Area</h3>

            <?php 
            
                the_widget( "search" );
                dynamic_sidebar( "widgetarea_search" );
            ?>
            
        </div>