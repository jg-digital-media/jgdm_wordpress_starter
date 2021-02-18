<?php

?>

<?php require("template-parts/header.php"); ?>

        <section class="primary">

            <p>front-page.php</p>

            <h2> <?php bloginfo("site_title"); ?> </h2>

            <p>This is the template that has no individual permalink and therefore serves as the site home page.</p>

            <hr />

            <p><a href="<?php echo get_site_url(); ?>/article" class="goto_page">Go to Articles List</a></p>
                   
        </section>

<?php require("template-parts/footer.php"); ?>