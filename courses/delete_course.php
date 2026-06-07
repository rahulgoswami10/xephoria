<?php

require_once('../db/connection.php');

session_start();

//check login
if (!isset($_SESSION['user_id'])) {

    header("Location: ../auth/login.php");
    exit();
}


// only instructor
if ($_SESSION['user_type'] != 2) {
    
    // header("Location: ../index.php");
    header("Location: ../auth/login.php");
    exit();
}

$course_id = intval($_GET['id']);

$instructor_id = $_SESSION['user_id'];


// GET COURSE

$query = "SELECT * FROM courses WHERE id = ? AND instructor_id = ?";

$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($stmt, "ii", $course_id, $instructor_id);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$course = mysqli_fetch_assoc($result);


// course not found
if (!$course) {

    header("Location: manage_courses.php");
    exit();
}


// ============================
// DELETE IMAGE
// ============================

if (!empty($course['thumbnail'])) {

    $image_path = "../uploads/course_thumbnails/" . $course['thumbnail'];

    if (file_exists($image_path)) {

        unlink($image_path);
    }
}



// DELETE COURSE

$delete_query = "DELETE FROM courses WHERE id = ? AND instructor_id = ?";

$delete_stmt = mysqli_prepare($conn, $delete_query);

mysqli_stmt_bind_param($delete_stmt, "ii", $course_id, $instructor_id);

$delete = mysqli_stmt_execute($delete_stmt);



// ============================
// REDIRECT
// ============================

if ($delete) {

    header("Location: manage_courses.php?success=deleted");
    exit();

} else {

    echo "Something went wrong!";
}
?>
