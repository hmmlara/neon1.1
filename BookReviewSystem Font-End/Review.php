<?php
session_start();
include_once "../controllers/registercontroller.php";
include_once "../models/reviews.php";
$getUserData = new RegisterController();
$getUserinfo = $getUserData->getUserList();
foreach ($getUserinfo as $getUser) {
	//var_dump($getUser) ;
}
if (!isset($_SESSION['user_email'])) {
	header("location:../login.php");
} else {
}
if ($_SESSION["user_email"] == $getUser['email']) {
	$userimg = $getUser['image'];
	$username = $getUser['name'];
	$userbio = $getUser['bio'];
	$useremail = $getUser['email'];
}

//Connect With Reviews Models;
$reviews_model = new Reviews();
$reviews = $reviews_model->get_all_review();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Book Review System</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="Review.css" />
	<link rel="stylesheet" href="../fontawesome/css/all.css">

</head>

<body>
	<!-- Navigation bar -->
	<?php
	include_once "nav.php";
	?>

	<a href="Post.php" class="btn btn-primary float-right mt-2 mr-2">Post</a>

	<!-- Review  Post -->
	<div class="container mt-4">
		<main>

			<div class="mt-4" style="display: flex;justify-content: center; width: 100%;">
				<button type="" class="btn btn-primary m-auto " name="loadmore" id="loadMoreBtn">Load More</button>
			</div>

		</main>
	</div>
	<!-- Footer -->
	<footer class="footer mt-4">
		<div class="footer-container">
			<div class="footer-content">
				<div class="footer-section">
					<h4 class="text-center">About Us</h4>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
						aliquet semper sapien, ut sodales lectus tincidunt et.
					</p>
				</div>
				<div class="footer-section">
					<h4 class="text-center">Quit Link</h4>
					<div class="Quick-Link">
						<ul>
							<li class="">
								<a href="#" class="">FAQ</a>
							</li>
							<li class="">
								<a href="#" class="">Support</a>
							</li>

							<li class="">
								<a href="#" class="">Contact Us</a>
							</li>
						</ul>
						<ul>
							<li class="">
								<a href="#" class="">About us</a>
							</li>
							<li class="">
								<a href="#" class="">BookMark</a>
							</li>

							<li class="">
								<a href="#" class="">Profile</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="footer-section">
					<h4 class="text-center">Follow Us</h4>
					<ul class="social-links">
						<li>
							<a href="#"><i class="fab fa-facebook-f"></i></a>
						</li>
						<li>
							<a href="#"><i class="fab fa-twitter"></i></a>
						</li>
						<li>
							<a href="#"><i class="fab fa-instagram"></i></a>
						</li>
						<li>
							<a href="#"><i class="fab fa-youtube"></i></a>
						</li>
					</ul>
				</div>
			</div>
			<p class="text-center mt-4">
				© 2023 Book Review System. All rights reserved.
			</p>
		</div>
	</footer>

	<!-- JavaScript -->

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="../fontawesome/js/all.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="Review.js"></script>
</body>

</html>