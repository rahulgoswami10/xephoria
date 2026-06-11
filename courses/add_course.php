
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
						<h2 class="breadcrumb-title mb-2">Add New Course</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb justify-content-center mb-0">
								<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add New Course</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->

		<!-- Course add -->
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 mx-auto">
						<div class="add-course-item">
							<div class="wizard">
								<ul class="form-wizard-steps" id="progressbar2">

									<!-- step 1 -->
									<li class="progress-active">
										<div class="profile-step">
											<span class="dot-active mb-2">
												<span class="number">01</span>
												<span class="tickmark"><i class="fa-solid fa-check"></i></span>
											</span>
											<div class="step-section">
												<p>Course Information</p>
											</div>
										</div>
									</li>

									<!-- step 2 -->
									<li>
										<div class="profile-step">
											<span class="dot-active mb-2">
												<span class="number">02</span>
												<span class="tickmark"><i class="fa-solid fa-check"></i></span>
											</span>
											<div class="step-section">
												<p>Course Media</p>
											</div>
										</div>
									</li>

									<!-- step 3 -->
									<li>
										<div class="profile-step">
											<span class="dot-active mb-2">
												<span class="number">03</span>
												<span class="tickmark"><i class="fa-solid fa-check"></i></span>
											</span>
											<div class="step-section">
												<p>Curriculam</p>
											</div>
										</div>
									</li>

									<!-- step 4 -->
									<!-- <li>
										<div class="profile-step">
											<span class="dot-active mb-2">
												<span class="number">04</span>
												<span class="tickmark"><i class="fa-solid fa-check"></i></span>
											</span>
											<div class="step-section">
												<p>Additional information</p>
											</div>
										</div>
									</li> -->

									<!-- step 5 -->
									<li>
										<div class="profile-step">
											<span class="dot-active mb-2">
												<span class="number">05</span>
												<span class="tickmark"><i class="fa-solid fa-check"></i></span>
											</span>
											<div class="step-section">
												<p>Pricing</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<form action="course_action.php" method="POST" class="initialization-form-set" enctype="multipart/form-data">

								<fieldset class="form-inner wizard-form-card" id="first">
									<div class="title">
										<h5>Basic Information</h5>
									</div>
									<div class="row">
										<!-- title -->
										<div class="col-md-12">
											<div class="input-block">
												<label class="form-label">Course Title<span
														class="text-danger ms-1">*</span></label>
												<input type="text" class="form-control" name="title">
											</div>
										</div>

										<!-- category -->
										<div class="col-md-4">
											<div class="input-block">
												<label class="form-label">Course Category<span
														class="text-danger ms-1">*</span></label>
												<select class="select form-control" name="category_id">
													<option value="">Select</option>
													<option value="1">Management</option>
													<option value="2">IT & Softwares</option>
													<option value="3">Marketing</option>
													<!-- <option value="Finance">Finance</option>
													<option value="Productivity">Productivity</option> -->
												</select>
											</div>
										</div>

										<!-- course level -->
										<div class="col-md-4">
											<div class="input-block">
												<label class="form-label">Course Level<span
														class="text-danger ms-1">*</span></label>
												<select class="select form-control" name="level">
													<option value="">Select</option>
													<option value="Beginner">Beginner </option>
													<option value="Intermediate">Intermediate</option>
													<option value="Advanced">Advanced</option>
													<!-- <option value="Expert">Expert</option> -->
												</select>
											</div>
										</div>

										<!-- language -->
										<div class="col-md-4">
											<div class="input-block">
												<label class="form-label">Language<span
														class="text-danger ms-1">*</span></label>
												<select class="select form-control" name="language">
													<option value="">Select</option>
													<option value="English">English</option>
													<option value="Hindi">Hindi</option>
													<option value="Bengali">Bengali</option>
													<option value="French">French </option>
													<option value="German">German</option>
													<option value="Arabic">Arabic</option>
												</select>
											</div>
										</div>

										<!-- <div class="col-md-6">
											<div class="input-block">
												<label class="form-label">Max Number of Students<span
														class="text-danger ms-1">*</span></label>
												<input type="text" class="form-control student-count">
											</div>
										</div> -->

										<!-- <div class="col-md-6">
											<div class="input-block">
												<label class="form-label">Public / Private Course<span
														class="text-danger ms-1">*</span></label>
												<select class="select form-control">
													<option>Select</option>
													<option>Private </option>
													<option>Public</option>
												</select>
											</div>
										</div> -->

										<!-- short description -->
										<div class="col-md-12">
											<div class="input-block">
												<label class="form-label">Short Description<span
														class="text-danger ms-1">*</span></label>
												<input type="text" class="form-control" name="short_description">
											</div>
										</div>

										<!-- course description -->
										<div class="col-md-12">
											<div class="input-block">
												<label class="form-label">Course Description<span
														class="text-danger ms-1">*</span></label>
												<textarea class="summernote" name="description"></textarea>
											</div>
										</div>

										<!-- learning -->
										<!-- <div class="col-md-6">
											<div class="bg-light border p-4 rounded-3">
												<h6 class="mb-2">What will students learn in your course?</h6>
												<div class="input-block" id="input-block">
													<div class="d-flex align-items-center add-new-input">
														<input type="text" class="form-control"
															value="Become a UX designer">
														<a href="javascript:void(0);" class="link-trash"><i
																class="isax isax-trash"></i></a>
													</div>
												</div>
												<div class="d-flex align-items-center justify-content-end">
													<a href="javascript:void(0);"
														class="d-flex align-items-center add-new-topic"
														id="add-new-topic-btn">
														<i class="isax isax-add me-1"></i> Add New Item
													</a>
												</div>
											</div>
										</div> -->

										<!-- requirements-->
										<!-- <div class="col-md-6">
											<div class="bg-light border	 p-4 rounded-3">
												<h6 class="mb-2">Requirements</h6>
												<div class="input-block">
													<div class="d-flex align-items-center add-new-input">
														<input type="text" class="form-control" name="">
														<a href="javascript:void(0);" class="link-trash"><i
																class="isax isax-trash"></i></a>
													</div>
												</div>
												<div class="d-flex align-items-center justify-content-end">
													<a href="javascript:void(0);"
														class="d-flex align-items-center add-new-topic">
														<i class="isax isax-add me-1"></i> Add New Item
													</a>
												</div>
											</div>
										</div> -->

										<!-- check toggle -->
										<!-- <div class="col-md-6">
											<div class="form-check form-switch form-check-md mb-0 mt-3">
												<input class="form-check-input form-checked-success" type="checkbox"
													id="checkFeature" checked="" name="">
												<label class="form-check-label" for="checkFeature">Check this for
													featured course</label>
											</div>
										</div> -->

									</div>
									<div
										class="add-form-btn widget-next-btn submit-btn d-flex justify-content-end mb-0">
										<div class="btn-left">
											<a href="javascript:void(0);" class="btn main-btn next_btns">Next <i
													class="isax isax-arrow-right-3 ms-1"></i></a>
										</div>
									</div>
								</fieldset>
								<fieldset class="form-inner wizard-form-card">
									<div class="title">
										<h5>Course Media</h5>
										<p>Intro Course overview provider type. (.mp4, YouTube, Vimeo etc.)</p>
									</div>
									<div class="row">

										<!-- course thumbnail -->
										<div class="col-md-12">
											<div class="input-block">
												<div class="row align-items-center">
													<div class="col-md-12">
														<label class="form-label">Course Thumbnail<span
																class="text-danger ms-1">*</span></label>
													</div>
													<div class="col-md-10">
														<input type="text" class="form-control"
															placeholder="No File Selected">
													</div>
													<div class="col-md-2 d-grid">
														<label for="file-upload"
															class="file-upload-btn text-center">Upload File</label>
														<input type="file" id="file-upload" name="thumbnail">
													</div>
												</div>
											</div>
										</div>

										<!--  -->
										<div class="col-md-12">
											<div class="upload-img-section d-flex align-items-center justify-content-center"
												id="upload-img-section">
												<input type="file" id="upload-img-input" style="display: none;"
													accept="image/jpeg, image/png, image/gif, image/webp" name="thumbnail">
												<div class="upload-content">
													<span class="d-flex align-items-center justify-content-center mb-1">
														<i
															class="isax isax-image5 text-secondary fs-24 text-center"></i>
													</span>
													<p class="text-center fw-medium mb-1">Upload Image</p>
													<span class="text-center">JPEG, PNG, GIF, and WebP formats, up to 2
														MB</span>
												</div>
											</div>
											<hr class="mt-4 mb-4">
										</div>

										<!-- course video -->
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-4">
													<div class="input-block-link">
														<label class="form-label">Course Video<span
																class="text-danger ms-1">*</span></label>
														<select class="select">
															<option>External URL</option>
															<option>Youtube</option>
															<option>External</option>
															<option>Vimeo</option>
														</select>
													</div>
												</div>
												<div class="col-md-8">
													<div class="input-block-link">
														<label class="form-label">&nbsp;</label>
														<input type="text" class="form-control"
															placeholder="External URL Link" name="intro_video">
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="position-relative">
												<a href="https://www.youtube.com/embed/1trvO6dqQUI" id="openVideoBtn"
													target="_blank">
													<img class="img-fluid rounded"
														src="../assets/img/course/add-course-1.jpg" alt="img">
													<div class="play-icon">
														<i class="fa-solid fa-play"></i>
													</div>
												</a>
											</div>
											<div id="videoModal">
												<div class="modal-content1">
													<span class="close-btn" id="closeModal">&times;</span>
													<iframe id="youtubeIframe" allowfullscreen></iframe>
												</div>
											</div>
										</div>
									</div>
									<div class="add-form-btn widget-next-btn submit-btn">
										<div class="btn-left">
											<a href="javascript:void(0);"
												class="btn btn-light main-btn prev_btns d-flex align-items-center"><i
													class="isax isax-arrow-left-2 me-1"></i>Prev</a>
										</div>
										<div class="btn-left">
											<a href="javascript:void(0);"
												class="btn btn-secondary main-btn next_btns d-flex align-items-center">Next
												<i class="isax isax-arrow-right-3 ms-1"></i></a>
										</div>
									</div>
								</fieldset>

								<!-- curriculum section -->
								<!-- <fieldset class="form-inner wizard-form-card">
									<div class="title">
										<div class="row align-items-center row-gap-2">
											<div class="col-md-6">
												<h5 class="mb-0">Curriculum</h5>
											</div>
											<div class="col-md-6 text-md-end">
												<a href="javascript:void(0);"
													class="btn add-edit-btn d-inline-flex align-items-center"
													data-bs-toggle="modal" data-bs-target="#add-topic"><i
														class="isax isax-add-circle5 me-1"></i> Add New Topic</a>
											</div>
										</div>
									</div>
									<div>
										<div class="accordions-items-seperate" id="accordionSpacingExample">
											<div class="accordion-item">
												<h2 class="accordion-header" id="headingSpacingOne">
													<a href="javascript:void(0);" class="accordion-button collapsed"
														data-bs-toggle="collapse" data-bs-target="#SpacingOne"
														aria-expanded="false" aria-controls="SpacingOne">
														<span class="d-flex align-items-center mb-0"><i
																class="isax isax-menu-15 me-2"></i>Introduction of
															Digital Marketing</span>
													</a>
												</h2>
												<div id="SpacingOne" class="accordion-collapse collapse show"
													aria-labelledby="headingSpacingOne"
													data-bs-parent="#accordionSpacingExample">
													<div class="accordion-body">
														<div
															class="d-flex align-items-center justify-content-between bg-white p-2 border rounded-3 mb-3">
															<div class="d-flex align-items-center">
																<span><i
																		class="isax isax-play-circle5 text-success fs-24 me-1"></i></span>
																<p class="fw-medium text-gray-5 mb-0">Describe SEO
																	Engine</p>
															</div>
															<div class="d-flex align-items-center">
																<a href="javascript:void(0);" class="edit-btn1"><i
																		class="isax isax-edit-25 fs-16"></i></a>
																<a href="javascript:void(0);" class="delete-btn1"><i
																		class="isax isax-trash fs-16"></i></a>
															</div>
														</div>
														<div
															class="d-flex align-items-center justify-content-between bg-white p-2 border rounded-3 mb-3">
															<div class="d-flex align-items-center">
																<span><i
																		class="isax isax-play-circle5 text-success fs-24 me-1"></i></span>
																<p class="fw-medium text-gray-5 mb-0">Know about all
																	marketing</p>
															</div>
															<div class="d-flex align-items-center">
																<a href="javascript:void(0);" class="edit-btn1"><i
																		class="isax isax-edit-25 fs-16"></i></a>
																<a href="javascript:void(0);" class="delete-btn1"><i
																		class="isax isax-trash fs-16"></i></a>
															</div>
														</div>
														<div class="d-flex align-items-center justify-content-between">
															<div class="d-flex align-items-center">
																<a href="javascript:void(0);"
																	class="btn add-edit-btn d-inline-flex align-items-center"
																	data-bs-toggle="modal"
																	data-bs-target="#add-lesson"><i
																		class="isax isax-add-circle5 me-2"></i>Add
																	Lesson</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="accordion-item">
												<h2 class="accordion-header" id="headingSpacingTwo">
													<a href="javascript:void(0);" class="accordion-button collapsed"
														data-bs-toggle="collapse" data-bs-target="#SpacingTwo"
														aria-expanded="false" aria-controls="SpacingTwo">
														<span class="d-flex align-items-center mb-0">
															<i class="isax isax-menu-15 me-2"></i>
															Installing Development Software
														</span>
													</a>
												</h2>
												<div id="SpacingTwo" class="accordion-collapse collapse"
													aria-labelledby="headingSpacingTwo"
													data-bs-parent="#accordionSpacingExample">
													<div class="accordion-body">
														<div
															class="d-flex align-items-center justify-content-between bg-white p-2 border rounded-3 mb-3">
															<div class="d-flex align-items-center">
																<span><i
																		class="isax isax-play-circle5 text-success fs-24 me-1"></i></span>
																<p class="fw-medium text-gray-5 mb-0">Describe SEO
																	Engine</p>
															</div>
															<div class="d-flex align-items-center">
																<a href="javascript:void(0);" class="edit-btn1"><i
																		class="isax isax-edit-25 fs-16"></i></a>
																<a href="javascript:void(0);" class="delete-btn1"><i
																		class="isax isax-trash fs-16"></i></a>
															</div>
														</div>
														<div
															class="d-flex align-items-center justify-content-between bg-white p-2 border rounded-3 mb-3">
															<div class="d-flex align-items-center">
																<span><i
																		class="isax isax-play-circle5 text-success fs-24 me-1"></i></span>
																<p class="fw-medium text-gray-5 mb-0">Know about all
																	marketing</p>
															</div>
															<div class="d-flex align-items-center">
																<a href="javascript:void(0);" class="edit-btn1"><i
																		class="isax isax-edit-25 fs-16"></i></a>
																<a href="javascript:void(0);" class="delete-btn1"><i
																		class="isax isax-trash fs-16"></i></a>
															</div>
														</div>
														<div class="d-flex align-items-center justify-content-between">
															<div class="d-flex align-items-center">
																<a href="javascript:void(0);"
																	class="btn btn-primary d-inline-flex align-items-center"
																	data-bs-toggle="modal"
																	data-bs-target="#add-lesson"><i
																		class="isax isax-add-circle5 me-2"></i>Add
																	Lesson</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="accordion-item">
												<h2 class="accordion-header" id="headingSpacingThree">
													<a href="javascript:void(0);" class="accordion-button collapsed"
														data-bs-toggle="collapse" data-bs-target="#SpacingThree"
														aria-expanded="false" aria-controls="SpacingThree">
														<span class="d-flex align-items-center mb-0">
															<i class="isax isax-menu-15 me-2"></i>
															Hello World Project from GitHub
														</span>
													</a>
												</h2>
												<div id="SpacingThree" class="accordion-collapse collapse"
													aria-labelledby="headingSpacingThree"
													data-bs-parent="#accordionSpacingExample">
													<div class="accordion-body">
														<div
															class="d-flex align-items-center justify-content-between bg-white p-2 border rounded-3 mb-3">
															<div class="d-flex align-items-center">
																<span><i
																		class="isax isax-play-circle5 text-success fs-24 me-1"></i></span>
																<p class="fw-medium text-gray-5 mb-0">Describe SEO
																	Engine</p>
															</div>
															<div class="d-flex align-items-center">
																<a href="javascript:void(0);" class="edit-btn1"><i
																		class="isax isax-edit-25 fs-16"></i></a>
																<a href="javascript:void(0);" class="delete-btn1"><i
																		class="isax isax-trash fs-16"></i></a>
															</div>
														</div>
														<div
															class="d-flex align-items-center justify-content-between bg-white p-2 border rounded-3 mb-3">
															<div class="d-flex align-items-center">
																<span><i
																		class="isax isax-play-circle5 text-success fs-24 me-1"></i></span>
																<p class="fw-medium text-gray-5 mb-0">Know about all
																	marketing</p>
															</div>
															<div class="d-flex align-items-center">
																<a href="javascript:void(0);" class="edit-btn1"><i
																		class="isax isax-edit-25 fs-16"></i></a>
																<a href="javascript:void(0);" class="delete-btn1"><i
																		class="isax isax-trash fs-16"></i></a>
															</div>
														</div>
														<div class="d-flex align-items-center justify-content-between">
															<div class="d-flex align-items-center">
																<a href="javascript:void(0);"
																	class="btn btn-primary d-inline-flex align-items-center"
																	data-bs-toggle="modal"
																	data-bs-target="#add-lesson"><i
																		class="isax isax-add-circle5 me-2"></i>Add
																	Lesson</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="add-form-btn widget-next-btn submit-btn">
										<div class="btn-left">
											<a href="javascript:void(0);" class="btn btn-light main-btn prev_btns"><i
													class="isax isax-arrow-left-2 me-1"></i>Prev</a>
										</div>
										<div class="btn-left">
											<a href="javascript:void(0);"
												class="btn btn-secondary main-btn next_btns">Next <i
													class="isax isax-arrow-right-3 ms-1"></i></a>
										</div>
									</div>
								</fieldset> -->


								<!-- Curriculum Section -->
								<fieldset class="form-inner wizard-form-card">

									<div class="title d-flex justify-content-between align-items-center">

										<h5 class="mb-0">Course Curriculum</h5>

										<button type="button"
												class="btn btn-primary"
												id="add-section-btn">

											<i class="fa-solid fa-plus"></i>
											Add Section

										</button>

									</div>


									<div id="curriculum-wrapper">


										<!-- First Section -->
										<div class="card border mb-4 section-item">

											<div class="card-body">


												<!-- section title -->
												<div class="mb-3">

													<label class="form-label">
														Section Title
													</label>

													<input type="text"
														class="form-control"
														name="section_title[]"
														placeholder="Enter section title">

												</div>



												<!-- lessons wrapper -->
												<div class="lessons-wrapper">


													<!-- lesson -->
													<div class="border rounded p-3 mb-3 lesson-item">

														<div class="row">


															<!-- lesson title -->
															<div class="col-md-6 mb-3">

																<label class="form-label">
																	Lesson Title
																</label>

																<input type="text"
																	class="form-control"
																	name="lesson_title[0][]"
																	placeholder="Lesson title">

															</div>



															<!-- video -->
															<div class="col-md-6 mb-3">

																<label class="form-label">
																	Video URL
																</label>

																<input type="text"
																	class="form-control"
																	name="video_url[0][]"
																	placeholder="Youtube/Vimeo URL">

															</div>



															<!-- duration -->
															<div class="col-md-4 mb-3">

																<label class="form-label">
																	Duration
																</label>

																<input type="text"
																	class="form-control"
																	name="lesson_duration[0][]"
																	placeholder="10 min">

															</div>



															<!-- preview -->
															<div class="col-md-4 mb-3">

																<label class="form-label">
																	Preview
																</label>

																<select class="form-control"
																		name="is_preview[0][]">

																	<option value="0">
																		No
																	</option>

																	<option value="1">
																		Yes
																	</option>

																</select>

															</div>



															<!-- remove lesson -->
															<div class="col-md-4 mb-3 d-flex align-items-end">

																<button type="button"
																		class="btn btn-danger remove-lesson-btn w-100">

																	Remove Lesson

																</button>

															</div>

														</div>

													</div>

												</div>



												<!-- add lesson -->
												<button type="button"
														class="btn btn-secondary add-lesson-btn">

													<i class="fa-solid fa-plus"></i>
													Add Lesson

												</button>



												<!-- remove section -->
												<button type="button"
														class="btn btn-danger float-end remove-section-btn">

													Remove Section

												</button>

											</div>

										</div>

									</div>



									<!-- buttons -->
									<div class="add-form-btn widget-next-btn submit-btn">

										<div class="btn-left">

											<a href="javascript:void(0);"
											class="btn btn-light main-btn prev_btns">

												<i class="isax isax-arrow-left-2 me-1"></i>
												Prev

											</a>

										</div>


										<div class="btn-left">

											<a href="javascript:void(0);"
											class="btn btn-secondary main-btn next_btns">

												Next
												<i class="isax isax-arrow-right-3 ms-1"></i>

											</a>

										</div>

									</div>

								</fieldset>


								<!-- course faq's section -->
								<!-- <fieldset class="form-inner wizard-form-card">
									<div class="title">
										<div class="row align-items-center row-gap-3">
											<div class="col-md-9">
												<h5 class="mb-0">FAQ’s</h5>
											</div>
											<div class="col-md-3 text-end">
												<a href="javascript:void(0);"
													class="btn add-edit-btn d-inline-flex align-items-center"
													data-bs-toggle="modal" data-bs-target="#add-faq"><i
														class="isax isax-add-circle5 me-1"></i> Add New</a>
											</div>
										</div>
									</div>
									<div class="pb-3 border-bottom mb-3">
										<div class="accordions-items-seperate" id="accordionSpacingExample1">
											<div class="accordion-item">
												<h2 class="accordion-header" id="headingSpacingFour">
													<a href="javascript:void(0);" class="accordion-button collapsed"
														data-bs-toggle="collapse" data-bs-target="#Spacingthree"
														aria-expanded="false" aria-controls="Spacingthree">
														<span class="d-flex align-items-center text-gray-9 mb-0">
															<i class="isax isax-menu-15 me-2"></i>
															Hello World Project from GitHub
														</span>
													</a>
												</h2>
												<div id="Spacingthree" class="accordion-collapse collapse"
													aria-labelledby="headingSpacingFour"
													data-bs-parent="#accordionSpacingExample1">
													<div class="accordion-body">
														<div
															class="d-flex align-items-center justify-content-between bg-white p-2 border rounded-3 mb-3">
															<div class="d-flex align-items-center">
																<span><i
																		class="isax isax-play-circle5 text-success fs-24 me-1"></i></span>
																<p class="fw-medium text-gray-5 mb-0">Describe SEO
																	Engine</p>
															</div>
															<div class="d-flex align-items-center">
																<a href="javascript:void(0);" class="edit-btn1"><i
																		class="isax isax-edit-25 fs-16"></i></a>
																<a href="javascript:void(0);" class="delete-btn1"><i
																		class="isax isax-trash fs-16"></i></a>
															</div>
														</div>
														<div
															class="d-flex align-items-center justify-content-between bg-white p-2 border rounded-3 mb-3">
															<div class="d-flex align-items-center">
																<span><i
																		class="isax isax-play-circle5 text-success fs-24 me-1"></i></span>
																<p class="fw-medium text-gray-5 mb-0">Know about all
																	marketing</p>
															</div>
															<div class="d-flex align-items-center">
																<a href="javascript:void(0);" class="edit-btn1"><i
																		class="isax isax-edit-25 fs-16"></i></a>
																<a href="javascript:void(0);" class="delete-btn1"><i
																		class="isax isax-trash fs-16"></i></a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="accordion-item">
												<h2 class="accordion-header" id="headingSpacingFive">
													<a href="javascript:void(0);" class="accordion-button collapsed"
														data-bs-toggle="collapse" data-bs-target="#Spacingone"
														aria-expanded="false" aria-controls="Spacingone">
														<span class="d-flex align-items-center text-gray-9">
															<i class="isax isax-menu-15 me-2"></i>
															New Update
														</span>
													</a>
												</h2>
												<div id="Spacingone" class="accordion-collapse collapse"
													aria-labelledby="headingSpacingFive"
													data-bs-parent="#accordionSpacingExample">
													<div class="accordion-body">
														<div
															class="d-flex align-items-center justify-content-between bg-white p-2 border rounded-3 mb-3">
															<div class="d-flex align-items-center">
																<span><i
																		class="isax isax-play-circle5 text-success fs-24 me-1"></i></span>
																<p class="fw-medium text-gray-5 mb-0">Describe SEO
																	Engine</p>
															</div>
															<div class="d-flex align-items-center">
																<a href="javascript:void(0);" class="edit-btn1"><i
																		class="isax isax-edit-25 fs-16"></i></a>
																<a href="javascript:void(0);" class="delete-btn1"><i
																		class="isax isax-trash fs-16"></i></a>
															</div>
														</div>
														<div
															class="d-flex align-items-center justify-content-between bg-white p-2 border rounded-3 mb-3">
															<div class="d-flex align-items-center">
																<span><i
																		class="isax isax-play-circle5 text-success fs-24 me-1"></i></span>
																<p class="fw-medium text-gray-5 mb-0">Know about all
																	marketing</p>
															</div>
															<div class="d-flex align-items-center">
																<a href="javascript:void(0);" class="edit-btn1"><i
																		class="isax isax-edit-25 fs-16"></i></a>
																<a href="javascript:void(0);" class="delete-btn1"><i
																		class="isax isax-trash fs-16"></i></a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="pb-3 border-bottom mb-3">
										<div class="input-block mb-0">
											<label class="form-label">Tags</label>
											<input class="input-tags form-control" id="inputBox" type="text"
												data-role="tagsinput" name="specialist" value="red, black">
											<span class="fs-13 text-gray-6 mt-1 d-block">Maximum of 14 keywords.
												Keywords should all be in lowercase. e.g. javascript, react,
												marketing</span>
										</div>
									</div>
									<div class="input-block">
										<label class="form-label">Message to a reviewer</label>
										<textarea class="form-control"></textarea>
									</div>
									<div class="d-flex align-items-center">
										<div class="form-check form-check-md d-flex align-items-center">
											<input class="form-check-input" type="checkbox" value=""
												id="flexCheckChecked" checked>
											<label class="form-check-label ms-2" for="flexCheckChecked">
												Any images, sounds, or other assets that are not my own work, have been
												appropriately licensed for use in the file preview or main course. Other
												than these items, this work is entirely my own and I have full rights to
												sell it here.
											</label>
										</div>
									</div>
									<div class="add-form-btn widget-next-btn submit-btn">
										<div class="btn-left">
											<a href="javascript:void(0);" class="btn btn-light main-btn prev_btns"><i
													class="isax isax-arrow-left-2 me-1"></i>Prev</a>
										</div>
										<div class="btn-left">
											<a href="javascript:void(0);"
												class="btn btn-secondary main-btn next_btns">Next <i
													class="isax isax-arrow-right-3 ms-1"></i></a>
										</div>
									</div>
								</fieldset> -->

								<!-- course pricing section -->
								<fieldset class="form-inner wizard-form-card">
									<div>
										<div class="d-flex align-items-center mb-3">
											<div class="form-check form-check-md d-flex align-items-center">
												<input class="form-check-input" type="checkbox" value=""
													id="flexCheckChecked1" checked name="is_free">
												<label class="form-check-label ms-2" for="flexCheckChecked1">
													Check if this is a free course
												</label>
											</div>
										</div>
										<div class="input-block mb-2">
											<label class="form-label">Course Price ($)</label>
											<input type="text" class="form-control" name="price">
										</div>
										<!-- <div class="d-flex align-items-center mb-3">
											<div class="form-check form-check-md d-flex align-items-center">
												<input class="form-check-input" type="checkbox" value=""
													id="flexCheckChecked2">
												<label class="form-check-label ms-2" for="flexCheckChecked2">
													Check if this course has discount
												</label>
											</div>
										</div> -->
										<!-- <div class="input-block">
											<label class="form-label">Discount Price ($)</label>
											<input type="text" class="form-control mb-1">
											<span>This course has 0% Discount</span>
										</div> -->
										<!-- <div class="mb-4">
											<label class="form-label mb-1">Expiry Period</label>
											<div class="d-flex align-items-center ">
												<div class="form-check me-3">
													<input class="form-check-input" type="radio" name="flexRadioDefault"
														id="flexRadioDefault2" checked>
													<label class="form-check-label" for="flexRadioDefault2">
														Lifetime
													</label>
												</div>
												<div class="form-check me-3">
													<input class="form-check-input" type="radio" name="flexRadioDefault"
														id="flexRadioDefault3" checked>
													<label class="form-check-label" for="flexRadioDefault3">
														Limited Time
													</label>
												</div>
											</div>
										</div> -->
										<div class="input-block">
											<label class="form-label">Number of month</label>
											<input type="text" class="form-control mb-1" name="course_duration">
											<span>After purchase, students can access the course until your selected
												time.</span>
										</div>
									</div>
									<div class="add-form-btn widget-next-btn submit-btn">
										<div class="btn-left">
											<a href="javascript:void(0);" class="btn btn-light main-btn prev_btns"><i
													class="isax isax-arrow-left-2 me-1"></i>Prev</a>
										</div>
										<div class="btn-left">
											<!-- <a href="javascript:void(0);" class="btn btn-secondary main-btn next_btns"
												data-bs-toggle="modal" data-bs-target="#success">
												Submit Course
											</a> -->

											<button type="submit" class="btn btn-secondary main-btn">
												Submit Course <i class="fa-solid fa-arrow-right-long"></i>	
											</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Course watch -->

		<!--================================ Add topic ================================-->
		<!-- <div class="modal fade" id="add-topic">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5>Topic Name</h5>
						<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal"
							aria-label="Close">
							<i class="isax isax-close-circle5"></i>
						</button>
					</div>
					<form action="https://dreamslms.dreamstechnologies.com/html/template/add-course.html">
						<div class="modal-body">
							<div class="input-block">
								<label class="form-label">Add Name<span class="text-danger ms-1">*</span></label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn me-2 btn-light" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-secondary">Add New</button>
						</div>
					</form>
				</div>
			</div>
		</div> -->
		<!--================================ Add topic ================================-->

		<!-- Add lesson -->
		<!-- <div class="modal fade" id="add-lesson">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5>New Lesson</h5>
						<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal"
							aria-label="Close">
							<i class="isax isax-close-circle5"></i>
						</button>
					</div>
					<form action="https://dreamslms.dreamstechnologies.com/html/template/add-course.html">
						<div class="modal-body">
							<div class="input-block mb-4">
								<label class="form-label">Add Lesson<span class="text-danger ms-1">*</span></label>
								<input type="text" class="form-control">
							</div>
							<div class="input-block mb-4">
								<label class="form-label">Video link<span class="text-danger ms-1">*</span></label>
								<input type="text" class="form-control">
							</div>
							<div class="input-block mb-4">
								<label class="form-label">Course Description</label>
								<textarea class="form-control"></textarea>
							</div>
							<div class="d-flex align-items-center">
								<div class="form-check me-3">
									<input class="form-check-input" type="radio" name="flexRadioDefault"
										id="flexRadioDefault4" checked>
									<label class="form-check-label" for="flexRadioDefault4">
										free
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="flexRadioDefault"
										id="flexRadioDefault5">
									<label class="form-check-label" for="flexRadioDefault5">
										Premium
									</label>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn me-2 btn-light" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-secondary">Add New</button>
						</div>
					</form>
				</div>
			</div>
		</div> -->
		<!-- Add lesson -->

		<!-- Add Faq -->
		<!-- <div class="modal fade" id="add-faq">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5>New FAQ</h5>
						<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal"
							aria-label="Close">
							<i class="isax isax-close-circle5"></i>
						</button>
					</div>
					<form action="https://dreamslms.dreamstechnologies.com/html/template/add-course.html">
						<div class="modal-body">
							<div class="input-block mb-4">
								<label class="form-label">Question<span class="text-danger ms-1">*</span></label>
								<input type="text" class="form-control">
							</div>
							<div class="input-block mb-4">
								<label class="form-label">Answer<span class="text-danger ms-1">*</span></label>
								<textarea class="form-control"></textarea>
							</div>
							<div class="d-flex align-items-center">
								<div class="form-check me-3">
									<input class="form-check-input" type="radio" name="flexRadioDefault"
										id="flexRadioDefault6" checked>
									<label class="form-check-label" for="flexRadioDefault6">
										Enable
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="flexRadioDefault"
										id="flexRadioDefault7">
									<label class="form-check-label" for="flexRadioDefault7">
										Disable
									</label>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn me-2 btn-light" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-secondary">Add New</button>
						</div>
					</form>
				</div>
			</div>
		</div> -->
		<!-- Add Faq -->

		<!-- success -->
		<div class="modal fade modal-default" id="success">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body p-4">
						<div class="text-center">
							<div class="text-success h1 mb-2">
								<i class="isax isax-tick-circle5"></i>
							</div>
							<h5 class="mb-2">Congratulations! Course Submitted</h5>
							<p class="mb-3">You’ve successfully Submitted the Course & its under the review, Once the
								course is reviewed by the reviewer it will go live.</p>
							<div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
								<a href="instructor-dashboard.html" class="btn btn-secondary"><i
										class="isax isax-arrow-left-2 me-1"></i>Back to Dashboard</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- success -->


		<!--================================ Footer ================================-->
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
		<!--================================ Footer ================================-->


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



	<script>

		let sectionIndex = 1;


		// ADD SECTION
		document.getElementById('add-section-btn').addEventListener('click', function () {

			let html = `

			<div class="card border mb-4 section-item">

				<div class="card-body">

					<div class="mb-3">

						<label class="form-label">
							Section Title
						</label>

						<input type="text"
							class="form-control"
							name="section_title[]"
							placeholder="Enter section title">

					</div>


					<div class="lessons-wrapper">

						<div class="border rounded p-3 mb-3 lesson-item">

							<div class="row">

								<div class="col-md-6 mb-3">

									<label class="form-label">
										Lesson Title
									</label>

									<input type="text"
										class="form-control"
										name="lesson_title[${sectionIndex}][]">

								</div>


								<div class="col-md-6 mb-3">

									<label class="form-label">
										Video URL
									</label>

									<input type="text"
										class="form-control"
										name="video_url[${sectionIndex}][]">

								</div>


								<div class="col-md-4 mb-3">

									<label class="form-label">
										Duration
									</label>

									<input type="text"
										class="form-control"
										name="lesson_duration[${sectionIndex}][]">

								</div>


								<div class="col-md-4 mb-3">

									<label class="form-label">
										Preview
									</label>

									<select class="form-control"
											name="is_preview[${sectionIndex}][]">

										<option value="0">No</option>
										<option value="1">Yes</option>

									</select>

								</div>


								<div class="col-md-4 mb-3 d-flex align-items-end">

									<button type="button"
											class="btn btn-danger remove-lesson-btn w-100">

										Remove Lesson

									</button>

								</div>

							</div>

						</div>

					</div>


					<button type="button"
							class="btn btn-secondary add-lesson-btn">

						Add Lesson

					</button>


					<button type="button"
							class="btn btn-danger float-end remove-section-btn">

						Remove Section

					</button>

				</div>

			</div>
			`;

			document.getElementById('curriculum-wrapper')
					.insertAdjacentHTML('beforeend', html);

			sectionIndex++;

		});




		// ADD LESSON
		document.addEventListener('click', function(e){

			if(e.target.classList.contains('add-lesson-btn')){

				let sectionCard = e.target.closest('.section-item');

				let lessonsWrapper = sectionCard.querySelector('.lessons-wrapper');

				let sectionNumber = [...document.querySelectorAll('.section-item')]
									.indexOf(sectionCard);

				let lessonHTML = `

				<div class="border rounded p-3 mb-3 lesson-item">

					<div class="row">

						<div class="col-md-6 mb-3">

							<label class="form-label">
								Lesson Title
							</label>

							<input type="text"
								class="form-control"
								name="lesson_title[${sectionNumber}][]">

						</div>


						<div class="col-md-6 mb-3">

							<label class="form-label">
								Video URL
							</label>

							<input type="text"
								class="form-control"
								name="video_url[${sectionNumber}][]">

						</div>


						<div class="col-md-4 mb-3">

							<label class="form-label">
								Duration
							</label>

							<input type="text"
								class="form-control"
								name="lesson_duration[${sectionNumber}][]">

						</div>


						<div class="col-md-4 mb-3">

							<label class="form-label">
								Preview
							</label>

							<select class="form-control"
									name="is_preview[${sectionNumber}][]">

								<option value="0">No</option>
								<option value="1">Yes</option>

							</select>

						</div>


						<div class="col-md-4 mb-3 d-flex align-items-end">

							<button type="button"
									class="btn btn-danger remove-lesson-btn w-100">

								Remove Lesson

							</button>

						</div>

					</div>

				</div>
				`;

				lessonsWrapper.insertAdjacentHTML('beforeend', lessonHTML);

			}

		});




		// REMOVE LESSON
		document.addEventListener('click', function(e){

			if(e.target.classList.contains('remove-lesson-btn')){

				e.target.closest('.lesson-item').remove();

			}

		});




		// REMOVE SECTION
		document.addEventListener('click', function(e){

			if(e.target.classList.contains('remove-section-btn')){

				e.target.closest('.section-item').remove();

			}

		});

	</script>


</body>


</html>