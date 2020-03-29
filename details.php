<?php 
    ob_start();
    session_start();
    require_once 'includes/dbh.inc.php'; 

    if ($_GET['id']) {
        $id = $_GET['id'];

        $detailsMedia = mysqli_query($conn, "SELECT * FROM animals WHERE id = {$id}");
    
        $row = $detailsMedia->fetch_assoc();
?>      
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/maps.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Pet Adoption</title>
</head>
<body>
     <header>
            <?php
                if(isset($_SESSION['id']) && $_SESSION['role'] == 'Admin')  {
                echo '
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.php">Pet Adoption</a>
                    <form action="admin_panel.php" method="post">
                        <button type="submit" class="btn" name="admin">Admin Panel</button>
                    </form>
                    <form action="includes/logout.inc.php" method="post" class="ml-auto">
                        <span class="pr-3"> Welcome '.$_SESSION["fullname"].'</span>
                        <button type="submit" name="logout-submit" class="btn btn-primary">Logout</button>
                    </form>';
            } elseif(isset($_SESSION['id'])) {
                echo '
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.php">Pet Adoption</a>
                    
                    <a href="index.php" class="btn">All animals</a>
                    <a href="general.php" class="btn">Juniors</a>
                    <a href="senior.php" class="btn">Seniors</a>
                    <form action="index.php" class="form-inline ml-auto" id="search_form" method="post">
                        <input type="text" name="search" id="search"  class="form-control mr-sm-2" placeholder="Search" aria-label="Search">
                    </form>
                    <form action="my_pets.php?id='.$_SESSION['id'].'" method="post" class="ml-auto">
                        <button type="submit" class="btn btn-info">My Adoptions</button>
                    </form>
                    <form action="includes/logout.inc.php" method="post" class="ml-auto">
                        <span class="pr-3"> Welcome '.$_SESSION['fullname'].'</span>
                        <button type="submit" name="logout-submit" class="btn btn-primary">Logout</button>
                    </form>
                    
                ';
            } else {
                echo '
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.php">Pet Adoption</a>
                    <form action="includes/login.inc.php" method="post" class="ml-auto">  
                        <div class ="row">
                            <input type="text" name="mailuid" placeholder="Username/Email..." class="form-control col mr-2">
                            <input type="password" name="pwd" placeholder="Password..." class="form-control col mr-2">
                            <button type="submit" name="login-submit" class="btn btn-primary mr-2">Login</button>
                            <a href="signup.php" class="btn btn-warning mr-2 my-sm-0">Signup</a>
                        </div>
                    </form>'
               ;
            }
            ?>              
        </nav>
     </header>
    <?php
    echo '
    <div class="container">
        <div class="card col-md-8 mx-auto">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <img src="'.$row["img"].'" class="card-img-top mt-3 width" alt="...">
                </div>
                <div class="col-md-12">
                    <div class="card-body">
                        <h2 class="card-title">'.$row["name"].'</h2>
                        <p class="card-text">Age: '.$row["age"].'</p>
                        <p class="card-text">'.(($row['size'] === 'big') ? "Hobbies: ".$row['hobbies']:"Website: ".$row['website']).'</p>
                        <p class="card-text">Description: '.$row["descr"].'</p>
                        <div id="map" class="mt-2 mb-3"></div>
                        <script>
                        var map;
                        function initMap() {
                            var location = new google.maps.LatLng('.$row["location"].')

                            var mapOptions = {
                                center: location,
                                zoom: 13 
                            }

                            map = new google.maps.Map(document.getElementById("map"), mapOptions);
                        
                            var marker = new google.maps.Marker({
                                position: location, 
                                map: map,
                                title: "'.$row["name"].'"
                            })
                            marker.setMap(map);
                        }
                        </script>
                        '.(($row['status'] == 'Available')?'<div class="row justify-content-around"><div class="alert alert-success text-center col-sm-5">Available</div><a href="adopt.php?id='.$row['id'].'" class="btn btn-primary col-sm-5 mb-3">Adopt</a>':'<div class="alert alert-danger text-center">Not Available</div>').'
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
}
    ?>

</body>
</html>
        



    


    