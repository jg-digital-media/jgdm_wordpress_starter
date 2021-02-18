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

            <!-- Start the Loop. -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>               
                
                <ul>
                    <li><a href="<?php the_permalink(); ?>" title="Title: <?php the_title(); ?>" target="blank" alt="Title: <?php the_title(); ?>" > <?php the_title(); ?> </a></li>
                </ul>               
                               
               
            <?php endwhile; else : ?>

                <p> This search returned no results. Please click the link to return to the homepage try a new search below. </p>

                <p> <?php get_search_form(); ?> </p>

            <?php endif; ?>
        </section>

<?php require("template-parts/footer.php"); ?>