<?php
/*

Template Name: Archive Date Template

*/

?>

<?php require("template-parts/header.php"); ?>

        <section>

                <h2> List for <strong><?php echo the_archive_title(); ?></strong> </h2>

                <hr />

                <a href="<?php echo get_template_directory_uri() . "/articles"; ?>" id="back_to_articles">Back to Main List</a>

                <hr />

                <h2>Articles this month/year</h2>
                
                <!-- Start the Loop. -->
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <p>Article: <a href="<?php the_permalink() ?>"><?php echo the_title(); ?></a></p>

                        <?php endwhile; else : ?>

                        //

                        <?php endif; ?> 

                <hr />
                
                <h2>Content</h2>
                <!-- Start the Loop. -->
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <h3 class="article_title_divider "> <?php the_title(); ?> </h3>

                    <p> <?php the_content(); ?> </h3>

                    <hr class="article_title_divider" />
                    

                <?php endwhile; else : ?>

                    <p>Loop endif - no loop content</p>

                <?php endif; ?> 





        </section>
        

<?php require("template-parts/footer.php"); ?>

