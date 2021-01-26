<?php
/*

Template Name: Archive Template

*/

?>


<?php require("template-parts/header.php"); ?>

        <section>


            <h2>Archives by Month:</h2>
            <ul>
                <?php wp_get_archives('type=monthly'); ?>
            </ul>

            <!-- Start the Loop. -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

                <p>Loop - endwhile</p>

            <?php endwhile; else : ?>

                <p>Loop endif - no loop content</p>

            <?php endif; ?>          

        </section>

<?php require("template-parts/footer.php"); ?>