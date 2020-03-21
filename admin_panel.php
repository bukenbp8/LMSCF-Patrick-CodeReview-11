<?php 
    ob_start();
    require_once 'includes/dbh.inc.php';
    require "header.php";

    $sql = "SELECT idMedia, titelMedia, imgMedia, typeMedia, statusMedia, firstNameAuthor, lastNameAuthor, authorID, idPublisher, namePublisher FROM media t1 JOIN authors t2 ON t1.authorIdMedia = t2.authorID JOIN publisher t3 ON t1.publisherIdMedia = idPublisher";
    $result = mysqli_query($conn, $sql);

    if($_SESSION['role'] == 'admin')   {
        echo '
        <main>
            <div class="container">
                <h2 class="mt-3 mb-2">Hello Admin!</h2>
                <a href= "create.php"><button class="btn btn-info m-3">Add Media</button></a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Titel</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Author</th>
                            <th scope="col">Media</th>
                            <th scope="col">Publisher</th>
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
                            <th scope="row">'.$value['idMedia'].'</th>
                            <td>'.$value['titelMedia'].'</td>
                            <td><img src='.$value['imgMedia'].' height="50" width="50"></td>
                            <td>'.$value['firstNameAuthor']." ".$value['lastNameAuthor'].'</td>
                            <td>'.$value['typeMedia'].'</td>
                            <td>'.$value['namePublisher'].'</td>
                            <td>'.$value['statusMedia'].'</td>
                            <td><a href="edit.php?id='.$value['idMedia'].'&id2='.$value['authorID'].'&id3='.$value['idPublisher'].'"><button class="btn btn-warning">Edit</button></a></td>
                            <td><a href="delete.php?id='.$value['idMedia'].'&id2='.$value['authorID'].'&id3='.$value['idPublisher'].'"><button class="btn btn-danger">Delete</button></a></td>
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

