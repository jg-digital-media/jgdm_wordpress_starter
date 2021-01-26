<?php
/*

Template Name: Index Template

*/

?>

<?php require("template-parts/header.php"); ?>

        <section>

            <h2>This is the index template.</h2>

            <p>This is where the catch all template lives and serves as the site home page. </p>

            <!-- Start the Loop. -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>                
               
            <?php endwhile; else : ?>

                <p>Unfortunately there is no content to display Please add a new post or try a new search.</p>

                <p> <?php get_search_form(); ?> </p>

            <?php endif; ?>
            
        </section>

<?php require("template-parts/footer.php"); ?>