<?php
/*

Template Name: Author Main Template

*/

?>

<?php require("template-parts/header.php"); ?>

    <section class="primary"> 

        <p>author.php</p>

        <p> <a href="<?php echo get_site_url() ?>" class="goto_page">Go back to front page</a> </p>

        <h3 class="author_heading"> Author: </h3>
            
           <p> <?php wp_list_authors(); ?> </p>

            

        <hr class="article_title_divider" />

        <h3 class="author_heading">Article List</h3>  

        <?php if( is_author()  ): ?>

            <p>Posts for Author: <span> <?php the_author_posts_link(); ?></span> </p>

        <?php endif; ?>         
            

            <!-- Start the Loop. -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <h4 class="author_article_list"> <a href="<?php the_permalink();  ?>" class="author_article_list"><?php the_title(); ?>/<a> </h4>

                <?php //the_content(); ?>

            <?php endwhile; else : ?>

                <p>Loop endif - no loop content</p>

            <?php endif; ?> 

    </section>        

<?php require("template-parts/footer.php"); ?>

