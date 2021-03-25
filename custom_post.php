
<?php 

/* 

Template Name: Custom Post UI Template

*/

?>

<?php require( "template-parts/header.php"); ?>


<?php 

$custom_post_type = new WP_Query(

    array( 'post_type' => 'custom_post' )

); 

?>

<section class = "primary">

            <h2>custom_post.php  </h2>

            <div class="content_one">
                
                <a href="<?php echo get_site_url(); ?>/articles/" class="back_home">Articles List</a>

                <?php if( $custom_post_type->have_posts() ): while( $custom_post_type->have_posts() ): $custom_post_type->the_post(); ?>
            
                    <h2> <a href="<?php the_permalink(); ?>" target="blank"><?php the_title(); ?> </a> </h2>
                    
                    <p> <?php the_field("example_field_1"); ?> </p>

                <?php endwhile; else : ?>

                    <h3> No posts </h3>

                    <p> No posts are available. </p>

                <?php endif; ?>

            </div>

        </section>

        

<?php require "template-parts/footer.php";  ?>