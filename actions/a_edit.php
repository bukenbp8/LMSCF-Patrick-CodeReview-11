<?php 

require_once '../includes/dbh.inc.php';

if ($_POST) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $img = $_POST['img'];
    $isbn = $_POST['isbn'];
    $descr = $_POST['descr'];
    $pubDate = $_POST['pubDate'];
    $typeMedia = $_POST['typeMedia'];
    $status = $_POST['statusM'];
    $id2 = $_POST['id2'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $id3 = $_POST['id3'];
    $pubName = $_POST['pubName'];
    $size = $_POST['size'];
    $pubAddr = $_POST['pubAddr'];


    $sql1 = "UPDATE media SET titelMedia = '$title', imgMedia = '$img', isbnMedia = '$isbn', descMedia = '$descr', publDateMedia = '$pubDate', typeMedia = '$typeMedia', statusMedia = '$status' WHERE idMedia = {$id}";
    $sql2 = "UPDATE authors SET firstNameAuthor = '$fname', lastNameAuthor = '$lname' WHERE authorID = {$id2}";
    $sql3 = "UPDATE publisher SET namePublisher = '$pubName', sizePublisher = '$size', addressPublisher = '$pubAddr' WHERE idPublisher = {$id3}";
    if($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
        echo  "<p>Successfully Updated</p>";
        echo "<a href='../edit.php?id=" .$id."&id2=".$id2."&id3=".$id3."'><button type='button'>Back</button></a>";
        echo  "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
            echo "Error while updating record : ". $conn->error;
    }

    $conn->close();

}

?> 

