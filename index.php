<?php 
    ob_start();
    require_once 'includes/dbh.inc.php';
    require "header.php";

    $thumbMedia = mysqli_query($conn, "SELECT idMedia, titelMedia, imgMedia, typeMedia, firstNameAuthor, lastNameAuthor FROM media t1 INNER JOIN authors t2 ON t1.authorIdMedia = t2.authorID");
?>

    <main>
        <div class="container">
            
            <?php 
                if(isset($_SESSION['userId']))  {
                    echo '<div class="alert alert-success col-sm-4 mx-auto mt-3" id="fadeout" role="alert">You are logged in!</div>';
                }
                if($thumbMedia->num_rows == 0){
                    echo 'No result';
                } else {
                    $rows = $thumbMedia->fetch_all(MYSQLI_ASSOC);
                    echo '<div class="row">';
                    foreach ($rows as $value) {
                        echo "
                        <div class='card col-md-4 col-lg-3'>
                            <img class='card-img-top' src=".$value['imgMedia']." alt='Card image cap'>
                            <div class='card-body'>
                                <h5 class='card-title'>".$value['titelMedia']."</h5>
                                <p class='card-text'>Author: ".$value['firstNameAuthor']." ".$value['lastNameAuthor']."</p>
                                <p class='card-text'>Media: ".$value['typeMedia']."</p>
                                ".((isset($_SESSION['userId']))?'<a href="details.php?id='.$value['idMedia'].'" class="btn btn-primary">More Details</a>':'<a href="signup.php" class="btn btn-primary">Sign Up</a>').'    
                            </div>
                        </div>';
                        
                    }
                    echo '</div>';
                }
            ?>
            
        </div>
    </main>