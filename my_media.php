<?php 
    require 'includes/dbh.inc.php';
    require "header.php";

    if ($_GET['id']){
    $id = $_GET['id'];    
    $sql = "SELECT * FROM borrowed t1 JOIN media t2 ON t1.idMedia = t2.idMedia JOIN authors t3 ON t2.authorIdMedia = t3.authorID WHERE idUsers = $id";

    $borrowedMedia = mysqli_query($conn, $sql);
    $rows = $borrowedMedia->fetch_all(MYSQLI_ASSOC);

    echo '
    <main>
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Titel</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Author</th>
                        <th scope="col">Issue Start</th>
                        <th scope="col">Issue End</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
            <tbody>';
            foreach ($rows as $row) {
                echo '
                <tr>
                    <td>'.$row['titelMedia'].'</td>
                    <td><img src='.$row['imgMedia'].' height="50" width="50"></td>
                    <td>'.$row['firstNameAuthor']." ".$row['lastNameAuthor'].'</td>
                    <td>'.$row['startBorrowed'].'</td>
                    <td>'.$row['endBorrowed'].'</td>
                    <td><a href="return.php?id='.$row['idBorrowed'].'&id2='.$row['idMedia'].'"><button class="btn btn-danger">Return</button></a></td>
                </tr>';
            }
            echo '
            </tbody>
            </table>
        </div>
    </main>';
    }