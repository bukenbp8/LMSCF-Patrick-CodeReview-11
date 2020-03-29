<?php 

require_once '../includes/dbh.inc.php';

if ($_POST) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $img = $_POST['img'];
    $descr = $_POST['descr'];
    $hobbies = $_POST['hobbies'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $size = $_POST['size'];
    $date = $_POST['date'];
    $senior = $_POST['senior'];


    $sql = "UPDATE animals SET `location` = '$location', `img` = '$img', `name` = '$name', `descr` = '$descr', `hobbies` = '$hobbies', `age` = '$age', `size` = '$size', `senior` = '$senior', `date` = '$date' WHERE id = {$id}";

    if($conn->query($sql) === TRUE) {
        echo  "<p>Successfully Updated</p>";
        echo "<a href='../edit.php?id=" .$id."'><button type='button'>Back</button></a>";
        echo  "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
            echo "Error while updating record : ". $conn->error;
    }

    $conn->close();

}

?> 