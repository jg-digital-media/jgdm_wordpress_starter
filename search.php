<?php
/*

Template Name: Index Template

*/

?>

<?php require("template-parts/header.php"); ?>

        <section>

            <h2>This is the Search template.</h2>           

            <!-- Start the Loop. -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>                
               
            <?php endwhile; else : ?>

                <p>Unfortunately there is no content to display Please try a new search.</p>

                <p> <?php get_search_form(); ?> </p>

            <?php endif; ?>
            
        </section>

<?php require("template-parts/footer.php"); ?>