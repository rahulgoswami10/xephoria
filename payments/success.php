<?php

require_once("../db/connection.php");

session_start();

if (!isset($_SESSION['user_id']) && $_SESSION['user_type'] != 3) {

    header("Location: ../auth/login.php");
    exit();
}

$student_id = $_SESSION['user_id'];



//=========================================== Get all cart items ===========================================//
$cart_query = mysqli_query(
    $conn,
    "SELECT
        cart.course_id,
        courses.price
    FROM cart
    INNER JOIN courses
        ON courses.id = cart.course_id
    WHERE cart.student_id = {$student_id}
    "
);

if (mysqli_num_rows($cart_query) == 0) {
    header("Location: cart.php");
    exit();
}



//=========================================== Insert payments + enrollments ===========================================//
while($item = mysqli_fetch_assoc($cart_query)) {
    
    $course_id = $item['course_id'];
    $amount = $item['price'];

    $transaction_id = "TXN" . time() . rand(1000, 9999);


    //============= payments table =============//
    mysqli_query(
        $conn,
        "
            INSERT INTO payments
            (
                student_id,
                course_id,
                amount,
                payment_method,
                payment_gateway,
                transaction_id,
                payment_status,
                paid_at
            )
            VALUES
            (
                '$student_id',
                '$course_id',
                '$amount',
                'card',
                'mock',
                '$transaction_id',
                'success',
                NOW()
            )
        "
    );

    //============= enrollments table =============//
    $check_enrollment = mysqli_query(
        $conn,
        "
            SELECT id
            FROM enrollments
            WHERE student_id = '$student_id'
            AND course_id = '$course_id'
        "
    );

    if (mysqli_num_rows($check_enrollment) == 0) {

        mysqli_query(
            $conn,
            "
                INSERT INTO enrollments
                (
                    student_id,
                    course_id
                )
                VALUES
                (
                    '$student_id',
                    '$course_id'
                )
            "
        );
    }

}   



//=========================================== clear cart ===========================================//
mysqli_query(
    $conn,

    "
    DELETE FROM cart
    WHERE student_id = '$student_id'
    "
);



?>


<!DOCTYPE html>
<html>

<!--============= head =============-->
<?php @include('../includes/header.php'); ?>

<body>

<div class="main-wrapper">

    <!--============= topbar =============-->
    <?php @include('../student/includes/topbar.php'); ?>

    <!--============= navbar =============-->
    <?php @include('../student/includes/navbar.php'); ?>

    <div class="content">
        <div class="container">

            <div class="text-center py-5">

                <h2 class="text-success mb-3">
                    Payment Successful 🎉
                </h2>

                <p class="mb-4">
                    Your courses have been enrolled successfully.
                </p>

                <a
                    href="../student/dashboard.php"
                    class="btn btn-primary rounded-pill me-2">
                    Go To Dashboard
                </a>

                <a
                    href="../student/my-courses.php"
                    class="btn btn-success rounded-pill">
                    My Courses
                </a>

            </div>

        </div>
    </div>

    <?php @include('../student/includes/footer.php'); ?>

</div>

</body>
</html>