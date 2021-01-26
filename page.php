
<?php
/*

Template Name: Page Template

*/

?>

<?php require("template-parts/header.php"); ?>

        <section>

            <h2><?php the_title(); ?> </h2>

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

             <?php the_content(); ?>
            

            <?php endwhile; else: ?>
            <!-- more text here-->

                <p> ggfg </p>

            <?php endif; ?>

        </section>

<?php require("template-parts/footer.php"); ?>