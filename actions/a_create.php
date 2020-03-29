<?php 

require_once '../includes/dbh.inc.php';

if ($_POST) {
    $name = $_POST['name'];
    $img = $_POST['img'];
    $descr = $_POST['descr'];
    $website = $_POST['website'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $hobbies = $_POST['hobbies'];
    $date = $_POST['date'];

    if($age < 8){
        $senior = 'no';
    } else {
        $senior = 'yes';
    }

    $sql = "INSERT INTO animals (location, img, name, descr, website, age, hobbies, senior, date) VALUES ('$location', '$img', '$name', '$descr', '$website', '$age', '$hobbies', '$senior', '$date')";

    if($conn->query($sql) === TRUE) {
        echo  "<p>Successfully Created</p>";
        echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo  "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
            echo "Error while creating record : ". $conn->error;
    }
    $conn->close();
}

