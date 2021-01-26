<?php
/*

Template Name: Author Main Template

*/

?>

<?php require("template-parts/header.php"); ?>

        <section>

            <h2>This is the main author template.</h2>

            <h2> Author: 
                <p>
                    <?php the_author_posts_link(); ?>
                </p> 
            </h2>
    
            <h3>Article List</h3>

            <hr class="article_title_divider" />

            <!-- Start the Loop. -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <h4> <a href="<?php the_permalink();  ?>" class="author_article_list"><?php the_title(); ?>/<a> </h4>

                <?php the_content(); ?>

            <?php endwhile; else : ?>

                <p>Loop endif - no loop content</p>

            <?php endif; ?> 

        </section>        

<?php require("template-parts/footer.php"); ?>

