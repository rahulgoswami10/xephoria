<?php

session_start();


@include('../db/connection.php');

if (isset($_POST['login'])) {

    $user_captcha = $_POST['captcha'];

    if ($user_captcha != $_SESSION['captcha']) {
        echo "Invalid Captcha!";
        exit();
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        
        $user = mysqli_fetch_assoc($result);


        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_type'] = $user['user_type'];


            if ($user['user_type'] == 1) {
                header("Location: ../admin/dashboard.php");
            }

            elseif($user['user_type'] == 2) {
                header("Location: ../instructor/dashboard.php");
            }

            else {
                  header("Location: ../student/dashboard.php");
            }

            exit();

        } else {
             echo "Incorrect Password!";
        }
    }else {
            echo "Email Not Found!";
    }
}