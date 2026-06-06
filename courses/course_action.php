<?php

session_start();

require_once('../db/connection.php');


// ============================
// CHECK LOGIN
// ============================

if (!isset($_SESSION['user_id'])) {

    header("Location: ../auth/login.php");
    exit();
}


// ============================
// CHECK USER TYPE
// ============================

if ($_SESSION['user_type'] != 2) {

    header("Location: ../index.php");
    exit();
}


// ============================
// CHECK FORM SUBMIT
// ============================

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    
    // ============================
    // GET FORM DATA
    // ============================

    $instructor_id = $_SESSION['user_id'];

    $title = trim($_POST['title']);

    $category_id = trim($_POST['category_id']);

    $level = trim($_POST['level']);

    $language = trim($_POST['language']);

    $description = trim($_POST['description']);

    $short_description = trim($_POST['short_description']);

    $price = trim($_POST['price']);

    $course_duration = trim($_POST['course_duration']);

    $intro_video = trim($_POST['intro_video']);



    // ============================
    // COURSE STATUS
    // ============================

    $status = "pending";



    // ============================
    // FREE COURSE CHECK
    // ============================

    $is_free = isset($_POST['is_free']) ? 1 : 0;


    // if free course
    if ($is_free == 1) {

        $price = 0;
    }



    // ============================
    // VALIDATION
    // ============================

    if (
        empty($title) ||
        empty($category_id) ||
        empty($level) ||
        empty($language) ||
        empty($description)
    ) {

        echo "Please fill all required fields!";
        exit();
    }



    // ============================
    // GENERATE SLUG
    // ============================

    $slug = strtolower($title);

    $slug = str_replace(' ', '-', $slug);

    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);

    $slug = time() . '-' . $slug;



    // ============================
    // IMAGE UPLOAD
    // ============================

    $thumbnail_name = "";


    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {

        $allowed_types = ['jpg', 'jpeg', 'png', 'webp'];

        $file_name = $_FILES['thumbnail']['name'];

        $file_tmp = $_FILES['thumbnail']['tmp_name'];

        $file_size = $_FILES['thumbnail']['size'];

        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));


        // validate extension
        if (!in_array($file_ext, $allowed_types)) {

            echo "Only JPG, JPEG, PNG & WEBP files allowed!";
            exit();
        }


        // validate size (2MB)
        if ($file_size > 2 * 1024 * 1024) {

            echo "Image size must be less than 2MB!";
            exit();
        }


        // create unique image name
        $thumbnail_name = time() . '_' . rand(1111, 9999) . '.' . $file_ext;


        // upload path
        // $upload_path = "../uploads/course_thumbnails/" . $thumbnail_name;
        // $upload_path = "../" . $thumbnail_name;


        // move file
        // move_uploaded_file($file_tmp, $upload_path);

        // if (!move_uploaded_file($file_tmp, $upload_path)) {

        //     echo "Failed to upload image!";
        //     exit();
        // }



        // upload directory
        $upload_dir = "../uploads/course_thumbnails/";


        // create folder if not exists
        if (!file_exists($upload_dir)) {

            mkdir($upload_dir, 0777, true);
        }


        // final upload path
        $upload_path = $upload_dir . $thumbnail_name;


        // move file
        if (move_uploaded_file($file_tmp, $upload_path)) {

            echo "Image uploaded successfully";

        } else {

            echo "Image upload failed";

            echo "<br><br>";

            echo "Upload Path : " . $upload_path;

            exit();
        }
    }



    // ============================
    // INSERT QUERY
    // ============================

    $query = "INSERT INTO courses (

        instructor_id,
        category_id,
        title,
        slug,
        short_description,
        description,
        thumbnail,
        price,
        level,
        language,
        status,
        is_free,
        course_duration,
        intro_video

    )

    VALUES (

        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?

    )";



    // ============================
    // PREPARE QUERY
    // ============================

    $stmt = mysqli_prepare($conn, $query);



    // ============================
    // BIND VALUES
    // ============================

    mysqli_stmt_bind_param(

        $stmt,
        "iisssssdsssiss",

        $instructor_id,
        $category_id,
        $title,
        $slug,
        $short_description,
        $description,
        $thumbnail_name,
        $price,
        $level,
        $language,
        $status,
        $is_free,
        $course_duration,
        $intro_video

    );



    // ============================
    // EXECUTE QUERY
    // ============================

    $execute = mysqli_stmt_execute($stmt);



    // ============================
    // SUCCESS
    // ============================

    if ($execute) {

        header("Location: manage_courses.php?success=course_added");
        exit();
    }

    // ============================
    // ERROR
    // ============================

    else {

        echo "Something went wrong!";
    }
}

?>