<?php 
    require "header.php";
?>

    <main>
        <?php 
            if(isset($_SESSION['userId']))  {
                echo '<div class="alert alert-success col-sm-4 mx-auto mt-3" id="fadeout" role="alert">You are logged in!</div>';
            } else {
                echo '<div class="alert alert-danger col-sm-4 mx-auto mt-3" id="fadeout" role="alert">You are logged out!</div>';
            }
        ?>  
    </main>