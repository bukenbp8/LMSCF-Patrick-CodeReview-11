<?php 

require_once '../includes/dbh.inc.php';

if ($_POST) {
    $id = $_POST['id'];
    $id2 = $_POST['id2'];

    $sql = "DELETE FROM adopt WHERE id_a = $id";
    $sql2 = "UPDATE animals SET `status` = 'Available' WHERE id = $id2";
    
    if($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
        echo  "<p>Successfully Returned</p>";
        echo  "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
            echo "Error while returning: ". $conn->error;
    }

    $conn->close();

}

?> 