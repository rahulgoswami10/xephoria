<?php

require_once("../db/connection.php");
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

if ($_SESSION['user_type'] != 3) {
    header("Location: ../auth/login.php");
    exit();
}

$student_id = $_SESSION['user_id'];
$course_id = (int)$_GET['course_id'];

$check = mysqli_query(
        $conn,
        "SELECT id
        FROM cart
        WHERE student_id = $student_id
        AND course_id = $course_id"    
);


if (mysqli_num_rows($check) == 0) {
    mysqli_query(
        $conn,
        "INSERT INTO cart(student_id, course_id)
        VALUES($student_id, $course_id)"
    );
}

header("Location: cart.php");
exit();



?>