<?php 

require_once '../includes/dbh.inc.php';

if ($_POST) {
    $id = $_POST['id'];

    $sql = "DELETE FROM animals WHERE id = {$id}";
  
    if($conn->query($sql) === TRUE) {
        echo  "<p>Successfully Deleted</p>";
        echo  "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
            echo "Error while deleting record : ". $conn->error;
    }

    $conn->close();

}

?> 