<?php
require_once("../db/connection.php");

session_start();

if (!isset($_SESSION['user_id'])) {

	header("Location: ../auth/login.php");
	exit();
}

if ($_SESSION['user_type'] != 3) {
	
	header("Location: ../auth/login.php");
	// header("Location: ../errors/403.php");

	exit();
}

$query = "

SELECT
    courses.*,
    categories.category_name,
    users.name AS instructor_name,
    users.profile_pic

FROM courses

LEFT JOIN categories
ON courses.category_id = categories.id

LEFT JOIN users
ON courses.instructor_id = users.id



ORDER BY courses.id DESC

";

$result = mysqli_query($conn, $query);





?>

<!-- TODO:  WHERE courses.status = 'published' will have to be placed inside the query -->


<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<!-- head -->
<?php @include('includes/header.php'); ?>

<body>
	

	<!--================================================ Main Wrapper ================================================-->
	<div class="main-wrapper">

		<!-- topbar -->
		<?php @include('includes/topbar.php'); ?>

		<!-- navbar -->
		<?php @include('includes/navbar.php'); ?>


		<!-- Breadcrumb -->
		<div class="breadcrumb-bar text-center">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-12">
						<h2 class="breadcrumb-title mb-2">Course Grid</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb justify-content-center mb-0">
								<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Course Grid</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- Breadcrumb -->

		<!-- Course -->
		<section class="course-content">
			<div class="container">
				<div class="row align-items-baseline">

					<div class="col-lg-3 theiaStickySidebar">
						<div class="filter-clear">
							<div class="clear-filter mb-4 pb-lg-2 d-flex align-items-center justify-content-between">
								<h5><i class="feather-filter me-2"></i>Filters</h5>
								<a href="javascript:void(0);" class="clear-text">
									Clear
								</a>
							</div>

							<div class="accordion accordion-customicon1 accordions-items-seperate">
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingcustomicon1One">
										<a href="#" class="accordion-button" data-bs-toggle="collapse"
											data-bs-target="#collapsecustomicon1One" aria-expanded="false"
											aria-controls="collapsecustomicon1One">
											Categories <i class="fa-solid fa-chevron-down"></i>
										</a>
									</h2>
									<div id="collapsecustomicon1One" class="accordion-collapse collapse show"
										aria-labelledby="headingcustomicon1One"
										data-bs-parent="#accordioncustomicon1Example" style="">
										<div class="accordion-body">
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span> Backend (3)
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span> CSS (2)
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span> Frontend (2)
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span> General (2)
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_specialist" checked>
													<span class="checkmark"></span> IT & Software (2)
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span> Photography (2)
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span> Programming Language (3)
												</label>
											</div>
											<div>
												<label class="custom_check mb-0">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span> Technology (2)
												</label>
											</div>
											<a href="javascript:void(0);" class="see-more-btn">See More</a>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingcustomicon1Two">
										<a href="#" class="accordion-button" data-bs-toggle="collapse"
											data-bs-target="#collapsecustomicon1Two" aria-expanded="false"
											aria-controls="collapsecustomicon1Two">
											Instructors<i class="fa-solid fa-chevron-down"></i>
										</a>
									</h2>
									<div id="collapsecustomicon1Two" class="accordion-collapse collapse show"
										aria-labelledby="headingcustomicon1Two"
										data-bs-parent="#accordioncustomicon1Example">
										<div class="accordion-body">
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span> Keny White (10)

												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span> Hinata Hyuga (5)
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span> John Doe (3)
												</label>
											</div>
											<div>
												<label class="custom_check mb-0">
													<input type="checkbox" name="select_specialist" checked>
													<span class="checkmark"></span> Nicole Brown
												</label>
											</div>
											<a href="javascript:void(0);" class="see-more-btn">See More</a>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingcustomicon1Three">
										<a href="#" class="accordion-button" data-bs-toggle="collapse"
											data-bs-target="#collapsecustomicon1Three" aria-expanded="false"
											aria-controls="collapsecustomicon1Three">
											Price<i class="fa-solid fa-chevron-down"></i>
										</a>
									</h2>
									<div id="collapsecustomicon1Three" class="accordion-collapse collapse show"
										aria-labelledby="headingcustomicon1Three"
										data-bs-parent="#accordioncustomicon1Example">
										<div class="accordion-body">
											<div>
												<label class="custom_check custom_one">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span> All (10)

												</label>
											</div>
											<div>
												<label class="custom_check custom_one">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span> Free (5)

												</label>
											</div>
											<div>
												<label class="custom_check custom_one mb-0">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span> Paid (3)
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingcustomicon1Four">
										<a href="#" class="accordion-button" data-bs-toggle="collapse"
											data-bs-target="#collapsecustomicon1Four" aria-expanded="false"
											aria-controls="collapsecustomicon1Four">
											Range<i class="fa-solid fa-chevron-down"></i>
										</a>
									</h2>
									<div id="collapsecustomicon1Four" class="accordion-collapse collapse show"
										aria-labelledby="headingcustomicon1Four"
										data-bs-parent="#accordioncustomicon1Example">
										<div class="accordion-body">
											<div class="filter-range">
												<input type="text" class="input-range">
											</div>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingcustomicon1Five">
										<a href="#" class="accordion-button" data-bs-toggle="collapse"
											data-bs-target="#collapsecustomicon1Five" aria-expanded="false"
											aria-controls="collapsecustomicon1Five">
											Level<i class="fa-solid fa-chevron-down"></i>
										</a>
									</h2>
									<div id="collapsecustomicon1Five" class="accordion-collapse collapse show"
										aria-labelledby="headingcustomicon1Five"
										data-bs-parent="#accordioncustomicon1Example">
										<div class="accordion-body">
											<div>
												<label class="custom_check custom_one">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span>Beginner (10)

												</label>
											</div>
											<div>
												<label class="custom_check custom_one">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span> Intermediate (5)

												</label>
											</div>
											<div>
												<label class="custom_check custom_one">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span>Advanced (21)
												</label>
											</div>
											<div>
												<label class="custom_check custom_one mb-0">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span>Expert (3)
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingcustomicon1Six">
										<a href="#" class="accordion-button" data-bs-toggle="collapse"
											data-bs-target="#collapsecustomicon1Six" aria-expanded="false"
											aria-controls="collapsecustomicon1Six">
											Reviews <i class="fa-solid fa-chevron-down"></i>
										</a>
									</h2>
									<div id="collapsecustomicon1Six" class="accordion-collapse collapse show"
										aria-labelledby="headingcustomicon1Six"
										data-bs-parent="#accordioncustomicon1Example">
										<div class="accordion-body">
											<div>
												<label class="custom_check custom_one">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span>
													<i class="fa-solid fa-star text-warning me-1"></i>
													<i class="fa-solid fa-star text-warning me-1"></i>
													<i class="fa-solid fa-star text-warning me-1"></i>
													<i class="fa-solid fa-star text-warning me-1"></i>
													<i class="fa-solid fa-star text-warning"></i>
												</label>
											</div>
											<div>
												<label class="custom_check custom_one">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span>
													<i class="fa-solid fa-star text-warning me-1"></i>
													<i class="fa-solid fa-star text-warning me-1"></i>
													<i class="fa-solid fa-star text-warning me-1"></i>
													<i class="fa-solid fa-star text-warning me-1"></i>
													<i class="fa-solid fa-star text-light"></i>

												</label>
											</div>
											<div>
												<label class="custom_check custom_one">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span>
													<i class="fa-solid fa-star text-warning me-1"></i>
													<i class="fa-solid fa-star text-warning me-1"></i>
													<i class="fa-solid fa-star text-warning me-1"></i>
													<i class="fa-solid fa-star text-light me-1"></i>
													<i class="fa-solid fa-star text-light"></i>
												</label>
											</div>
											<div>
												<label class="custom_check custom_one">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span>
													<i class="fa-solid fa-star text-warning me-1"></i>
													<i class="fa-solid fa-star text-warning me-1"></i>
													<i class="fa-solid fa-star text-light me-1"></i>
													<i class="fa-solid fa-star text-light me-1"></i>
													<i class="fa-solid fa-star text-light"></i>
												</label>
											</div>
											<div>
												<label class="custom_check custom_one mb-0">
													<input type="checkbox" name="select_specialist">
													<span class="checkmark"></span>
													<i class="fa-solid fa-star text-warning me-1"></i>
													<i class="fa-solid fa-star text-light me-1"></i>
													<i class="fa-solid fa-star text-light me-1"></i>
													<i class="fa-solid fa-star text-light me-1"></i>
													<i class="fa-solid fa-star text-light"></i>
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>


					<div class="col-lg-9">

						<!-- Filter -->
						<div class="showing-list mb-4">
							<div class="row align-items-center">
								<div class="col-lg-4">
									<div class="show-result text-center text-lg-start">
										<h6 class="fw-medium">Showing 1-9 of 50 results</h6>
									</div>
								</div>
								<div class="col-lg-8">
									<div class="show-filter add-course-info">
										<form action="#">
											<div
												class="d-sm-flex justify-content-center justify-content-lg-end mb-1 mb-lg-0">
												<div class="view-icons mb-2 mb-sm-0">
													<a href="course-grid.html" class="grid-view active"><i
															class="feather-grid"></i></a>
													<a href="course-list.html" class="list-view"><i
															class="isax isax-task"></i></a>
												</div>
												<select class="form-select">
													<option>Newly Published </option>
													<option>Trending Courses</option>
													<option>Top Rated</option>
													<option>Free Courses</option>
												</select>
												<div class=" search-group">
													<i class="isax isax-search-normal-1"></i>
													<input type="text" class="form-control" placeholder="Search">
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- Filter -->


						<!--============================== crads row ==============================-->
						<div class="row">

							<?php while($course = mysqli_fetch_assoc($result)) { ?>

							<div class="col-xl-4 col-md-6">

								<div class="course-item-two course-item mx-0">

									<div class="course-img">

										<a href="course-details.php?slug=<?php echo $course['slug']; ?>">

											<img
												src="../uploads/course_thumbnails/<?php echo $course['thumbnail']; ?>"
												alt="<?php echo $course['title']; ?>"
												class="img-fluid">

										</a>

										<div class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-3">

											<a href="javascript:void(0);" class="fav-icon ms-auto">
												<i class="isax isax-heart"></i>
											</a>

										</div>

									</div>

									<div class="course-content">

										<div class="d-flex justify-content-between mb-2">

											<div class="d-flex align-items-center">

												<div class="ms-2">

													<span class="link-default fs-14">
														<?php echo $course['instructor_name']; ?>
													</span>

												</div>

											</div>

											<span class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium mb-0">

												<?php echo $course['category_name']; ?>

											</span>

										</div>

										<h6 class="title mb-2">

											<a href="course-details.php?slug=<?php echo $course['slug']; ?>">

												<?php echo $course['title']; ?>

											</a>

										</h6>

										<p class="mb-3">

											Level :
											<?php echo $course['level']; ?>

											<br>

											Duration :
											<?php echo $course['course_duration']; ?>

										</p>

										<div class="d-flex align-items-center justify-content-between">

											<?php if($course['is_free'] == 1) { ?>

												<h5 class="text-success mb-0">FREE</h5>

											<?php } else { ?>

												<h5 class="text-secondary mb-0">
													₹<?php echo $course['price']; ?>
												</h5>

											<?php } ?>

											<a
												href="course-details.php?slug=<?php echo $course['slug']; ?>"
												class="btn btn-dark btn-sm d-inline-flex align-items-center">

												View Course

												<i class="isax isax-arrow-right-3 ms-1"></i>

											</a>

										</div>

									</div>

								</div>

							</div>

							<?php } ?>

						</div>
						<!--============================== cards row end ==============================-->






						<!--============================== pagination ==============================-->
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
						<!-- /pagination -->

					</div>
				</div>
			</div>
		</section>
		<!-- Course -->

		<!--======================= footer =======================-->
		<?php @include('includes/footer.php') ?>

	</div>
	<!--================================================ Main Wrapper ================================================-->

</body>

</html>