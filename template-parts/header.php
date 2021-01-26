<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Meta Tags -->
    <meta name="description" content="">
    <meta name="keywords" content=""> 
    <meta name="image" content=""> 
    <meta name="title" content="">

    <!-- Facebook OpenGraph GL -->
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="">

    <!-- browser sharing images -->
    
    <!-- favicon -->
    <link rel="icon" href="" />

    <!-- Canonical -->
    <link rel="canonical" href="" />

    <!-- CDN: Actor Google Font -->
    <link href="" rel="stylesheet">

    <!-- styles -->
    <link rel="stylesheet" type="text/css" href="style.css" />

    <title>WordPress Starter</title> 

    <?php wp_head(); ?> 

</head>
<body>

    <header>

        <h1>WordPress Starter</h1>
        
        <nav>
            <ul class ="main_nav">

                <ul>
                    <?php  
                    
                        $main_menu = array(
                            'container'=> false,
                            'theme_location' => 'main_menu'

                        );  wp_nav_menu($main_menu);  
                        
                    ?>
                </ul>
            </ul>
        </nav>

    </header>    

    <main id="container">

    <?php wp_head(); ?>