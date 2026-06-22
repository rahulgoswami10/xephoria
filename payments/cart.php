<?php

require_once("../db/connection.php");

session_start();

if (!isset($_SESSION['user_id'])) {
	header('Location: ../auth/login.php');
	exit();
}


if ($_SESSION['user_type'] != 3) {
	header('Location: ../auth/login.php');
	exit();
}


$student_id = $_SESSION['user_id'];



$cart_query = mysqli_query(
    $conn,
    "
    SELECT
        cart.id AS cart_id,
        courses.*,
        users.name AS instructor_name,
        users.profile_pic
    FROM cart
    INNER JOIN courses
        ON courses.id = cart.course_id
    LEFT JOIN users
        ON users.id = courses.instructor_id
    WHERE cart.student_id = {$student_id}
"
);


?>

<!DOCTYPE html>
<html lang="en">

<?php @include('../includes/header.php'); ?>


<body>
	

	<!--================================================================= Main Wrapper =================================================================-->
	<div class="main-wrapper">

		<!-- topbar -->
		<?php @include('../student/includes/topbar.php'); ?>

		<!-- navbar -->
		<?php @include('../student/includes/navbar.php'); ?>


		<!-- Breadcrumb -->
		<div class="breadcrumb-bar text-center">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-12">
						<h2 class="breadcrumb-title mb-2">Cart</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb justify-content-center mb-0">
								<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Cart</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- Breadcrumb -->

		<!-- Cart -->
		<div class="content">
			<div class="container">
				<div class="cart-cover">
					<div class="cart-items">
						<div>
							<div class="cart-head border-bottom d-flex justify-content-between align-items-center pb-4">
								<h5 class="mb-0">
									<?= mysqli_num_rows($cart_query); ?> Courses
								</h5>
								<button class="btn btn-sm btn-danger-ghost mb-0"><i
										class="isax isax-close-circle me-1"></i>Clear cart</button>
							</div>
							<div class="row row-gap-3 pb-3 mb-3 border-bottom">

								<?php
								$total = 0;

								while($item = mysqli_fetch_assoc($cart_query)) {

									$total += $item['price'];
								?>

									<div class="col-md-12">
										<div class="cart-item mb-0">
											<div class="row align-items-center row-gap-3">
												<div class="col-md-3">
													<div class="cart-img">
														<a href="course-details.html">
															<img
															src="../uploads/<?= htmlspecialchars($item['thumbnail']) ?>"
															class="img-fluid w-100">
														</a>
													</div>
												</div>

												<div class="col-md-9">
													<div class="row align-items-center justify-content-between">
														<div class="col-md-9">
															<div class="d-flex align-items-center mb-2">
																<a href="instructor-profile.html"
																	class="avatar avatar-sm rounded-circle me-2">
																	<img src="../assets/img/user/user-01.jpg" alt="img"
																		class="img-fluid rounded-circle">
																</a>
																<p class="mb-0">
																	<a href="instructor-profile.html">
																		<?= htmlspecialchars($item['instructor_name']) ?>
																	</a>
																</p>
															</div>
															<div class="mb-2">
																<h6 class="fs-18 mb-0">
																	<a href="course-details.html">
																		<?= htmlspecialchars($item['title']) ?>
																	</a>
																	</h6>
															</div>
															<div class="d-flex align-items-center">
																<span class="star me-2"><i
																		class="fa-solid fa-star"></i></span>
																<p class="mb-0">4.9 (200 Reviews)</p>
																<span class="mx-2 bg-secondary rounded-circle dot"></span>
																<p class="mb-0"><?= htmlspecialchars($item['level']) ?></p>
															</div>
														</div>
														<div class="col-md-3">
															<div
																class="d-flex align-items-center justify-content-end gap-4 cart-trash">
																<h5 class="text-secondary">₹<?= number_format($item['price'], 2) ?></h5>
																<a href="remove-from-cart.php?id=<?= $item['cart_id'] ?>" 
																class="trash-btn">
																	<i class="isax isax-trash4"></i>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

								<?php } ?>



							</div>
							<div class="bg-light border rounded-2 p-3 mb-4">
								<div class="row align-items-center justify-content-between row-gap-3">
									<div class="col-md-6">
										<h6 class="mb-1">₹<?= number_format($total,2) ?></h6>
										<p class="mb-0">All Courses have a <span
												class="text-gray-9 fw-medium mx-1">30-day</span>money-back guarantee</p>
									</div>
									<div class="col-md-6 text-end">
										<h5>₹<?= number_format($total,2) ?></h5>
									</div>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-end flex-wrap">
								<a href="course-grid.php" class="btn continue-shopping-btn rounded-pill me-2">Continue
									Shopping</a>
								<a href="checkout.php" class="btn checkout-btn rounded-pill">Checkout</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Cart -->

		<!--========================================== footer ==========================================-->
		<?php @include('../student/includes/footer.php'); ?>

	</div>
	<!--================================================================= Main Wrapper =================================================================-->


</html>