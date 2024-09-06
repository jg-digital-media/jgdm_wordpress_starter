<?php
/*

Template Name: Index Template

*/

?>

<?php require("template-parts/header.php"); ?>

        <section class="primary">

            <div class="filestamp">

                <p>index.php</p>
                
            </div>

            <h2>This is the index template.</h2>

            <p>This is where the catch all template lives and serves as a home page template. </p>

            <p><a href="#" class="goto_page">Go to Full Articles List</a></p>
           
            <ul class="article_list"> 

                
                <li><a href="#" class="post_list_item">Article 1</a></li>       
                <li><a href="#" class="post_list_item">Article 2</a></li> 
                <li><a href="#" class="post_list_item">Article 3</a></li>       

            </ul>
            
            <!-- Pagination -->
            <div class="pagination">                   
                

                <div><a href="#" class="next" >Previous</a> </div>
                <span>1</span>                 
                <span> <a href="#">2</a></span>                
                <span> <a href="#">3</a></span> 
                <div><a href="#" class="next" >Next</a> </div>

            </div>
            
        </section>

<?php require("template-parts/footer.php"); ?>