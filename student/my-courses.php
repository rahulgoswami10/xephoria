<?php

require_once("../db/connection.php");

session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 3) {

	header("Location: ../auth/login.php");
	exit();
}

$student_id = (int) $_SESSION['user_id'];


$user_query = mysqli_query(
	$conn, 
	"
		SELECT * FROM users WHERE id = $student_id 
		LIMIT 1
	"
);

$user = mysqli_fetch_assoc($user_query);


$course_query = mysqli_query(
    $conn,
    "
    SELECT
        enrollments.enrolled_at,
        courses.*,
        users.name AS instructor_name,
        users.profile_pic
    FROM enrollments
    INNER JOIN courses
        ON courses.id = enrollments.course_id
    LEFT JOIN users
        ON users.id = courses.instructor_id
    WHERE enrollments.student_id = $student_id
    ORDER BY enrollments.enrolled_at DESC
    "
);


$total_courses = mysqli_num_rows($course_query);

?>

<!DOCTYPE html>
<html lang="en">

<!--======================= head =======================-->
<?php @include('includes/header.php'); ?>


<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">


		<!--======================= topbar =======================-->
		<?php @include('includes/topbar.php'); ?>

		<!--======================= navbar =======================-->
		<?php @include('includes/navbar.php'); ?>

		<!-- Breadcrumb -->
		<div class="breadcrumb-bar text-center">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-12">
						<h2 class="breadcrumb-title mb-2">Enrolled Courses</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb justify-content-center mb-0">
								<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Enrolled Courses</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- Breadcrumb -->

		<div class="content">
			<div class="container">
				<!-- profile box -->
				<div class="profile-card overflow-hidden bg-blue-gradient2 mb-5 p-5">
					<div class="profile-card-bg">
						<img src="assets/img/bg/card-bg-01.png" class="profile-card-bg-1" alt="">
					</div>
					<div class="row align-items-center row-gap-3">
						<div class="col-lg-6">
							<div class="d-flex align-items-center flex-wrap gap-3">
								<span
									class="avatar avatar-xxl avatar-rounded border border-white border-2 position-relative">
									<img src="../uploads/<?= !empty($user['profile_pic']) ? $user['profile_pic'] : 'default.png' ?>" alt="">
									<span class="verify-tick"><i class="isax isax-verify5"></i></span>
								</span>
								<div>
									<h5 class="mb-1 text-white d-inline-flex align-items-center">
										<?= htmlspecialchars($user['name']) ?><a
											href="instructor-profile.html" class="link-light fs-16 ms-2"><i
												class="isax isax-edit-2"></i></a>
									</h5>
									<p class="text-light">Student</p>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="d-flex align-items-center justify-content-lg-end flex-wrap gap-2">
								<a href="instructor-dashboard.html" class="btn btn-secondary rounded-pill">
									Student Dashboard
								</a>
							</div>
						</div>

					</div>
				</div>
				<!-- profile box -->
				<div class="row">
					<!-- sidebar -->
					<div class="col-lg-3 theiaStickySidebar">
						<div class="settings-sidebar">
							<div>
								<!-- Main -->
								<h6 class="mb-3">Main</h6>
								<ul class="mb-3 pb-1">
									<li>
										<a href="student-dashboard.html" class="d-inline-flex align-items-center">
											<i class="isax isax-grid-35 me-2"></i>Dashboard
										</a>
									</li>
									<li>
										<a href="student-ai-learning.html" class="d-inline-flex align-items-center">
											<i class="isax isax-magicpen5 me-2"></i>AI Learning Path
										</a>
									</li>
								</ul>
								<hr>

								<!-- Learning -->
								<h6 class="mb-3">Learning</h6>
								<ul class="mb-3 pb-1">
									<li>
										<a href="student-courses.html" class="d-inline-flex align-items-center active">
											<i class="isax isax-teacher5 me-2"></i>My Courses
										</a>
									</li>
									<li>
										<a href="student-assignments.html" class="d-inline-flex align-items-center">
											<i class="isax isax-document5 me-2"></i>Assignments
										</a>
									</li>
									<li>
										<a href="student-certificates.html" class="d-inline-flex align-items-center">
											<i class="isax isax-note-215 me-2"></i>Certificates
										</a>
									</li>
									<li>
										<a href="student-quiz.html" class="d-inline-flex align-items-center">
											<i class="isax isax-award5 me-2"></i>Quizzes
										</a>
									</li>
									<li>
										<a href="student-progress.html" class="d-inline-flex align-items-center">
											<i class="isax isax-book-saved5 me-2"></i>Course Progress
										</a>
									</li>
									<li>
										<a href="student-order-history.html" class="d-inline-flex align-items-center">
											<i class="isax isax-shopping-cart5 me-2"></i>Order History
										</a>
									</li>
								</ul>
								<hr>

								<!-- Community -->
								<h6 class="mb-3">Community</h6>
								<ul class="mb-3 pb-1">
									<li>
										<a href="student-wishlist.html" class="d-inline-flex align-items-center">
											<i class="isax isax-heart5 me-2"></i>Wishlist
										</a>
									</li>
									<li>
										<a href="student-reviews.html" class="d-inline-flex align-items-center">
											<i class="isax isax-star5 me-2"></i>Reviews
										</a>
									</li>
									<li>
										<a href="student-referral.html" class="d-inline-flex align-items-center">
											<i class="isax isax-tag-user5 me-2"></i>Referrals
										</a>
									</li>
									<li>
										<a href="student-messages.html" class="d-inline-flex align-items-center">
											<i class="isax isax-messages-35 me-2"></i>Messages
										</a>
									</li>
								</ul>
								<hr>

								<!-- Support -->
								<h6 class="mb-3">Support</h6>
								<ul class="mb-3 pb-1">
									<li>
										<a href="student-tickets.html" class="d-inline-flex align-items-center">
											<i class="isax isax-ticket5 me-2"></i>Support Tickets
										</a>
									</li>
								</ul>
								<hr>

								<!-- Account -->
								<h6 class="mb-3">Account</h6>
								<ul>
									<li>
										<a href="student-settings.html" class="d-inline-flex align-items-center">
											<i class="isax isax-setting-25 me-2"></i>Settings
										</a>
									</li>
									<li>
										<a href="student-profile.html" class="d-inline-flex align-items-center">
											<i class="fa-solid fa-user me-2"></i>My Profile
										</a>
									</li>
									<li>
										<a href="login.html" class="d-inline-flex align-items-center">
											<i class="isax isax-logout5 me-2"></i>Logout
										</a>
									</li>
								</ul>

							</div>
						</div>
					</div>
					<!-- sidebar -->
					<div class="col-lg-9">
						<div class="d-flex flex-wrap gap-3 align-items-center justify-content-between mb-4">
							<h4>Enrolled Courses</h4>
							<div class="d-flex align-items-center gap-2 flex-wrap">
								<a href="student-courses.html" class="badge-item bg-secondary">
									All Courses
									(<?= $total_courses ?>)
								</a>


								<a href="student-course-not-started.html"
									class="badge-item bg-light border border-1">Not Started (8)</a>


								<a href="student-course-inprocess.html"
									class="badge-item bg-light border border-1">Inprogress (4)</a>

								<a href="student-course-completed.html"
									class="badge-item bg-light border border-1">Completed (4)</a>

							</div>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active show" id="enroll-courses" role="tabpanel">
								<div class="row">

									<?php if ($total_courses > 0) { ?>
								

										<?php while($course = mysqli_fetch_assoc($course_query)) { ?>
											<div class="col-xxl-4 col-md-6">
												<div class="course-item-two course-item">
													<div class="course-img">
														<a href="course-details.html">
															<img src="../uploads/course_thumbnails/<?= htmlspecialchars($course['thumbnail']) ?>" alt="img"
																class="img-fluid">
														</a>
														<div
															class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-3">
															<span class="badge badge-sm bg-success-transparent text-success ">
																Completed
															</span>
														</div>
													</div>
													<div class="course-content">
														<div class="d-flex justify-content-between mb-2">
															<div class="d-flex align-items-center">
																<a href="instructor-details.html" class="avatar avatar-sm">
																	<img src="assets/img/user/user-64.jpg" alt="img"
																		class="img-fluid avatar avatar-sm rounded-circle">
																</a>
																<div class="ms-2">
																	<a href="instructor-details.html"
																		class="link-default fs-14"><?= htmlspecialchars($course['instructor_name']); ?></a>
																</div>
															</div>
															<span
																class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium mb-0">
																<?= htmlspecialchars($course['level']); ?>
															</span>
														</div>
														<h6 class="title mb-4 text-truncate">
															<a href="watch-course.php?course_id=<?= $course['id']; ?>">
																<?= htmlspecialchars($course['title']); ?>
															</a>
														</h6>
														<div class="d-flex align-items-center mb-4">
															<p
																class="d-inline-flex fs-14 align-items-center me-2 pe-2 border-end mb-0">
																<i class="isax isax-book-1 me-2 text-gray fs-18 fw-bold"></i>6/7
																Lesson
															</p>
															<p class="d-inline-flex fs-14 align-items-center mb-0"><i
																	class="isax isax-clock me-2 text-gray fw-bold fs-18"></i>26h
															</p>
														</div>
														<div class="d-flex align-items-center gap-2 mb-3">
															<p class="mb-0 text-dark fs-14 flex-shrink-0">Progress</p>
															<div class="progress progress-xs flex-grow-1">
																<div class="progress-bar bg-success rounded"
																	style="width: 100%;"></div>
															</div>
															<p class="mb-0 text-dark fs-14 flex-shrink-0">100%</p>
														</div>
														<div class="d-flex align-items-center justify-content-center">
															<a href="watch-course.php?course_id=<?= $course['id']; ?>"
																class="btn btn-gray btn-lg d-inline-flex align-items-center 
																justify-content-center w-100">
																<i class="isax isax-play-circle me-2"></i>
																Continue Learning
															</a>
														</div>
													</div>
												</div>


											</div>
										<?php } ?>
									<?php } else { ?> 

										<div class="col-12">
											<div class="alert alert-info">
												You have not enrolled in any courses yet.
											</div>
										</div>

									<?php } ?>	
							
								</div>
							</div>


							<div class="row align-items-center">
								<div class="col-md-2">
									<p class="pagination-text">Page 1 of 2</p>
								</div>
								<div class="col-md-10">
									<ul
										class="pagination lms-page justify-content-center justify-content-md-end mt-2 mt-md-0">
										<li class="page-item prev">
											<a class="page-link" href="javascript:void(0)" tabindex="-1"><i
													class="fas fa-angle-left"></i></a>
										</li>
										<li class="page-item first-page active">
											<a class="page-link" href="javascript:void(0)">1</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="javascript:void(0)">2</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="javascript:void(0)">3</a>
										</li>
										<li class="page-item next">
											<a class="page-link" href="javascript:void(0)"><i
													class="fas fa-angle-right"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!--======================= footer =======================-->
		<?php @include('includes/footer.php') ?>


	</div>
	<!-- Main Wrapper -->

</body>

</html>