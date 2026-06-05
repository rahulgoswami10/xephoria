<?php

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

<!DOCTYPE html>
<html lang="en">


	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<?php @include('../includes/header.php'); ?>

	<body>
		
		<a href="../../cdn-cgi/content7648.html?id=MTQY4wYL3A3cHhALPtxgq_2L3TjNfO6eRKG_7KqyaY8-1780432674.7247143-1.0.1.1-EcurErUKZx5JDfeZpyPeEPYZr3qXz_T84CIGJM1JfMY" aria-hidden="true" rel="nofollow noopener" style="display: none !important; visibility: hidden !important"></a>


		<!--============================================ Main Wrapper ============================================-->
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
							<h2 class="breadcrumb-title mb-2">Dashboard</h2>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb justify-content-center mb-0">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- Breadcrumb -->

			<div class="content">
				<div class="container">
					<div class="instructor-profile">
						<div class="instructor-profile-bg">
							<img src="assets/img/bg/card-bg-01.png" class="instructor-profile-bg-1" alt="">
						</div>
						<div class="row align-items-center row-gap-3">
							<div class="col-md-6">
								<div class="d-flex align-items-center">
									<span
										class="avatar flex-shrink-0 avatar-xxl avatar-rounded me-3 border border-white border-3 position-relative">
										<img src="../assets/img/user/user-01.jpg" alt="img">
										<span class="verify-tick"><i class="isax isax-verify5"></i></span>
									</span>
									<div>
										<h5 class="mb-1 text-white d-inline-flex align-items-center">Eugene Andre<a
												href="instructor-profile.html" class="link-light fs-16 ms-2"><i
													class="isax isax-edit-2"></i></a></h5>
										<p class="text-light">Instructor</p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="d-flex align-items-center flex-wrap gap-3 justify-content-md-end">
									<a href="../courses/add_course.php" class="btn btn-white rounded-pill">Add New Course</a>
									<a href="student-dashboard.html" class="btn btn-secondary rounded-pill">Student
										Dashboard</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row">

						<?php @include('sidebar.php'); ?>

						<div class="col-lg-9">
							<div class="row">
								<div class="col-md-6 col-xl-4">
									<div class="card">
										<div class="card-body">
											<div class="d-flex align-items-center">
												<span class="icon-box bg-primary-transparent me-2 me-xxl-3 flex-shrink-0">
													<!-- <img src="assets/img/icon/graduation.svg" alt=""> -->
													<img src="../assets/img/icon/graduation.svg" alt="">
												</span>
												<div>
													<span class="d-block">Enrolled Courses</span>
													<h4 class="fs-24 mt-1">12</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-xl-4">
									<div class="card">
										<div class="card-body">
											<div class="d-flex align-items-center">
												<span class="icon-box bg-secondary-transparent me-2 me-xxl-3 flex-shrink-0">
													<img src="../assets/img/icon/book.svg" alt="">
												</span>
												<div>
													<span class="d-block">Active Courses</span>
													<h4 class="fs-24 mt-1">08</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-xl-4">
									<div class="card">
										<div class="card-body">
											<div class="d-flex align-items-center">
												<span class="icon-box bg-success-transparent me-2 me-xxl-3 flex-shrink-0">
													<img src="../assets/img/icon/bookmark.svg" alt="">
												</span>
												<div>
													<span class="d-block">Completed Courses</span>
													<h4 class="fs-24 mt-1">06</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-xl-4">
									<div class="card">
										<div class="card-body">
											<div class="d-flex align-items-center">
												<span class="icon-box bg-info-transparent me-2 me-xxl-3 flex-shrink-0">
													<img src="../assets/img/icon/user-octagon.svg" alt="">
												</span>
												<div>
													<span class="d-block">Total Students</span>
													<h4 class="fs-24 mt-1">17</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-xl-4">
									<div class="card">
										<div class="card-body">
											<div class="d-flex align-items-center">
												<span class="icon-box bg-blue-transparent me-2 me-xxl-3 flex-shrink-0">
													<img src="../assets/img/icon/book-2.svg" alt="">
												</span>
												<div>
													<span class="d-block">Total Courses</span>
													<h4 class="fs-24 mt-1">11</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-xl-4">
									<div class="card">
										<div class="card-body">
											<div class="d-flex align-items-center">
												<span class="icon-box bg-purple-transparent me-2 me-xxl-3 flex-shrink-0">
													<img src="../assets/img/icon/money-add.svg" alt="">
												</span>
												<div>
													<span class="d-block">Total Earnings</span>
													<h4 class="fs-24 mt-1">$486</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<div
										class="d-flex align-items-center flex-wrap gap-3 justify-content-between border-bottom mb-2 pb-3">
										<h5 class="fw-bold">Earnings by Year</h5>
										<div class="input-icon position-relative input-range-picker">
											<span class="input-icon-addon">
												<i class="isax isax-calendar"></i>
											</span>
											<input type="text" class="form-control date-range bookingrange"
												placeholder="dd/mm/yyyy - dd/mm/yyyy">
										</div>
									</div>
									<div id="earnnings_chart"></div>
								</div>
							</div>
							<h5 class="mb-3 fw-bold">Recently Created Courses</h5>
							<div class="table-responsive custom-table">
								<table class="table">
									<thead class="thead-light">
										<tr>
											<th>Courses</th>
											<th>Enrolled</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<div class="course-title d-flex align-items-center">
													<a href="course-details.html"
														class="avatar avatar-xl flex-shrink-0 me-2"><img
															src="../assets/img/instructor/instructor-table-01.jpg"
															alt="Img"></a>
													<div>
														<p class="fw-medium"><a href="course-details.html">Complete HTML,
																CSS and Javascript<br> Course</a></p>
													</div>
												</div>
											</td>
											<td>0</td>
											<td>Published</td>
										</tr>
										<tr>
											<td>
												<div class="course-title d-flex align-items-center">
													<a href="course-details.html"
														class="avatar avatar-xl flex-shrink-0 me-2"><img
															src="../assets/img/instructor/instructor-table-02.jpg"
															alt="Img"></a>
													<div>
														<p class="fw-medium"><a href="course-details.html">Complete Course
																on Fullstack Web<br> Developer</a></p>
													</div>
												</div>
											</td>
											<td>2</td>
											<td>Published</td>
										</tr>
										<tr>
											<td>
												<div class="course-title d-flex align-items-center">
													<a href="course-details.html"
														class="avatar avatar-xl flex-shrink-0 me-2"><img
															src="../assets/img/instructor/instructor-table-03.jpg"
															alt="Img"></a>
													<div>
														<p class="fw-medium"><a href="course-details.html">Data Science
																Fundamentals and<br> Advanced Bootcampr</a></p>
													</div>
												</div>
											</td>
											<td>2</td>
											<td>Published</td>
										</tr>
										<tr>
											<td>
												<div class="course-title d-flex align-items-center">
													<a href="course-details.html"
														class="avatar avatar-xl flex-shrink-0 me-2"><img
															src="../assets/img/instructor/instructor-table-04.jpg"
															alt="Img"></a>
													<div>
														<p class="fw-medium"><a href="course-details.html">Master
																Microservices with Spring Boot<br> and Spring Cloud</a></p>
													</div>
												</div>
											</td>
											<td>1</td>
											<td>Published</td>
										</tr>
										<tr>
											<td>
												<div class="course-title d-flex align-items-center">
													<a href="course-details.html"
														class="avatar avatar-xl flex-shrink-0 me-2"><img
															src="../assets/img/instructor/instructor-table-05.jpg"
															alt="Img"></a>
													<div>
														<p class="fw-medium"><a href="course-details.html">Information About
																UI/UX Design<br> Degree</a></p>
													</div>
												</div>
											</td>
											<td>0</td>
											<td>Published</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--======================= footer =======================-->
			<?php @include('../includes/footer.php') ?>

		</div>
		<!--============================================ Main Wrapper ============================================-->

	</body>


</html>