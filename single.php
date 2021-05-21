<?php
/*

Template Name: Article Single Template

*/

?>

<?php require("template-parts/header.php"); ?>

<?php 

$custom_post_type = new WP_Query(

    array( 'post_type' => 'custom_post' )

); 

?>

        <aside class="secondary">

            <?php require("template-parts/secondary-content.php"); ?>

        </aside>

        <section class="primary">

            <div class="filestamp">

                <p>single.php </p>
                
            </div>

            <p><a href="<?php echo get_site_url(); ?>/articles" class="goto_page">Back to article list</a></p>
            
            <h2 ><?php the_title();  ?>  </h2>

            <!-- Start the Loop. -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <p> <?php the_content(); ?> </p>

            <?php endwhile; else : ?>

                <p>Loop endif - no loop content</p>

            <?php endif; ?>

            <div class="authorship">

                <p><strong>Value 1:</strong> <?php if( get_field('movie_field_in_code') ): ?>
                                                <span> <?php the_field('movie_field_in_code'); ?> </span>
                                            <?php endif; ?> </p>

                <p><strong>Value 2:</strong> <?php if( get_field('movie_field_in_code_two') ): ?>
                                                <span> <?php the_field('movie_field_in_code_two'); ?> </span>
                                            <?php endif; ?> </p>

                <p>Authored by: <?php the_author_posts_link(); ?> </p>
                <p>Date: <a href="<?php echo get_site_url();  ?>/archive"> <?php the_date(); ?> </a> </p>


            </div>

        </section>        
    
    <?php require("template-parts/footer.php"); ?>