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
                    <form action="my_pets.php?id='.$_SESSION['id'].'" method="post">
                        <button type="submit" class="btn">My Adoptions</button>
                    </form>
                    <form action="index.php" class="form-inline ml-auto" id="search_form" method="post">
                        <input type="text" name="search" id="search"  class="form-control mr-sm-2" placeholder="Search" aria-label="Search">
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

<main>
    <div class="container mt-4 col-md-8">
        <h2 class="mt-4 mb-4">Add animal</h2>
        <form class="form-group bg-light rounded p-4 pr-5 pl-5" action="actions/a_create.php"  method="post">
            <label>Animal size</label><br>
            <select name ="size" id="typeAnimal" class="form-control mb-2">
                <option value='small'>small</option>
                <option value='big'>big</option>
            </select>
            <label>Name</label>
            <input type="text" name="name" class="form-control mb-2">
            <label>Image</label>
            <input type="text" name="img"  class="form-control mb-2">
            <label>Description</label>
            <input type="text" name="descr" class="form-control mb-2">
            <label id="websiteL">Website</label>
            <input type="text" name="website" id="website" class="form-control mb-2">
            <label id="hobbiesL">Hobbies</label>
            <input type="text" name="hobbies" id="hobbies" class="form-control mb-2">
            <label>Age</label>
            <input type="text" name="age" id="age" class="form-control mb-2">
            <label id="dateL">Date when available</label>
            <input type="date" name="date" id="date" class="form-control mb-2">
            <label>Location</label>
            <input type="text" name="location" class="form-control mb-2">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="index.php" class="btn btn-primary">Back</a>
        </form>
    </div>
</main>

<script src="js/animals.js"></script>
<script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>