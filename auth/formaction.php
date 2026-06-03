<?php

include('../db/connection.php');

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Password match check
    if($password != $confirm_password){

        echo "Passwords do not match!";

    }else{

        // Password hash
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Default values
        $user_type = "student";
        $profile_pic = "default.png";
        $bio = "";
        $status = "active";

        // Insert query
        $sql = "INSERT INTO users
        (name, email, phone, password, user_type, profile_pic, bio, status)
        
        VALUES
        
        ('$name', '$email', '$phone', '$hashed_password', '$user_type', '$profile_pic', '$bio', '$status')";

        $result = mysqli_query($conn, $sql);

        if($result){

            echo "Registration Successful!";

        }else{

            echo "Something went wrong!";

        }

    }

}

?>