<?php
session_start();
include_once "../controllers/registercontroller.php";
include_once "../controllers/authorController.php";

$getUserData=new RegisterController();
$getUserinfo=$getUserData->getUserList();

$getAllAuthorInfo=new authorController();
$getAllAuthor=$getAllAuthorInfo->getAllAuthorFromAuthorDetail();

foreach ($getUserinfo as $getUser) {
	//var_dump($getUser) ;
}

if(!isset($_SESSION['user_email']))
	{
		header("location:../login.php");
	}

	if($_SESSION["user_email"]==$getUser['email'])
	{
		$userimg=$getUser['image'];
		$username=$getUser['name'];
		$userbio=$getUser['bio'];
		$useremail=$getUser['email'];
	}


if(isset($_GET['id']))
{
	$id=$_GET['id'];
}

foreach($getAllAuthor as $getAuthor)
{
	if($id==$getAuthor['id'])
	{
		$authorname=$getAuthor['name'];
		$authorimg=$getAuthor['image'];
	}
 }

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
</head>

<body>
	<!-- Navigation bar -->
	<?php
	include_once "nav.php";
	?>

				</li>
			</ul>
		</div>
	</nav>
	<div class="container mt-4 mb-3">
		<div class="row ">
 			<div class="col-md-4 " >
				<img class="author-image" src="../image/<?php echo $authorimg;  ?>"  width="100%" alt="Author Image" />
			</div>
			<div class="col-md-6">
				<h2 class="author-name"><?php echo $authorname;  ?></h2>
				<p class="author-bio">Author Bio</p>
				<p>
					Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam
					repellat accusantium quisquam magni, ducimus sequi delectus itaque
					laborum nesciunt alias nulla minima explicabo sunt suscipit iste
					nihil beatae aliquid hic.
				</p>
			</div>
		</div>
		<!-- <div class="author-card-grid-view">
			Author cards here 
			<div class="author-card">
				<a class="author-website" href="https://www.author-website.com" target="_blank">Visit Website</a>
			</div>
		</div> -->
	</div>

	<!-- Books -->
	<div class="container">
		<div class="book-card-list">
			<!-- Search Bar -->
			<div class="search-bar">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search..." />
					<div class="input-group-append">
						<button class="btn btn-primary" type="button">
							Search
						</button>
					</div>
				</div>
			</div>

			<div class="book-card-grid">
				<div class="book-card">
					<div class="book-card-image">
						<img src="book-image.jpg" alt="Book 1" />
						<div class="book-card-overlay">
							<a href="#" class="book-card-button">Read More</a>
						</div>
					</div>
					<div class="book-card-info">
						<h3 class="book-card-title">Book 1</h3>
						<p class="book-card-author">Author: John Doe</p>
						<p class="book-card-genre">Genre: Fiction</p>
					</div>
				</div>
				<div class="book-card">
					<div class="book-card-image">
						<img src="book-image.jpg" alt="Book 2" />
						<div class="book-card-overlay">
							<a href="#" class="book-card-button">Read More</a>
						</div>
					</div>
					<div class="book-card-info">
						<h3 class="book-card-title">Book 2</h3>
						<p class="book-card-author">Author: Jane Smith</p>
						<p class="book-card-genre">Genre: Mystery</p>
					</div>
				</div>
				<div class="book-card">
					<div class="book-card-image">
						<img src="book-image.jpg" alt="Book 3" />
						<div class="book-card-overlay">
							<a href="#" class="book-card-button">Read More</a>
						</div>
					</div>
					<div class="book-card-info">
						<h3 class="book-card-title">Book 3</h3>
						<p class="book-card-author">Author: Michael Johnson</p>
						<p class="book-card-genre">Genre: Fantasy</p>
					</div>
				</div>
				<div class="book-card">
					<div class="book-card-image">
						<img src="book-image.jpg" alt="Book 3" />
						<div class="book-card-overlay">
							<a href="#" class="book-card-button">Read More</a>
						</div>
					</div>
					<div class="book-card-info">
						<h3 class="book-card-title">Book 3</h3>
						<p class="book-card-author">Author: Michael Johnson</p>
						<p class="book-card-genre">Genre: Fantasy</p>
					</div>
				</div>
			</div>
			<div class="mt-4" style="display: flex;justify-content: center; width: 100%;">
				<a href="" class="btn btn-primary m-auto">Load More</a>
			</div>
		</div>
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
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="app.js"></script>
</body>

</html>