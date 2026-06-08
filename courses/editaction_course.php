<?php

require_once("../db/connection.php");

session_start();



// check login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}




// check if the user is instructor or not
if ($_SESSION['user_type'] != 2) { 
    header("Location: ../auth/login.php"); 
    exit();
}


// check form submit
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: manage_courses.php");
    exit();
}



// get form data
$course_id = intval($_POST['course_id']); 
$instructor_id = $_SESSION['user_id']; 
$title = trim($_POST['title']); 
$category_id = intval($_POST['category_id']); 
$level = trim($_POST['level']); 
$language = trim($_POST['language']); 
$price = trim($_POST['price']); 
$course_duration = trim($_POST['course_duration']); 
$intro_video = trim($_POST['intro_video']); 
$short_description = trim($_POST['short_description']); 
$description = trim($_POST['description']);



// get existing course
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


// KEEP OLD THUMBNAIL 
$thumbnail_name = $course['thumbnail'];



// check new thumbnail
if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {

    $file_name = $_FILES['thumbnail']['name']; 
    $file_tmp = $_FILES['thumbnail']['tmp_name']; 
    $file_size = $_FILES['thumbnail']['size'];

    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION)); 
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];


    // validate extension 
    if (!in_array($file_ext, $allowed)) { 
        die("Only JPG, JPEG, PNG & WEBP files are allowed."); 
    } 

    // validate size (2MB) 
    if ($file_size > 2 * 1024 * 1024) { 
        die("Image size must be less than 2MB."); 
    }

    // create unique image name 
    $thumbnail_name = time() . '_' . rand(1111, 9999) . '.' . $file_ext; $upload_path = "../uploads/course_thumbnails/" . $thumbnail_name;


    // upload image 
    if (move_uploaded_file($file_tmp, $upload_path)) { 
        // delete old image 
        if (!empty($course['thumbnail'])) { 
            $old_image = "../uploads/course_thumbnails/" . $course['thumbnail']; 
            if (file_exists($old_image)) { 
                unlink($old_image); 
            } 
        } 
    } else { 
        die("Failed to upload image."); 
    }

}



// UPDATE QUERY 
$update_query = "
     UPDATE courses SET 
     title = ?, 
     category_id = ?,
    short_description = ?, 
    description = ?, 
    thumbnail = ?, 
    price = ?, 
    level = ?, 
    language = ?, 
    course_duration = ?, 
    intro_video = ?, 
    updated_at = NOW() WHERE id = ? AND instructor_id = ? "
;

$update_stmt = mysqli_prepare($conn, $update_query);

mysqli_stmt_bind_param( 
    $update_stmt, 
    "sisssdssssii",

    $title, 
    $category_id, 
    $short_description, 
    $description, 
    $thumbnail_name, 
    $price,
    $level,
    $language, 
    $course_duration, 
    $intro_video,
    $course_id, 
    $instructor_id 
);


// EXECUTE UPDATE 
$update = mysqli_stmt_execute($update_stmt);



// REDIRECT 
if ($update) { 
    header("Location: manage_courses.php?success=updated"); 
    exit(); 
} else { 
    echo "Something went wrong!"; 
}

?>