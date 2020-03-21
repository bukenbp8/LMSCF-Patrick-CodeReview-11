<?php
    require "header.php";
?>

    <main>
        <div class="container">
            <div class="d-flex justify-content-center bg-light mt-4 rounded">
                <form action="includes/signup.inc.php" method="post" class="col-6">
                    <h1 class="text-center pt-2 pb-2">Sign Up</h1>
                    <?php 
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == "emptyfields") {
                                echo '<div class="alert alert-danger" id="fadeout" role="alert">You need to fill out all fields!</div>';
                            } elseif ($_GET['error'] == "invalidmailuid") {
                                echo '<div class="alert alert-danger" id="fadeout" role="alert">Invalid username and email!</div>';
                            } elseif ($_GET['error'] == "invalidmail") {
                                echo '<div class="alert alert-danger" id="fadeout" role="alert">Invalid email!</div>';
                            } elseif ($_GET['error'] == "invaliduid") {
                                echo '<div class="alert alert-danger" id="fadeout" role="alert">Invalid username!</div>';
                            } elseif ($_GET['error'] == "passwordcheck") {
                                echo '<div class="alert alert-danger" id="fadeout" role="alert">Passwords do not match!</div>';
                            } elseif ($_GET['error'] == "usertaken") {
                                echo '<div class="alert alert-danger" id="fadeout" role="alert">Username is already taken!</div>';
                            }
                        } 
                        
                        if (isset($_GET['signup'])) {
                            if ($_GET['signup'] == "success") {
                            echo '<div class="alert alert-success" id="fadeout" role="alert">Your account was created successfully!</div>';
                        }
                        }
                    ?>
                    <div class="form-group">
                        <input type="text" name="uid" placeholder="Username" class="form-control mb-2">
                        <input type="text" name="mail" placeholder="Email" class="form-control mb-2">
                        <input type="text" name="firstName" placeholder="First Name" class="form-control mb-2">
                        <input type="text" name="lastName" placeholder="Second Name" class="form-control mb-2">
                        <input type="password" name="pwd" placeholder="Password" class="form-control mb-2">
                        <input type="password" name="pwd-repeat" placeholder="Repeat password" class="form-control mb-2">
                        <button type="submit" name="signup-submit" class="btn btn-primary col-12">Sign up</button>
                    </div>
                </form>
            </div>
        </div>
    </main>