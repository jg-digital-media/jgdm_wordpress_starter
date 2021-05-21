
<?php
/*

Template Name: Search Page

*/

?>

<?php require("template-parts/header.php"); ?>

        <section>

        <div class="filestamp">

            <p>searchpage.php</p>

        </div>
        
            <h2><?php the_title(); ?> - Search Result Page</h2>        
            
            <?php get_search_form(); ?>

        </section>

<?php require("template-parts/footer.php"); ?>