
<?php

require_once('../db/connection.php');


session_start();

if (!isset($_SESSION['user_id'])) {
	header("Location: ../auth/login.php");
	exit();
}

if ($_SESSION['user_type'] != 2) {
	
	header("Location: ../index.php");
	exit();
}

?>


<?php


$instructor_id = $_SESSION['user_id'];

$query = "

SELECT 
    courses.*,
    categories.category_name

FROM courses

LEFT JOIN categories
ON courses.category_id = categories.id

WHERE courses.instructor_id = '$instructor_id'

ORDER BY courses.id DESC

";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		content="Dreams LMS is a powerful Learning Management System template designed for educators, training institutions, and businesses. Manage courses, track student progress, conduct virtual classes, and enhance e-learning experiences with an intuitive and feature-rich platform.">
	<meta name="keywords"
		content="LMS template, Learning Management System, e-learning software, online course platform, student management, education portal, virtual classroom, training management system, course tracking, online education">
	<meta name="author" content="Dreams Technologies">
	<meta name="robots" content="index, follow">

	<title>Dreams LMS | Advanced Learning Management System Template</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="../assets/img/favicon.png">
	<link rel="apple-touch-icon" href="../assets/img/apple-icon.png">

	<!-- Theme Settings Js -->
	<script src="../assets/js/theme-script.js"></script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">

	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


	<!-- Feather CSS -->
	<link rel="stylesheet" href="../assets/css/feather.css">

	<!-- Select2 CSS -->
	<link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">

	<!-- Bootstrap Tagsinput CSS -->
	<link rel="stylesheet" href="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">

	<!-- Summernote JS -->
	<link rel="stylesheet" href="../assets/plugins/summernote/summernote-lite.min.css">

	<!-- Iconsax CSS -->
	<link rel="stylesheet" href="../assets/css/iconsax.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="../assets/css/style.css">

</head>


<body>
	
	<a href="../../cdn-cgi/contentcb94.html?id=2IkvY.8DM.4OR9oniwLRAvVIgpr38vO4iuw8x6BrujY-1780432679.0080192-1.0.1.1-NmElfWIW2RP0sJmm.456Un1HmygKKUEXQX05hKNnnVo" aria-hidden="true" rel="nofollow noopener" style="display: none !important; visibility: hidden !important"></a>

	<!-- Main Wrapper -->
	<div class="main-wrapper">


		<!--==== topbar ====-->
		<?php @include('../includes/topbar.php'); ?>

		<!--==== navbar ====-->
		<?php @include('../includes/navbar.php');  ?>


		<!-- Breadcrumb -->
		<div class="breadcrumb-bar text-center">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-12">
						<h2 class="breadcrumb-title mb-2">Edit Course</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb justify-content-center mb-0">
								<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Course</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->


		<!--  -->
		<div class="content">
			<div class="container">





			</div>
		</div>
	



		<!-- Footer -->
		<footer class="footer">
			<div class="footer-bg">
				<img src="../assets/img/bg/footer-bg-01.png" class="footer-bg-1" alt="">
				<img src="../assets/img/bg/footer-bg-02.png" class="footer-bg-2" alt="">
			</div>
			<div class="footer-top">
				<div class="container">
					<div class="row row-gap-4">
						<div class="col-lg-4">
							<div class="footer-about">
								<div class="footer-logo">
									<img src="../assets/img/logo.svg" alt="">
								</div>
								<p>Platform designed to help organizations, educators, and learners manage, deliver, and
									track learning and training activities.</p>
								<div class="d-flex align-items-center">
									<a href="#" class="me-2"><img src="../assets/img/icon/appstore.svg" alt=""></a>
									<a href="#"><img src="../assets/img/icon/googleplay.svg" alt=""></a>
								</div>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="row row-gap-4">
								<div class="col-lg-3">
									<div class="footer-widget footer-menu">
										<h5 class="footer-title">For Instructor</h5>
										<ul>
											<li><a href="course-grid.html">Search Mentors</a></li>
											<li><a href="login.html">Login</a></li>
											<li><a href="register.html">Register</a></li>
											<li><a href="course-list.html">Booking</a></li>
											<li><a href="student-dashboard.html">Students Dashboard</a></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="footer-widget footer-menu">
										<h5 class="footer-title">For Student</h5>
										<ul>
											<li><a href="javascript:void(0);">Appointments</a></li>
											<li><a href="instructor-message.html">Chat</a></li>
											<li><a href="login.html">Login</a></li>
											<li><a href="register.html">Register</a></li>
											<li><a href="instructor-dashboard.html">Instructor Dashboard</a></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="footer-widget footer-contact">
										<h5 class="footer-title">Newsletter</h5>
										<div class="subscribe-input">
											<form action="javascript:void(0);">
												<input type="email" class="form-control"
													placeholder="Enter your Email Address">
												<button type="submit"
													class="btn btn-primary btn-sm inline-flex align-items-center"><i
														class="isax isax-send-2 me-1"></i>Subscribe</button>
											</form>
										</div>
										<div class="footer-contact-info">
											<div class="footer-address d-flex align-items-center">
												<img src="../assets/img/icon/icon-20.svg" alt="Img" class="img-fluid me-2">
												<p> 3556 Beech Street, San Francisco,<br> California, CA 94108 </p>
											</div>
											<div class="footer-address d-flex align-items-center">
												<img src="../assets/img/icon/icon-19.svg" alt="Img" class="img-fluid me-2">
												<p>dreamslms@example.com</p>
											</div>
											<div class="footer-address d-flex align-items-center">
												<img src="../assets/img/icon/icon-21.svg" alt="Img" class="img-fluid me-2">
												<p>+19 123-456-7890</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<div class="row row-gap-2">
						<div class="col-md-6">
							<div class="text-center text-md-start">
								<p class="text-white">Copyright &copy; 2026 DreamsLMS. All rights reserved.</p>
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<ul
									class="d-flex align-items-center justify-content-center justify-content-md-end footer-link">
									<li><a href="terms-and-conditions.html">Terms & Conditions</a></li>
									<li><a href="privacy-policy.html">Privacy Policy</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- /Footer -->


	</div>
	<!--============================================  Main Wrapper ============================================ -->


	<!-- jQuery -->
	<script src="../assets/js/jquery-3.7.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="../assets/js/bootstrap.bundle.min.js"></script>

	<!-- Select2 JS -->
	<script src="../assets/plugins/select2/js/select2.min.js"></script>

	<!-- Bootstrap Tagsinput JS -->
	<script src="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

	<!-- Summernote JS -->
	<script src="../assets/plugins/summernote/summernote-lite.min.js"></script>

	<!-- Custom JS -->
	<script src="../assets/js/script.js"></script>

	<!-- <script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="75e411c1426dae3e3f14d912-|49" defer></script> -->


</body> 


</html>