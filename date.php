<?php
/*

Template Name: Archive Date Template

*/

?>

<?php require("template-parts/header.php"); ?>

        <section class="primary">

                <p> date.php</p>

                <p> <a href="<?php echo get_site_url() . "/article"; ?>" class="goto_page" id="back_to_articles">Back to Main List</a> </p> 

                <h2> List for... <strong><?php echo the_archive_title(); ?></strong> </h2>

                <hr />
                
                <!-- Start the Loop. -->
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                        <p>Article: <a href="<?php the_permalink() ?>"><?php echo the_title(); ?></a></p>

                        <?php endwhile; else : ?>

                        <p>No content available for this archive.</p>

                        <?php endif; ?> 

                <hr />                              

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

