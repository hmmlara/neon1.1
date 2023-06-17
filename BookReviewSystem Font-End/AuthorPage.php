
<?php
session_start();
include_once "../controllers/registercontroller.php";
$getUserData=new RegisterController();
$getUserinfo=$getUserData->getUserList();
foreach ($getUserinfo as $getUser) {
	//var_dump($getUser) ;
}
if(!isset($_SESSION['user_email']))
	{
		header("location:../login.php");
	}else{
		echo $_SESSION["user_email"];
	}
	if($_SESSION["user_email"]==$getUser['email'])
	{
		$userimg=$getUser['image'];
		$username=$getUser['name'];
		$userbio=$getUser['bio'];
		$useremail=$getUser['email'];
		echo $userimg;
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Book Review System</title>
		<link
			rel="stylesheet"
			href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
		/>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
		/>
		<link
			rel="stylesheet"
			href="style.css"
		/>
		<link
			rel="stylesheet"
			href="AuthorPage.css"
		/>
	</head>
	<body>
		<!-- Navigation bar -->
		<?php 
	include_once "nav.php";
	?>
		<!-- search bar -->
		<div class="container mt-4">
			<!-- Search Bar -->
			<div class="search-bar">
				<div class="input-group">
					<input
						type="text"
						class="form-control"
						placeholder="Search..."
					/>
					<div class="input-group-append">
						<button
							class="btn btn-primary"
							type="button"
						>
							Search
						</button>
					</div>
				</div>
			</div>

			<!-- Filter Component -->
			<div class="filter-component">
				<select class="form-control filter-select">
					<option selected>Genre..</option>
					<option>Action</option>
					<option>Comedy</option>
					<option>Biography</option>
				</select>
			</div>

			<!-- Rest of the Book Review System content -->
		</div>
		<!--  -->
		<div class="container mt-4">
			<div class="author-card-grid-view">
                
				<!-- Author cards  -->
                    <div class="author-card">
                    <img class="author-image" src="book-image.jpg" alt="Author Image">
                    <h2 class="author-name">Author Name</h2>
                    <p class="author-bio">Author Bio</p>
                    <a class="author-website" href="AuthorDetail.php" target="_blank">Author's Books</a>
                  </div>
                  <div class="author-card">
                    <img class="author-image" src="book-image.jpg" alt="Author Image">
                    <h2 class="author-name">Author Name</h2>
                    <p class="author-bio">Author Bio</p>
                    <a class="author-website" href="AuthorDetail.php" target="_blank">Author's Books</a>
                  </div>
                  <div class="author-card">
                    <img class="author-image" src="book-image.jpg" alt="Author Image">
                    <h2 class="author-name">Author Name</h2>
                    <p class="author-bio">Author Bio</p>
                    <a class="author-website" href="AuthorDetail.php" target="_blank">Author's Books</a>
                  </div>
            </div>
			<div class="mt-4" style="display: flex;justify-content: center; width: 100%;">
				<a href="" class="btn btn-primary m-auto" >Load More</a>
			</div>
		</div>
		</div>

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
									<a
										href="#"
										class=""
										>FAQ</a
									>
								</li>
								<li class="">
									<a
										href="#"
										class=""
										>Support</a
									>
								</li>

								<li class="">
									<a
										href="#"
										class=""
										>Contact Us</a
									>
								</li>
							</ul>
							<ul>
								<li class="">
									<a
										href="#"
										class=""
										>About us</a
									>
								</li>
								<li class="">
									<a
										href="#"
										class=""
										>BookMark</a
									>
								</li>

								<li class="">
									<a
										href="#"
										class=""
										>Profile</a
									>
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
