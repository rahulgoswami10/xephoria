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

// TODO: will be removed laterx
// echo "<pre>";
// print_r($_POST);
// exit();



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
// $update = mysqli_stmt_execute($update_stmt);


mysqli_begin_transaction($conn);

try {

    // EXECUTE UPDATE 
    $update = mysqli_stmt_execute($update_stmt);

    if (!$update) {
        throw new Exception("Course update failed");
    }


    $current_section_ids = [];

    $get_sections = mysqli_prepare(
        $conn,
        "SELECT id FROM course_sections WHERE course_id = ?"
    );

    mysqli_stmt_bind_param(
        $get_sections,
        "i",
        $course_id
    );

    mysqli_stmt_execute($get_sections);

    $result_sections = mysqli_stmt_get_result($get_sections);

    while ($row = mysqli_fetch_assoc($result_sections)) {

        $current_section_ids[] = $row['id'];

    }


    $submitted_section_ids = [];

    if(isset($_POST['existing_section_id'])){

        foreach($_POST['existing_section_id'] as $id){

            $submitted_section_ids[] = intval($id);

        }

    }

    $sections_to_delete = array_diff(
        $current_section_ids,
        $submitted_section_ids
    );

    foreach($sections_to_delete as $section_id){

        $delete_lessons = mysqli_prepare(
            $conn,
            "DELETE FROM lessons
            WHERE section_id = ?"
        );

        mysqli_stmt_bind_param(
            $delete_lessons,
            "i",
            $section_id
        );

        mysqli_stmt_execute($delete_lessons);

    }

    foreach($sections_to_delete as $section_id){

        $delete_section = mysqli_prepare(
            $conn,
            "DELETE FROM course_sections
            WHERE id = ?"
        );

        mysqli_stmt_bind_param(
            $delete_section,
            "i",
            $section_id
        );

        mysqli_stmt_execute($delete_section);

    }


    // ====================================== UPDATE EXISTING SECTIONS ====================================== //
    if(isset($_POST['existing_section_id'])){

        foreach($_POST['existing_section_id'] as $index => $section_id){

            $section_id = intval($section_id);

            $section_title = trim(
                $_POST['section_title'][$index]
            );

            $update_section = mysqli_prepare(
                $conn,
                "UPDATE course_sections
                SET section_title = ?
                WHERE id = ?"
            );

            mysqli_stmt_bind_param(
                $update_section,
                "si",
                $section_title,
                $section_id
            );

            mysqli_stmt_execute($update_section);

            if(mysqli_stmt_affected_rows($update_section) < 0){

                throw new Exception(
                    "Failed to update section"
                );

            }

        }

    }




    // ====================================== UPDATE EXISTING LESSONS ====================================== //
    if(isset($_POST['existing_lesson_id']))
    {
        foreach($_POST['existing_lesson_id'] as $section_index => $lesson_ids)
        {
            foreach($lesson_ids as $lesson_index => $lesson_id)
            {
                $lesson_id = intval($lesson_id);

                $lesson_title =
                    trim($_POST['lesson_title'][$section_index][$lesson_index]);

                $video_url =
                    $_POST['video_url'][$section_index][$lesson_index] ?? '';

                $duration =
                    $_POST['lesson_duration'][$section_index][$lesson_index] ?? '';

                $lesson_content =
                    $_POST['lesson_content'][$section_index][$lesson_index] ?? '';

                $is_preview =
                    $_POST['is_preview'][$section_index][$lesson_index] ?? 0;

                $update_lesson = mysqli_prepare(
                    $conn,
                    "UPDATE lessons
                    SET
                        lesson_title = ?,
                        video_url = ?,
                        duration = ?,
                        lesson_content = ?,
                        is_preview = ?
                    WHERE id = ?"
                );

                mysqli_stmt_bind_param(
                    $update_lesson,
                    "ssssii",
                    $lesson_title,
                    $video_url,
                    $duration,
                    $lesson_content,
                    $is_preview,
                    $lesson_id
                );

                mysqli_stmt_execute($update_lesson);
            }
        }
    }




    // ====================================== DELETE REMOVED LESSONS ====================================== //
    $current_lesson_ids = [];

    $get_lessons = mysqli_prepare(
        $conn,
        "SELECT id
        FROM lessons
        WHERE course_id = ?"
    );

    mysqli_stmt_bind_param(
        $get_lessons,
        "i",
        $course_id
    );

    mysqli_stmt_execute($get_lessons);

    $result_lessons =
        mysqli_stmt_get_result($get_lessons);

    while($row = mysqli_fetch_assoc($result_lessons))
    {
        $current_lesson_ids[] = $row['id'];
    }

    $submitted_lesson_ids = [];

    if(isset($_POST['existing_lesson_id']))
    {
        foreach($_POST['existing_lesson_id'] as $lesson_group)
        {
            foreach($lesson_group as $lesson_id)
            {
                $submitted_lesson_ids[] =
                    intval($lesson_id);
            }
        }
    }

    $lessons_to_delete = array_diff(
        $current_lesson_ids,
        $submitted_lesson_ids
    );

    foreach($lessons_to_delete as $lesson_id)
    {
        $delete_lesson = mysqli_prepare(
            $conn,
            "DELETE FROM lessons
            WHERE id = ?"
        );

        mysqli_stmt_bind_param(
            $delete_lesson,
            "i",
            $lesson_id
        );

        mysqli_stmt_execute($delete_lesson);
    }



    // ====================================== INSERT NEW LESSONS INTO EXISTING SECTIONS ====================================== //
    if(isset($_POST['existing_section_id']))
    {
        foreach($_POST['existing_section_id'] as $section_index => $section_id)
        {
            $section_id = intval($section_id);

            if(!isset($_POST['lesson_title'][$section_index]))
            {
                continue;
            }

            foreach($_POST['lesson_title'][$section_index] as $lesson_index => $lesson_title)
            {
                if(
                    isset($_POST['existing_lesson_id'][$section_index][$lesson_index])
                )
                {
                    continue;
                }

                $lesson_title = trim($lesson_title);

                if(empty($lesson_title))
                {
                    continue;
                }

                $video_url =
                    $_POST['video_url'][$section_index][$lesson_index] ?? '';

                $duration =
                    $_POST['lesson_duration'][$section_index][$lesson_index] ?? '';

                $lesson_content =
                    $_POST['lesson_content'][$section_index][$lesson_index] ?? '';

                $is_preview =
                    $_POST['is_preview'][$section_index][$lesson_index] ?? 0;

                $insert_lesson = mysqli_prepare(
                    $conn,
                    "INSERT INTO lessons
                    (
                        course_id,
                        section_id,
                        lesson_title,
                        video_url,
                        duration,
                        lesson_content,
                        is_preview
                    )
                    VALUES
                    (?, ?, ?, ?, ?, ?, ?)"
                );

                mysqli_stmt_bind_param(
                    $insert_lesson,
                    "iissssi",
                    $course_id,
                    $section_id,
                    $lesson_title,
                    $video_url,
                    $duration,
                    $lesson_content,
                    $is_preview
                );

                mysqli_stmt_execute($insert_lesson);
            }
        }
    }



    // ====================================== INSERT NEW SECTIONS + LESSONS ====================================== //
    foreach($_POST['section_title'] as $index => $section_title){

        if(
            !isset($_POST['existing_section_id'][$index])
        ){

            $section_title = trim($section_title);

            if(empty($section_title)){
                continue;
            }

            $insert_section = mysqli_prepare(
                $conn,
                "INSERT INTO course_sections
                (
                    course_id,
                    section_title
                )
                VALUES (?, ?)"
            );

            mysqli_stmt_bind_param(
                $insert_section,
                "is",
                $course_id,
                $section_title
            );

            mysqli_stmt_execute($insert_section);

            $new_section_id = mysqli_insert_id($conn);

            // LESSON INSERTION

            if(isset($_POST['lesson_title'][$index])){

                foreach(
                    $_POST['lesson_title'][$index]
                    as $lesson_index => $lesson_title
                ){

                    $lesson_title =
                        trim($lesson_title);

                    if(empty($lesson_title)){
                        continue;
                    }

                    $video_url =
                        $_POST['video_url'][$index][$lesson_index] ?? '';

                    $duration =
                        $_POST['lesson_duration'][$index][$lesson_index] ?? '';

                    $lesson_content =
                        $_POST['lesson_content'][$index][$lesson_index] ?? '';

                    $is_preview =
                        $_POST['is_preview'][$index][$lesson_index] ?? 0;

                    $insert_lesson = mysqli_prepare(
                        $conn,
                        "INSERT INTO lessons
                        (
                            course_id,
                            section_id,
                            lesson_title,
                            video_url,
                            duration,
                            lesson_content,
                            is_preview
                        )
                        VALUES
                        (
                           ?, ?, ?, ?, ?, ?, ?
                        )"
                    );

                    mysqli_stmt_bind_param(
                        $insert_lesson,
                        "iissssi",
                        $course_id,
                        $new_section_id,
                        $lesson_title,
                        $video_url,
                        $duration,
                        $lesson_content,
                        $is_preview
                    );

                    mysqli_stmt_execute(
                        $insert_lesson
                    );
                }
            }
        }
    }


    mysqli_commit($conn);

    header("Location: manage_courses.php?success=updated");
    exit();

} catch (Exception $e) {
    mysqli_rollback($conn);

    die($e->getMessage());
}



// REDIRECT 
// if ($update) { 
//     header("Location: manage_courses.php?success=updated"); 
//     exit(); 
// } else { 
//     echo "Something went wrong!"; 
// }

?>