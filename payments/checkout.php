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
        courses.*
    FROM cart
    INNER JOIN courses
        ON courses.id = cart.course_id
    WHERE cart.student_id = {$student_id}
    "
);

$total = 0;
$cart_items = [];

while ($row = mysqli_fetch_assoc($cart_query)) {
    $cart_items[] = $row;
    $total += $row['price'];
}


if (count($cart_items) == 0) {
	header("Location: cart.php");
    exit();
}

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
						<h2 class="breadcrumb-title mb-2">Checkout</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb justify-content-center mb-0">
								<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Checkout</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- Breadcrumb -->

		<!-- Checkout -->
		<div class="content">
			<div class="container">
				<div class="checkout-content">
					<div class="row">
						<div class="col-lg-8">
							<div class="checkout-item-1">
								<div class="border-bottom pb-3 mb-3">
									<h5>Billing Address</h5>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="input-block">
											<label class="form-label">First Name<span
													class="text-danger ms-1">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-block">
											<label class="form-label">Last Name<span
													class="text-danger ms-1">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-block">
											<label class="form-label">Phone Number (Optional)</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-block">
											<label class="form-label">Address Line 1<span
													class="text-danger ms-1">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-block">
											<label class="form-label">Address Line 2 (Optional)</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-block">
											<label class="form-label">Country<span
													class="text-danger ms-1">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-block">
											<label class="form-label">State<span
													class="text-danger ms-1">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-block">
											<label class="form-label">City<span
													class="text-danger ms-1">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-12">
										<div class="d-flex align-items-center mb-3">
											<div class="form-check d-flex">
												<input class="form-check-input" type="checkbox" value=""
													id="flexCheckDefault1">
												<label class="form-check-label" for="flexCheckDefault1">
													Shipping address is the same as my billing address
												</label>
											</div>
										</div>
										<div class="d-flex align-items-center">
											<div class="form-check d-flex">
												<input class="form-check-input" type="checkbox" value=""
													id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
													Save this information for next time
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="checkout-item-1">
								<div class="border-bottom pb-3 mb-3">
									<h5>Payment Method </h5>
								</div>
								<!-- <ul class="nav-tabs mb-3 nav-justified border-0 nav-style-1 d-sm-flex d-block"
									role="tablist">

									<li class="nav-item active">
										<a class="btn nav-link p-3 active" data-bs-toggle="tab" role="tab"
											href="#overview" aria-selected="false">
											<div class="d-flex justify-content-center align-items-center">
												<img src="../assets/img/icons/card.svg" alt="card" class="img-fluid me-2">
												<p class="fw-medium">Card</p>
											</div>
										</a>
									</li>

								</ul> -->
								
								<!-- <div class="mt-3" style="margin-bottom: 20px;">
									
									<button
										id="rzp-button"
										class="btn btn-primary rounded-pill">
										Pay ₹<?= number_format($total,2) ?>
									</button>

								</div> -->

								<div class="tab-content">
									<div class="tab-pane active show" id="overview" role="tabpanel">
										<div class="row">
											<div class="col-md-6">
												<div class="input-block">
													<label class="form-label">Card Number<span
															class="text-danger ms-1">*</span></label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block">
													<label class="form-label">Name on Card<span
															class="text-danger ms-1">*</span></label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block">
													<label class="form-label">Expiry Date<span
															class="text-danger ms-1">*</span></label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block">
													<label class="form-label">Security Number<span
															class="text-danger ms-1">*</span></label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
												<div class="d-flex align-items-center justify-content-end">
													<!-- <a href="#" class="btn btn-secondary rounded-pill">Pay $200.25</a> -->
													<button
														id="rzp-button"
														class="btn btn-secondary rounded-pill">
														Pay ₹<?= number_format($total,2) ?>
													</button>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="notes" role="tabpanel">
										<div class="row">
											<div class="col-md-6">
												<div class="input-block">
													<label class="form-label">Email Address<span
															class="text-danger ms-1">*</span></label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block">
													<label class="form-label">Password<span
															class="text-danger ms-1">*</span></label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
												<div class="d-flex align-items-center justify-content-end">
													<a href="#" class="btn btn-secondary rounded-pill">Pay $200.25</a>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="faq" role="tabpanel">
										<div class="row">
											<div class="col-md-6">
												<div class="input-block">
													<label class="form-label">Email Address<span
															class="text-danger ms-1">*</span></label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block">
													<label class="form-label">Password<span
															class="text-danger ms-1">*</span></label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
												<div class="d-flex align-items-center justify-content-end">
													<a href="#" class="btn btn-secondary rounded-pill">Pay $200.25</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="checkout-item-2">
								<div class="pb-3 border-bottom mb-3">
									<h5 class="mb-0">Order Details</h5>
								</div>
								<div class="checkout-item-3 bg-light p-3 rounded-3 border mb-3">

									<?php foreach($cart_items as $item) { ?>

									<div class="row row-gap-2 mb-3">
										<div class="col-md-12 d-flex align-items-center">

											<div class="order-img flex-shrink-0 me-3">
												<img
													src="../uploads/course_thumbnails/<?= htmlspecialchars($item['thumbnail']) ?>"
													class="img-fluid h-100 w-100">
											</div>

											<div>
												<h6 class="mb-2">
													<?= htmlspecialchars($item['title']) ?>
												</h6>

												<h6 class="text-secondary">
													₹<?= number_format($item['price'],2) ?>
												</h6>
											</div>

										</div>
									</div>

									<?php } ?>

								</div>

								<div class="d-flex align-items-center justify-content-between mb-2">
									<p class="mb-0">Sub Total</p>
									<p class="text-gray-9 fw-medium mb-0">₹<?= number_format($total,2) ?></p>
								</div>

								<!-- <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
									<p class="mb-0">Tax (VAT)</p>
									<p class="text-gray-9 fw-medium mb-0">$25</p>
								</div> -->

								<div class="total d-flex align-items-center justify-content-between">
									<h6 class="mb-0">Total</h6>
									<h4 class="mb-0">₹<?= number_format($total,2) ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Checkout -->

		<!--========================================== footer ==========================================-->
		<?php @include('../student/includes/footer.php'); ?>

	</div>
	<!-- =================================================================Main Wrapper =================================================================-->

	<!-- razorpay checkout cdn -->
	<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

	<!-- razorpay popup -->
	<script>
		document.getElementById('rzp-button').onclick = function (e) {

			var options = {
				key: "rzp_test_YOUR_KEY_ID",
				amount: <?= $total * 100 ?>,
				currency: "INR",
				name: "My LMS",
				description: "Course Purchase",

				handler: function (response) {

					window.location.href =
						"../payments/payment-success.php"
						+ "?payment_id=" + response.razorpay_payment_id
						+ "&signature=" + response.razorpay_signature;
				}
			};

			var rzp = new Razorpay(options);
			rzp.open();

			e.preventDefault();
		}
	</script>
</body>


</html>