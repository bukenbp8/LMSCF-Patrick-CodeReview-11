<?php 
    require 'includes/dbh.inc.php';
    require "header.php";

    if(isset($_POST["submit"])){
        $idAnimal = $_GET['id'];
        $idUser = $_SESSION['id'];

        $sql = "INSERT INTO adopt (user_id, animal_id) VALUES ('$idUser', '$idAnimal')";
        $sql2 = "UPDATE animals SET `status` = 'Not available' WHERE id = $idAnimal";
        if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
            echo "<div class='alert alert-success col-sm-4 mx-auto mt-3' id='fadeout' role='alert'>Success! Please take good care of this animal.</div>";
        } else {
            echo "Error while adopting : ". $conn->error;
        };
    }
?>


<div class="container mt-4 col-md-8">
    <h2 class="mt-4 mb-4">Adopt animal</h2>
    <form class="form-group bg-light rounded p-4 pr-5 pl-5 alert alert-warning" method="post">
        <h1>Are you sure?</h1>
        <p>You agree to take responsibility for a living being!</p>
        <button class='btn btn-warning' name="submit" type="submit">I agree</button>
    </form>
</div>