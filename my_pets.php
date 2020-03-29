<?php 
    require 'includes/dbh.inc.php';
    require "header.php";

    if ($_GET['id']){
    $id = $_GET['id'];    
    $sql = "SELECT * FROM adopt t1 JOIN users t2 ON t1.user_id = t2.id JOIN animals t3 ON t1.animal_id = t3.id WHERE t1.user_id = $id";

    $adopted = mysqli_query($conn, $sql);
    $rows = $adopted->fetch_all(MYSQLI_ASSOC);
    
    if($adopted->num_rows == 0) {
        echo '
        <main>
            <div class="container text-center mt-5">
                <b>You did not adopt any animal yet!</b>
            </div>
        </main>';
    }  else {
        echo '
        <main>
            <div class="container mt-5">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Time of adoption</th>
                            <th></th>
                        </tr>
                    </thead>
                <tbody>';
                foreach ($rows as $row) {
                    echo '
                    <tr>
                        <td>'.$row['name'].'</td>
                        <td><img src='.$row['img'].' height="50" width="50"></td>
                        <td>'.$row['time'].'</td>
                        <td><a href="return.php?id='.$row['id_a'].'&id2='.$row['animal_id'].'"><button class="btn btn-danger">Return</button></a></td>
                    </tr>';
                }
                echo '
                </tbody>
                </table>
            </div>
        </main>';
        }
    }