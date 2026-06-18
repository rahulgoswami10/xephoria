
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<!-- Header -->
<header class="header-two">
	<div class="container">
		<div class="header-nav">
			<div class="navbar-header">
				<a id="mobile_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>
				<div class="navbar-logo">
					<a class="logo-white header-logo" href="index-2.html">
						<img src="../assets/img/logo.svg" class="logo" alt="Logo">
					</a>
					<a class="logo-dark header-logo" href="index-2.html">
						<img src="../assets/img/logo-white.svg" class="logo" alt="Logo">
					</a>
				</div>
			</div>
			<div class="main-menu-wrapper">
				<div class="menu-header">
					<a href="index-2.html" class="menu-logo">
						<img src="../assets/img/logo.svg" class="img-fluid" alt="Logo">
					</a>
					<a id="menu_close" class="menu-close" href="javascript:void(0);">
						<i class="fas fa-times"></i>
					</a>
				</div>
				<ul class="main-nav">

					<li class="has-submenu megamenu">
						<a href="#">Home</a>
					</li>

					<li class="has-submenu">
						<a href="#">Courses</a>
						<ul class="submenu">
							<li class="has-submenu">
								<a href="#">Courses</a>
								<ul class="submenu">
									<li><a href="course-grid.html">Course Grid</a></li>
									<li><a href="course-list.html">Course List</a></li>
								</ul>
							</li>
							<li class="has-submenu">
								<a href="#">Course Category</a>
								<ul class="submenu">
									<li><a href="course-category.html">Course Category</a></li>
									<li><a href="course-category-2.html">Course Category 2</a></li>
									<li><a href="course-category-3.html">Course Category 3</a></li>
								</ul>
							</li>
							<li class="has-submenu">
								<a href="#">Course Details</a>
								<ul class="submenu">
									<li><a href="course-details.html">Course Details</a></li>
									<li><a href="course-details-2.html">Course Details 2</a></li>
								</ul>
							</li>
							<li><a href="course-resume.html">Course Resume</a></li>
							<li><a href="course-watch.html">Course Watch</a></li>
							<li><a href="cart.html">Course Cart</a></li>
							<li><a href="checkout.html">Course Checkout</a></li>
							<!-- <li><a href="add-course.html">Add New Course</a></li> -->
						</ul>
					</li>

					<li class="has-submenu active">
						<a href="dashboard.php">Dashboard</a>
					</li>
                    
				</ul>
			</div>
			<div class="header-btn d-flex align-items-center">
				<div class="icon-btn me-2">
					<a href="javascript:void(0);" id="dark-mode-toggle" class="theme-toggle activate">
						<i class="isax isax-sun-15"></i>
					</a>
					<a href="javascript:void(0);" id="light-mode-toggle" class="theme-toggle">
						<i class="isax isax-moon"></i>
					</a>
				</div>
				<div class="icon-btn me-3">
					<a href="cart.html" class="position-relative">
						<i class="isax isax-shopping-cart5"></i>
						<span class="count-icon bg-success p-1 rounded-pill text-white fs-10 fw-bold">1</span>
					</a>
				</div>
				<div class="dropdown profile-dropdown">
					<a href="javascript:void(0);" class="d-flex align-items-center" data-bs-toggle="dropdown">
						<span class="avatar">
							<img src="../assets/img/user/user-01.jpg" alt="Img" class="img-fluid rounded-circle">
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-end">
						<div class="profile-header d-flex align-items-center">
							<div class="avatar">
                                <?php

                                    $profile_pic = !empty($_SESSION['profile_pic'])
                                        ? "../uploads/profile/" . $_SESSION['profile_pic']
                                        : "../assets/img/user/user-01.jpg";
                                ?>
                                
                                <img src="<?php echo $profile_pic; ?>" alt="profile" class="img-fluid rounded-circle">
							</div>
							<div>

								<h6><?php echo $_SESSION['user_name']; ?></h6>
								<p><?php echo $_SESSION['user_email']; ?></p>

							</div>
						</div>
						<ul class="profile-body">
							<li>
								<a class="dropdown-item d-inline-flex align-items-center rounded fw-medium"
									href="dashboard.php"><i
										class="isax isax-security-user me-2"></i>My Profile</a>
							</li>
							<li>
								<a class="dropdown-item d-inline-flex align-items-center rounded fw-medium"
									href="instructor-course.html"><i
										class="isax isax-teacher me-2"></i>Courses</a>
							</li>
							<li>
								<a class="dropdown-item d-inline-flex align-items-center rounded fw-medium2"
									href="instructor-earnings.html"><i
										class="isax isax-dollar-circle me-2"></i>Earnings</a>
							</li>
							<li>
								<a class="dropdown-item d-inline-flex align-items-center rounded fw-medium"
									href="instructor-payout.html"><i class="isax isax-coin me-2"></i>Payouts</a>
							</li>
							<li>
								<a class="dropdown-item d-inline-flex align-items-center rounded fw-medium"
									href="instructor-message.html"><i
										class="isax isax-messages-3 me-2"></i>Messages<span
										class="message-count">2</span></a>
							</li>
							<li>
								<a class="dropdown-item d-inline-flex align-items-center rounded fw-medium"
									href="instructor-settings.html"><i
										class="isax isax-setting-2 me-2"></i>Settings</a>
							</li>
						</ul>
						
						<div class="profile-footer">

							<?php if (isset($_SESSION['user_id'])) {?>

								<a href="../auth/logout.php"
									class="btn btn-secondary d-inline-flex align-items-center justify-content-center w-100">
									<i accesskey=""class="isax isax-logout me-2"></i>
										Logout
								</a>

							<?php } else { ?>

								<a class="dropdown-item d-inline-flex align-items-center rounded fw-medium"
									href="../auth/login.php"><i class="isax isax-arrow-2 me-2"></i>
									Log in
								</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- Header -->