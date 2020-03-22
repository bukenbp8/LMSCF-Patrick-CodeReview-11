<?php 
    ob_start();
    require_once 'includes/dbh.inc.php';
    require "header.php"; 

    if ($_GET['id']) {
        $id = $_GET['id'];

        $detailsMedia = mysqli_query($conn, "SELECT * FROM media t1 JOIN authors t2 ON t1.authorIdMedia = t2.authorID JOIN publisher t3 ON t1.publisherIdMedia = t3.idPublisher WHERE idMedia = {$id}");
    
        $row = $detailsMedia->fetch_assoc();
        echo '
        <div class="container">
            <div class="card col-md-8 mx-auto">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="'.$row["imgMedia"].'" class="card-img-top h-100" alt="...">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h2 class="card-title">'.$row["titelMedia"].'</h2>
                            <h5>Summary:</h5>
                            <p class="card-text">'.$row["descMedia"].'</p>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Author</th>
                                        <th scope="col">Media</th>
                                        <th scope="col">Released</th>
                                        <th scope="col">Publisher/Studio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">'.$row['firstNameAuthor']." ".$row['lastNameAuthor'].'</td>
                                        <td>'.$row['typeMedia'].'</td>
                                        <td>'.$row['publDateMedia'].'</td>
                                        <td>'.$row['namePublisher'].'</td>
                                    </tr>
                                </tbody>
                                </table>
                                '.(($row['statusMedia'] == 'Available')?'<div class="row justify-content-between"><div class="alert alert-success text-center col-sm-5">Available</div><a href="borrow.php?id='.$row['idMedia'].'" class="btn btn-primary col-sm-5 mb-3">Borrow</a>':'<div class="alert alert-danger text-center">Not Available</div>').'
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    }


    