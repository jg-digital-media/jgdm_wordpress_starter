<?php
/*

Template Name: 404 Template

*/

?>
<?php require("template-parts/header.php"); ?>

<section class="primary">

        <h2>404.php</h2>

        <p>Unfortunately there is no content to display. Click <a href="<?php echo get_site_url(); ?>">Back to Main List</a> here to go to the homepage or try a new search.</p>

        <p> <?php get_search_form(); ?> </p>

</section>

        
<?php require("template-parts/footer.php"); ?>