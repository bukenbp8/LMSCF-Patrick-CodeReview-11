<?php 

require_once '../includes/dbh.inc.php';

if ($_POST) {
    $id = $_POST['id'];
    $id2 = $_POST['id2'];
    $id3 = $_POST['id3'];

    $sql1 = "DELETE FROM media WHERE idMedia = {$id}";
    $sql2 = "DELETE FROM authors WHERE authorID = {$id2}";
    $sql3 = "DELETE FROM publisher WHERE idPublisher = {$id3}";
    if($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
        echo  "<p>Successfully Deleted</p>";
        echo  "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
            echo "Error while deleting record : ". $conn->error;
    }

    $conn->close();

}

?> 