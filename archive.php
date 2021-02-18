<?php
/*

Template Name: Archive Template

*/

?>


<?php require("template-parts/header.php"); ?>

        <section class="primary">

            <p>archive.php</p>

            <a href="<?php echo get_site_url() . "/article"; ?>" class="goto_page" id="back_to_articles">Back to Main List</a>

            <h2>Archives by Month:</h2>

            <ul>
                <?php wp_get_archives('type=monthly'); ?>
            </ul>

            <!-- Start the Loop. -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

            <?php endwhile; else : ?>

                <p>Loop endif - no loop content</p>

            <?php endif; ?>          

        </section>

<?php require("template-parts/footer.php"); ?>