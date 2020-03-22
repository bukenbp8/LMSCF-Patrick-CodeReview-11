<?php 
    require 'includes/dbh.inc.php';
    require "header.php";

    if(isset($_POST["submit"])){
        $idMedia = $_GET['id'];
        $idUsers = $_SESSION['userId'];
        $startBorrowed = $_POST["startBorrowed"];
        $endBorrowed = $_POST["endBorrowed"];

        $sql = "INSERT INTO borrowed (idUsers, idMedia, startBorrowed, endBorrowed) VALUES ($idUsers, $idMedia, '$startBorrowed', '$endBorrowed')";
        $sql2 = "UPDATE media SET statusMedia = 'Not available' WHERE idMedia = $idMedia";
        if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
            echo "<div class='alert alert-success col-sm-4 mx-auto mt-3' id='fadeout' role='alert'>Success! Please bring your item back in time.</div>";
        } else {
            echo 'error!';
        };
    }
?>


<div class="container mt-4 col-md-8">
    <h2 class="mt-4 mb-4">Borrow Media</h2>
    <form class="form-group bg-light rounded p-4 pr-5 pl-5" method="post">
        <input type="date" name="startBorrowed">
        <input type="date" name="endBorrowed">
        <input type="submit" name="submit">
    </form>
</div>