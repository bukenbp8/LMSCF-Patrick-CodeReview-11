<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
     <script src="./js/main.js"></script>
     <script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>