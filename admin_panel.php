<?php 
    ob_start();
    require_once 'includes/dbh.inc.php';
    require "header.php";

    $sql = "SELECT * FROM animals";
    
    $result = mysqli_query($conn, $sql);
    

    if($_SESSION['role'] == 'Admin')   {
        echo '
        <main>
            <div class="container">
                <h2 class="mt-3 mb-2">Hello Admin!</h2>
                <a href= "animals.php"><button class="btn btn-info m-3">Add Animals</button></a>
                <h3 class="mt-3 mb-2">Animals</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th>
                            <th scope="col">Website/Hobby</th>
                            <th scope="col">Age</th>
                            <th scope="col">Size</th>
                            <th scope="col">Location</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>';
                    $rows = $result->fetch_all(MYSQLI_ASSOC);
                    foreach ($rows as $value) {
                        echo '
                        <tr>
                            <th scope="row">'.$value['id'].'</th>
                            <td>'.$value['name'].'</td>
                            <td><img src='.$value['img'].' height="50" width="50"></td>
                            <td>'.$value['descr'].'</td>
                            <td>'.(($value['size'] === 'big') ? $value['hobbies']:$value['website']).'</td>
                            <td>'.$value['age']. ' ('.(($value['senior'] == 'yes')?'senior':'junior').')</td>
                            <td>'.$value['size'].'</td>
                            <td>'.$value['location'].'</td>
                            <td>'.$value['status'].' '.(($value['age'] >= 8) ? $value['date']:' ').'</td>
                            <td><a href="edit.php?id='.$value['id'].'"><button class="btn btn-warning">Edit</button></a></td>
                            <td><a href="delete.php?id='.$value['id'].'"><button class="btn btn-danger">Delete</button></a></td>
                        </tr>';
                    }
                    echo '
                    </tbody>
                </table>
            </div>        
        </main>';
    } 
    else 
    {
        header("Location: ../php/index.php");
        exit();
    }
?>

