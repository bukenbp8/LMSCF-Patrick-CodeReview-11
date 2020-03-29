<?php 
    ob_start();
    require_once 'includes/dbh.inc.php';
    require_once "header.php";

    $output = '';
    if(isset($_POST["search"])){
        $search = '%'.mysqli_real_escape_string($conn, $_POST["search"]).'%';
    } else {
        $search = '%';
    }
    $query = mysqli_query($conn, "SELECT * FROM animals WHERE senior = 'no'");
?>

<main>
    
    <div class="container" id="result">
        <h1 class='text-dark mt-4 mb-4'>All Pets</h1>    
                <?php 
                    if(isset($_SESSION['login_message']))  {
                        echo $_SESSION['login_message'];
                        unset($_SESSION['login_message']);
                    }
                    if($query->num_rows == 0){
                        $output .= 'No result';
                    } else {
                        $rows = $query->fetch_all(MYSQLI_ASSOC);
                        $output .= '<div class="row">';
                        foreach ($rows as $value) {
                            $output .= "
                            <div class='col-lg-3 col-md-4 col-sm-6 p-2'>
                            <div class='card col-lg-12 col-md-12 mb-4 shadow p-3 mb-5 h-100'>
                                <img class='card-img-top mt-3' src=".$value['img']." alt='Card image cap'>
                                <div class='card-body d-flex flex-column'>
                                    <h5 class='card-title'>".$value['name']."</h5>
                                    <p class='card-text'>Description: ".$value['descr']."</p>
                                    <p class='card-text'>Age: ".$value['age']."</p>
                                    ".((isset($_SESSION['id']))?'<a href="details.php?id='.$value['id'].'" class="btn btn-primary mt-auto">More Details</a>':'<a href="signup.php" class="btn btn-primary mt-auto">Sign Up</a>').'    
                                </div>
                            </div>
                            </div>';   
                        }
                        $output .= '</div>';
                    }
                    echo $output;
                ?>
    </div>
</main>