<?php

if(isset($_POST['login-submit']))   {

    require 'dbh.inc.php';

    $mailuid = mysqli_real_escape_string($conn, $_POST['mailuid']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);

    if (empty($mailuid) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['password']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                } elseif($pwdCheck == true) {
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['fullname'] = $row['name'];
                    $_SESSION['role'] = $row['user_role'];
                    $_SESSION['joined'] = $row['joined'];
                    $_SESSION['login_message']='<div class="alert alert-success col-sm-4 mx-auto mt-3" id="fadeout" role="alert">You are logged in!</div>';

                    header("Location: ../index.php?login=success");
                    exit();
                }
            } else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        } 
    }

} else {
    header("Location: ../index.php");
    exit();
}