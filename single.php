<?php
/*

Template Name: Article Single Template

*/

?>

<?php require("template-parts/header.php"); ?>

        <aside class="secondary">

            <?php require("template-parts/secondary-content.php"); ?>

        </aside>

        <section class="primary">

            <p>single.php </p>

            <p><a href="<?php echo get_site_url(); ?>/articles" class="goto_page">Back to article list</a></p>
            
            <h2 ><?php the_title();  ?>  </h2>

            <!-- Start the Loop. -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <p> <?php the_content(); ?> </p>

            <?php endwhile; else : ?>

                <p>Loop endif - no loop content</p>

            <?php endif; ?>

            <div class="authorship">

                <p>Authored by: <?php the_author_posts_link(); ?> </p>
                <p>Date: <a href="<?php echo get_site_url();  ?>/archives"> <?php the_date(); ?> </a> </p>

            </div>

        </section>        
    
    <?php require("template-parts/footer.php"); ?>