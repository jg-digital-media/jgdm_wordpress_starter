<?php
/*

Template Name: Index Template

*/

?>

<?php require("template-parts/header.php"); ?>

        <section class="primary">
        
            <p>search.php</p>

            <h2>This is the Search template.</h2>

            <p><a href="<?php echo get_site_url(); ?>" class="goto_page">Back to Homepage</a></p>           


            <?php  
            
                //Search Result Count
                global $total_posts;
                $total_results = $total_posts->found_posts;

            ?>

            <?php       

            $search = get_search_query(); 

            /*The Search WP Query*/ 
            $search_results = new WP_Query(

            array(
                'post_type' => 'post', //
                'posts_per_page' => '100',
                's' => $search
                )
            );            

            ?>    

            <?php echo "Search result count: " . $search_results->found_posts; ?>

            <!-- Start the Loop. -->
            <?php if ( $search_results->have_posts() ) : while ( $search_results->have_posts() ) : $search_results->the_post(); ?>               
                
                <ul>
                    <li><a href="<?php the_permalink(); ?>" title="Title: <?php the_title(); ?>" target="blank" alt="Title: <?php the_title(); ?>" > <?php the_title(); ?> </a></li>
                    
                </ul>               

                <p> <?php the_excerpt(); ?> </p>
               
            <?php endwhile; else : ?>

                <p> This search returned no results. Please click the link to return to the homepage try a new search below. </p>

                <p> <?php get_search_form(); ?> </p>

            <?php endif; ?>

            <!-- Get category list -->
        </section>

<?php require("template-parts/footer.php"); ?>