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
		header("location:login.php");
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
			href="Review.css"
		/>
		<link rel="stylesheet" href="../fontawesome/css/all.css">
	
	</head>
	<body>
		<!-- Navigation bar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a
				class="navbar-brand-logo"
				href="#"
			>
				<img
					src="logo.png"
					style="width: 200px; height: 100px"
					alt="Book Review System Logo"
				/>
			</a>

			<button
				class="navbar-toggler"
				type="button"
				data-toggle="collapse"
				data-target="#navbarNav"
				aria-controls="navbarNav"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
				<span class="navbar-toggler-icon"></span>
			</button>
			<div
				class="collapse navbar-collapse justify-content-end"
				id="navbarNav"
			>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a
							class="nav-link"
							href="index.php"
							>Home</a
						>
					</li>

					<li class="nav-item">
						<a
							class="nav-link"
							href="AuthorPage.php"
							>Author</a
						>
					</li>
					<li class="nav-item active">
						<a
							class="nav-link"
							href="Review.php"
							>Reviews</a
						>
					</li>

					<li class="nav-item hide-in-large">
						<a
							class="nav-link"
							href="Profile.php"
							>Profile</a
						>
					</li>
					<li class="nav-item account">
						<a href="Profile.php">
							<div class="avatar">
								<img
									src="../image/<?php echo $userimg;  ?>"
									alt="User Avatar"
								/>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<a href="Post.php" class="btn btn-primary float-right mt-2 mr-2">Post</a>

		<!-- Review  Post -->
		<div class="container mt-4">
			<main>
				<div class="review">
					<div class="review-header">
						<div class="user-profile">
							<img
								src="user-avatar.jpg"
								alt="User Avatar"
							/>
							<div class="user-details">
								<h3>John Doe</h3>
								<p>June 1, 2023</p>
							</div>
						</div>
					</div>
					<div class="review-content">
						<div class="d-flex flex-wrap">
							<a href="BookDetail.php">
								<div class="book-details">
									<img
										src="book-image.jpg"
										alt="Book Cover"
									/>
									<div class="book-info">
										<h2>The Book Title</h2>
										<p>by Author Name</p>
									</div>
								</div>
							</a>
							<a href="BookDetail.php">
								<div class="book-details">
									<img
										src="book-image.jpg"
										alt="Book Cover"
									/>
									<div class="book-info">
										<h2>The Book Title</h2>
										<p>by Author Name</p>
									</div>
								</div>
							</a>
						</div>

						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc
							scelerisque volutpat nisl vitae vestibulum. Duis vel velit a justo
							tincidunt dictum in vitae ante. Proin lobortis pulvinar diam, nec
							dapibus felis vestibulum ut. Sed euismod nibh quis ligula
							pellentesque, at iaculis sem tincidunt.
						</p>
					</div>
					<div class="review-actions position-relative">
						<button class="like-btn" onclick="toggleLike(this)">
							<i class="fas fa-thumbs-up"></i>
							<span class="like-text">Like</span>
							<span class="like-count">10</span>
						  </button>
						<button class="comment-btn">
							<i class="fas fa-comment"></i> Comment
						</button>
						<div class="who-viewed">
							<img
								src="user-avatar.jpg"
								alt="Avatar 1"
								class="Profile-avatar"
							/>
							<img
								src="user-avatar.jpg"
								alt="Avatar 2"
								class="Profile-avatar"
							/>
							<span class="view-count">+3</span>
						</div>
					</div>
					<div class="comments">
						<h4>Comments</h4>
						<ul class="comment-list">
							<li class="comment">
								<div class="comment-avatar">
									<img
										src="avatar.jpg"
										alt="User Avatar"
									/>
								</div>
								<div class="comment-content">
									<p class="comment-text">This book was amazing!</p>
									<span class="comment-meta">- John Doe</span>
								</div>
							</li>
							<li class="comment">
								<div class="comment-avatar">
									<img
										src="avatar.jpg"
										alt="User Avatar"
									/>
								</div>
								<div class="comment-content">
									<p class="comment-text">Highly recommended!</p>
									<span class="comment-meta">- Jane Smith</span>
								</div>
							</li>
							<li class="comment">
								<div class="comment-avatar">
									<img
										src="avatar.jpg"
										alt="User Avatar"
									/>
								</div>
								<div class="comment-content">
									<p class="comment-text">Highly recommended!</p>
									<span class="comment-meta">- Jane Smith</span>
								</div>
							</li>
							<li class="comment">
								<div class="comment-avatar">
									<img
										src="avatar.jpg"
										alt="User Avatar"
									/>
								</div>
								<div class="comment-content">
									<p class="comment-text">Highly recommended!</p>
									<span class="comment-meta">- Jane Smith</span>
								</div>
							</li>
							<li class="comment">
								<div class="comment-avatar">
									<img
										src="avatar.jpg"
										alt="User Avatar"
									/>
								</div>
								<div class="comment-content">
									<p class="comment-text">Highly recommended!</p>
									<span class="comment-meta">- Jane Smith</span>
								</div>
							</li>
							<!-- Add more comment list items as needed -->
						</ul>
						<button class="load-more-btn btn">Load More</button>
		
						<form class="comment-form">
							<textarea
								class="form-control"
								placeholder="Add a comment"
							></textarea>
							<button class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
				<div class="review">
					<div class="review-header">
						<div class="user-profile">
							<img
								src="user-avatar.jpg"
								alt="User Avatar"
							/>
							<div class="user-details">
								<h3>John Doe</h3>
								<p>June 1, 2023</p>
							</div>
						</div>
					</div>
					<div class="review-content">
						<div class="d-flex flex-wrap">
							<a href="BookDetail.php">
								<div class="book-details">
									<img
										src="book-image.jpg"
										alt="Book Cover"
									/>
									<div class="book-info">
										<h2>The Book Title</h2>
										<p>by Author Name</p>
									</div>
								</div>
							</a>
							<a href="BookDetail.php">
								<div class="book-details">
									<img
										src="book-image.jpg"
										alt="Book Cover"
									/>
									<div class="book-info">
										<h2>The Book Title</h2>
										<p>by Author Name</p>
									</div>
								</div>
							</a>
						</div>

						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc
							scelerisque volutpat nisl vitae vestibulum. Duis vel velit a justo
							tincidunt dictum in vitae ante. Proin lobortis pulvinar diam, nec
							dapibus felis vestibulum ut. Sed euismod nibh quis ligula
							pellentesque, at iaculis sem tincidunt.
						</p>
					</div>
					<div class="review-actions position-relative">
						<button class="like-btn" onclick="toggleLike(this)">
							<i class="fas fa-thumbs-up"></i>
							<span class="like-text">Like</span>
							<span class="like-count">10</span>
						  </button>
						<button class="comment-btn">
							<i class="fas fa-comment"></i> Comment
						</button>
						<div class="who-viewed">
							<img
								src="user-avatar.jpg"
								alt="Avatar 1"
								class="Profile-avatar"
							/>
							<img
								src="user-avatar.jpg"
								alt="Avatar 2"
								class="Profile-avatar"
							/>
							<span class="view-count">+3</span>
						</div>
					</div>
					<div class="comments">
						<h4>Comments</h4>
						<ul class="comment-list">
							<li class="comment">
								<div class="comment-avatar">
									<img
										src="avatar.jpg"
										alt="User Avatar"
									/>
								</div>
								<div class="comment-content">
									<p class="comment-text">This book was amazing!</p>
									<span class="comment-meta">- John Doe</span>
								</div>
							</li>
							<li class="comment">
								<div class="comment-avatar">
									<img
										src="avatar.jpg"
										alt="User Avatar"
									/>
								</div>
								<div class="comment-content">
									<p class="comment-text">Highly recommended!</p>
									<span class="comment-meta">- Jane Smith</span>
								</div>
							</li>
							<li class="comment">
								<div class="comment-avatar">
									<img
										src="avatar.jpg"
										alt="User Avatar"
									/>
								</div>
								<div class="comment-content">
									<p class="comment-text">Highly recommended!</p>
									<span class="comment-meta">- Jane Smith</span>
								</div>
							</li>
							<li class="comment">
								<div class="comment-avatar">
									<img
										src="avatar.jpg"
										alt="User Avatar"
									/>
								</div>
								<div class="comment-content">
									<p class="comment-text">Highly recommended!</p>
									<span class="comment-meta">- Jane Smith</span>
								</div>
							</li>
							<li class="comment">
								<div class="comment-avatar">
									<img
										src="avatar.jpg"
										alt="User Avatar"
									/>
								</div>
								<div class="comment-content">
									<p class="comment-text">Highly recommended!</p>
									<span class="comment-meta">- Jane Smith</span>
								</div>
							</li>
							<!-- Add more comment list items as needed -->
						</ul>
						<button class="load-more-btn btn">Load More</button>
		
						<form class="comment-form">
							<textarea
								class="form-control"
								placeholder="Add a comment"
							></textarea>
							<button class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
				<div class="review">
					<div class="review-header">
						<div class="user-profile">
							<img
								src="user-avatar.jpg"
								alt="User Avatar"
							/>
							<div class="user-details">
								<h3>John Doe</h3>
								<p>June 1, 2023</p>
							</div>
						</div>
					</div>
					<div class="review-content">
						<div class="d-flex flex-wrap">
							<a href="BookDetail.php">
								<div class="book-details">
									<img
										src="book-image.jpg"
										alt="Book Cover"
									/>
									<div class="book-info">
										<h2>The Book Title</h2>
										<p>by Author Name</p>
									</div>
								</div>
							</a>
							<a href="BookDetail.php">
								<div class="book-details">
									<img
										src="book-image.jpg"
										alt="Book Cover"
									/>
									<div class="book-info">
										<h2>The Book Title</h2>
										<p>by Author Name</p>
									</div>
								</div>
							</a>
						</div>

						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc
							scelerisque volutpat nisl vitae vestibulum. Duis vel velit a justo
							tincidunt dictum in vitae ante. Proin lobortis pulvinar diam, nec
							dapibus felis vestibulum ut. Sed euismod nibh quis ligula
							pellentesque, at iaculis sem tincidunt.
						</p>
					</div>
					<div class="review-actions position-relative">
						<button class="like-btn" onclick="toggleLike(this)">
							<i class="fas fa-thumbs-up"></i>
							<span class="like-text">Like</span>
							<span class="like-count">10</span>
						  </button>
						<button class="comment-btn">
							<i class="fas fa-comment"></i> Comment
						</button>
						<div class="who-viewed">
							<img
								src="user-avatar.jpg"
								alt="Avatar 1"
								class="Profile-avatar"
							/>
							<img
								src="user-avatar.jpg"
								alt="Avatar 2"
								class="Profile-avatar"
							/>
							<span class="view-count">+3</span>
						</div>
					</div>
					<div class="comments">
						<h4>Comments</h4>
						<ul class="comment-list">
							<li class="comment">
								<div class="comment-avatar">
									<img
										src="avatar.jpg"
										alt="User Avatar"
									/>
								</div>
								<div class="comment-content">
									<p class="comment-text">This book was amazing!</p>
									<span class="comment-meta">- John Doe</span>
								</div>
							</li>
							<li class="comment">
								<div class="comment-avatar">
									<img
										src="avatar.jpg"
										alt="User Avatar"
									/>
								</div>
								<div class="comment-content">
									<p class="comment-text">Highly recommended!</p>
									<span class="comment-meta">- Jane Smith</span>
								</div>
							</li>
							<li class="comment">
								<div class="comment-avatar">
									<img
										src="avatar.jpg"
										alt="User Avatar"
									/>
								</div>
								<div class="comment-content">
									<p class="comment-text">Highly recommended!</p>
									<span class="comment-meta">- Jane Smith</span>
								</div>
							</li>
							<li class="comment">
								<div class="comment-avatar">
									<img
										src="avatar.jpg"
										alt="User Avatar"
									/>
								</div>
								<div class="comment-content">
									<p class="comment-text">Highly recommended!</p>
									<span class="comment-meta">- Jane Smith</span>
								</div>
							</li>
							<li class="comment">
								<div class="comment-avatar">
									<img
										src="avatar.jpg"
										alt="User Avatar"
									/>
								</div>
								<div class="comment-content">
									<p class="comment-text">Highly recommended!</p>
									<span class="comment-meta">- Jane Smith</span>
								</div>
							</li>
							<!-- Add more comment list items as needed -->
						</ul>
						<button class="load-more-btn btn">Load More</button>
		
						<form class="comment-form">
							<textarea
								class="form-control"
								placeholder="Add a comment"
							></textarea>
							<button class="btn btn-primary">Submit</button>
						</form>
					</div>
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
		<script src="../fontawesome/js/all.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<script src="Review.js"></script>
	</body>
</html>
