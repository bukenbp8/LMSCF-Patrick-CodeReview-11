<?php 

require_once '../includes/dbh.inc.php';

if ($_POST) {
    $title = $_POST['title'];
    $img = $_POST['img'];
    $isbn = $_POST['isbn'];
    $descr = $_POST['descr'];
    $pubDate = $_POST['pubDate'];
    $typeMedia = $_POST['typeMedia'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pubName = $_POST['pubName'];
    $size = $_POST['size'];
    $pubAddr = $_POST['pubAddr'];


    $sql1 = "INSERT INTO media (titelMedia, imgMedia, isbnMedia, descMedia, publDateMedia, typeMedia) VALUES ('$title', '$img', '$isbn', '$descr', '$pubDate', '$typeMedia')";
    $sql2 = "INSERT INTO authors (firstNameAuthor, lastNameAuthor) VALUES ('$fname', '$lname')";
    $sql3 = "INSERT INTO publisher (namePublisher, sizePublisher, addressPublisher) VALUES ('$pubName','$size','$pubAddr')";
    if($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
        echo  "<p>Successfully Created</p>";
        echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo  "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
            echo "Error while creating record : ". $conn->error;
    }
    $conn->close();
}