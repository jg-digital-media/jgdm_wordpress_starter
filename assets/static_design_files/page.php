
<?php
/*

Template Name: Page Template

*/

?>

<?php require("template-parts/header.php"); ?>

        <section class="primary">

            <div class="filestamp">

                <p>page.php</p>

            </div>

            <p><a href="<?php echo get_site_url(); ?>/article" class="goto_page">Articles List<a></p>

            <h2> <?php the_title(); ?> </h2>

            <p>page.php content</p>

            <!-- WordPress Loop -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>
            

            <?php endwhile; else: ?>
            <!-- more text here-->

                <p> There is no content to display. </p>

            <?php endif; ?>

        </section>

<?php require("template-parts/footer.php"); ?>