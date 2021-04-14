
<?php 

/* 

Template Name: Custom Post UI Single Template

*/

?>

<?php require( "template-parts/header.php"); ?>

<?php 

$custom_post_type = new WP_Query(

    array( 'post_type' => 'custom_post' )

); 

?>

<section class = "primary">

            <p>single-custom_post.php</p>

            <div class="content_one">

                <?php posts_nav_link(); ?>

                    <p><a href="<?php echo get_site_url(); ?>/article" class="goto_page">Go to Articles List</a></p>
                
                    <div class="next"> <?php next_post_link( '%link','Newer' ); ?> </div>  

                    <span>Post Nav</span>

                    <div class="last"> <?php previous_post_link( '%link', 'Older' ); ?> </div>  
                
                    <p> <?php the_field("example_field_1"); ?> </p>
                        
                    <p> <?php the_field("example_field_2"); ?> </p>
                    
                    <p> <?php the_field("example_field_3"); ?> </p>
                    
                    <p> <?php the_field("example_field_4"); ?> </p>
                    
                    <p> <?php the_field("example_field_5"); ?> </p>
                    
                    <p> <?php the_field("example_field_6"); ?> </p>

            </div>

        </section>        

<?php require "template-parts/footer.php";  ?>