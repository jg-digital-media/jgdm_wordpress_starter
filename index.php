<?php
/*

Template Name: Index Template

*/

?>

<?php require("template-parts/header.php"); ?>

        <section class="primary">

            <p>index.php</p>

            <h2>This is the index template.</h2>

            <p>This is where the catch all template lives and serves as the site home page. </p>

            <p><a href="<?php echo get_site_url(); ?>/article" class="goto_page">Go to Articles List</a></p>

            <!-- Start the Loop. -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>                
               
            <?php endwhile; else : ?>

                <p>Unfortunately there is no content to display Please add a new post or try a new search.</p>

                <p> <?php get_search_form(); ?> </p>

            <?php endif; ?>
            
        </section>

<?php require("template-parts/footer.php"); ?>