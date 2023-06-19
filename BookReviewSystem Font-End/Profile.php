<?php
session_start();
include_once "../controllers/registercontroller.php";
include_once "../controllers/usercontroller.php";
include_once "../models/register.php";
include_once "../models/reviews.php";

$getUserData = new RegisterController();
$getUserinfo = $getUserData->getUserList();
$updateUserInfo = new UserController();


//Add User img
if (!isset($_SESSION['user_email'])) {
	header("location:../login.php");
} else {
	$userEmail = $_SESSION["user_email"];
}

foreach ($getUserinfo as $getUser) {
	if ($_SESSION["user_email"] == $getUser['email']) {
		$userimg = $getUser['image'];
		$username = $getUser['name'];
		$userbio = $getUser['bio'];
		$useremail = $getUser['email'];

	}
}


//click cancel
//if(isset())


// if(isset($_POST['edituserprofile']))
// {
// 	echo "Hello Mingalr Par";
// 	//change img
// 	$filename=$_FILES['img']['name'];
// 	$filesize=$_FILES['img']['size'];
// 	$allowed_files=['jpg','png','jpeg','svg'];
// 	$temp_path=$_FILES['img']['tmp_name'];

// 	$fileinfo=explode('.',$filename);
// 	$filetype=end($fileinfo);
// 	$maxsize=2000000000;
// 	if(in_array($filetype,$allowed_files)){
// 		if($filesize<$maxsize)
// 		{
// 			move_uploaded_file($temp_path,'../image/'.$filename);
// 		}else{
// 			echo "file size exceeds maximum allowed";
// 		}
// 	}else{
// 		echo "file type is not allowed";
// 	}
// 	echo "userimg".$filename;
// }


//click save btn
if (isset($_POST['save'])) {
	//$userimg=$_POST['userimg'];
	//$src = "../image/nurse.jpg"
	$filename = $_FILES['img']['name'];
	$filesize = $_FILES['img']['size'];
	$allowed_files = ['jpg', 'png', 'jpeg', 'svg'];
	$temp_path = $_FILES['img']['tmp_name'];

	$fileinfo = explode('.', $filename);
	$filetype = end($fileinfo);
	$maxsize = 2000000000;
	if (in_array($filetype, $allowed_files)) {
		if ($filesize < $maxsize) {
			move_uploaded_file($temp_path, '../image/' . $filename);
		} else {
			echo "file size exceeds maximum allowed";
		}
	} else {
		echo "file type is not allowed";
	}

	$error_status = false;

	if (!empty($_POST['usereditname'])) {
		$editusername = $_POST['usereditname'];
	} else {
		$error_status = true;
		$error_username = "Please Enter Your Name";
	}
	$edituserbio = $_POST['usereditbio'];

	if ($error_status == false) {
		$updateUser = $updateUserInfo->updateUserInfo($editusername, $useremail, $edituserbio, $filename);
		header("Location: " . $_SERVER['PHP_SELF']);
		echo $filename;
	}

}

//connect With Register Models 
$register_model = new CreateUser();
//Connect With Reviews Models;
$reviews_model = new Reviews();
$userid = $register_model->getUserId($userEmail);
$reviews = $reviews_model->get_review_by_userId($userid[0]['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Book Review System</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
	<link rel="stylesheet" href="../fontawesome/css/all.css">
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="Profile.css" />
	<link rel="stylesheet" href="Review.css">
</head>

<body>
	<!-- Navigation bar -->
	<?php 
	include_once "nav.php";
	?>

	<div class="profile-page">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="profile-header">
				<div class="profile-edit d-flex justify-content-center">
					<img src="../image/<?php if (empty($userimg)) {
						echo "nurse.jpg";
					} else {
						echo $userimg;
					} ?>" class="img"
						id="profileimg" alt="" />

				</div>
				<div class="cancel-button" id="cancelButton">
					<i class="fa-solid fa-xmark fa-xl cross d-none"></i>
				</div>
				<div class="round d-none">
					<i class="fa fa-camera camera" style="color: #00000;"></i>
					<input type="file" name="img" src="" alt="" id="input" class="world">
				</div>
				<h1 class="profile-name username mt-3">
					<?php echo $username; ?>
				</h1>

				<div class="d-flex justify-content-center">
					<input type="text" name="usereditname" placeholder="Please Enter Your Name"
						class="form-control usereditname d-none my-3 text-center <?php if (isset($error_username))
							echo "border border-danger" ?>"
							id="" value="<?php echo $username ?>" required>
				</div>
				<p class="profile-bio">
					<?php if (!empty($userbio)) {
						echo $userbio;
					} else {
						echo "Edit Your Bio";
					} ?>
				</p>
				<div class="d-flex justify-content-center">

					<input type="text" name="usereditbio" placeholder="Bio"
						class="form-control usereditbio d-none my-3 text-center" id="" value="<?php echo $userbio ?>">

				</div>

			</div>
			<div class="allbtn">
				<button class="btn btn-primary mx-3 editProfile" name="edituserprofile">Edit Profile</button>
				<!-- <a href="" class="btn btn-primary mx-3 editProfile" name="edituserprofile">Edit Profile</a> -->
				<a href="../login.php" class="btn btn-danger logout">Log Out</a>

				<button class="btn btn-info d-none save mx-3" name="save">Save</button>
				<button class="btn btn-warning d-none cancel" name="cancel">Cancel</button>
			</div>
		</form>
		<div class="profile-content mt-4	">
			<h2 class="section-title">Favorite Books</h2>
			<div class="favorite-books mb-4">
				<!-- Favorite book cards here -->
				<!-- Books -->
				<div class="container">
					<div class="book-card-list">

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
						<div class="mt-4" style="display: flex; justify-content: center; width: 100%">
							<a href="" class="btn btn-primary m-auto">Load More</a>
						</div>
					</div>
				</div>
			</div>
			
			<h2 class="section-title" class="mt-4">Reviews</h2>
			<div class="container mt-4">
				<main>
					<?php
					foreach ($reviews as $review) {
						$userinfo = $reviews_model->get_userinfo_by_id($review['user_id']);

						$review_books = $reviews_model->get_review_book($review['id']);

						?>
						<div class="review">
							<div class="review-header">
								<div class="user-profile">
									<img src="<?php echo $userinfo["image"] ?>" alt="<?php echo $userinfo["image"] ?>" />
									<div class="user-details">
										<h3>
											<?php echo $userinfo["name"] ?>
										</h3>
										<p>June 1, 2023</p>
									</div>
								</div>
							</div>
							<div class="review-content">
								<div class="d-flex flex-wrap">

									<?php
									foreach ($review_books as $review_book_id) {
										$book = $reviews_model->get_bookinfo_by_id($review_book_id["book_id"]);
										?>
										<a href="BookDetail.php">
											<div class="book-details">
												<img src="<?php echo $book["image"] ?>" alt="<?php echo $book["image"] ?>" />
												<div class="book-info">
													<h2>
														<?php echo $book["name"] ?>
													</h2>
													<?php
													$author = $reviews_model->get_author_by_id($book["auther_id"]);
													?>
													<p>by
														<?php echo $author["name"] ?>
													</p>
												</div>
											</div>
										</a>
									<?php
									}
									?>

								</div>

								<p>
									<?php
									echo $review["content"];
									?>
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
									<img src="user-avatar.jpg" alt="Avatar 1" class="Profile-avatar" />
									<img src="user-avatar.jpg" alt="Avatar 2" class="Profile-avatar" />
									<span class="view-count">+3</span>
								</div>
							</div>
							<div class="comments">
								<h4>Comments</h4>
								<ul class="comment-list">
									<li class="comment">
										<div class="comment-avatar">
											<img src="avatar.jpg" alt="User Avatar" />
										</div>
										<div class="comment-content">
											<p class="comment-text">This book was amazing!</p>
											<span class="comment-meta">- John Doe</span>
										</div>
									</li>
									<li class="comment">
										<div class="comment-avatar">
											<img src="avatar.jpg" alt="User Avatar" />
										</div>
										<div class="comment-content">
											<p class="comment-text">Highly recommended!</p>
											<span class="comment-meta">- Jane Smith</span>
										</div>
									</li>
									<li class="comment">
										<div class="comment-avatar">
											<img src="avatar.jpg" alt="User Avatar" />
										</div>
										<div class="comment-content">
											<p class="comment-text">Highly recommended!</p>
											<span class="comment-meta">- Jane Smith</span>
										</div>
									</li>
									<li class="comment">
										<div class="comment-avatar">
											<img src="avatar.jpg" alt="User Avatar" />
										</div>
										<div class="comment-content">
											<p class="comment-text">Highly recommended!</p>
											<span class="comment-meta">- Jane Smith</span>
										</div>
									</li>
									<li class="comment">
										<div class="comment-avatar">
											<img src="avatar.jpg" alt="User Avatar" />
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
									<textarea class="form-control" placeholder="Add a comment"></textarea>
									<button class="btn btn-primary">Submit</button>
								</form>
							</div>
						</div>
						<?php
					}
					?>


				</main>
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
	<script src="../fontawesome/js/all.js"></script>
	<script src="app.js"></script>
	<script src="../js/profile.js"></script>
	<script src="Review.js"></script>
</body>

</html>