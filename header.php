<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/main.js" async></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Online Library</title>
</head>
<body>
     <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Online Library</a>
            <?php
                if(isset($_SESSION['userId']) && $_SESSION['role'] == 'admin')  {
                echo '
                <form action="admin_panel.php" method="post">
                    <button type="submit" class="btn" name="admin">Admin Panel</button>
                </form>
                <form action="includes/logout.inc.php" method="post" class="ml-auto">
                    <span class="pr-3"> Welcome '.$_SESSION["userName"].'</span>
                    <button type="submit" name="logout-submit" class="btn btn-primary">Logout</button>
                </form>';
            } elseif(isset($_SESSION['userId'])) {
                echo '
                <form action="my_media.php?id='.$_SESSION['userId'].'" method="post">
                    <button type="submit" class="btn" name="admin">My Media</button>
                </form>
                <form action="includes/logout.inc.php" method="post" class="ml-auto">
                    <span class="pr-3"> Welcome '.$_SESSION["userName"].'</span>
                    <button type="submit" name="logout-submit" class="btn btn-primary">Logout</button>
                </form>';
            } else {
                echo '
                <form action="includes/login.inc.php" method="post">  
                    <div class = "row">
                        <input type="text" name="mailuid" placeholder="Username/Email..." class="form-control col mr-2">
                        <input type="password" name="pwd" placeholder="Password..." class="form-control col mr-2">
                        <button type="submit" name="login-submit" class="btn btn-primary mr-2">Login</button>
                        <a href="signup.php" class="btn btn-warning mr-2">Signup</a>
                    </div>
                </form>'
               ;
            }
            ?>              
        </nav>
     </header>
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>