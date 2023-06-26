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
$userId = $getUserData->getUserId($useremail);
//Connect With Reviews Models;
$reviews_model = new Reviews();
$reviews = $reviews_model->get_review_with_limit_offset(5, 0);
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
		<main data-user-id="<?php echo $userId[0]['id'] ?>">
			<?php
			foreach ($reviews as $review) {
				$id_of_review = $review['id'];
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
						<p>
							<?php
							echo $review["content"];
							?>
						</p>
						<div class="d-flex flex-wrap">

							<?php
							foreach ($review_books as $review_book_id) {
								$book = $reviews_model->get_bookinfo_by_id($review_book_id["book_id"]);
								?>
								<a href="BookDetail.php?id=<?php echo $review_book_id['book_id'] ?>">
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


					</div>
					<div class="review-actions position-relative">
						<button class="like-btn <?php if ($reviews_model->is_react($id_of_review, $userId[0]['id'])) {
							echo "liked";
						} ?>" data-review-id="<?php echo $review['id'] ?>" onclick="toggleLike(this)">
							<i class="fas fa-thumbs-up"></i>
							<span class="like-text">Like</span>
							<span class="like-count">
								<?php
								$total_react = $reviews_model->get_review_reacts($id_of_review);
								echo $total_react['user_react'];
								?>
							</span>
						</button>
						<button class="comment-btn" data-review-id="<?php echo $review['id'] ?> " onclick=toggleComment(this)>
							<i class="fas fa-comment"></i> Comment
						</button>
						<!-- <div class="who-viewed">
							<img src="user-avatar.jpg" alt="Avatar 1" class="Profile-avatar" />
							<img src="user-avatar.jpg" alt="Avatar 2" class="Profile-avatar" />
							<span class="view-count">+3</span>
						</div> -->
					</div>
					<div class="comments hide" id = "comment-<?php echo $review['id'] ?>">
						<h4>Comments</h4>
						<ul class="comment-list">
							<?php 
							$comments =	$reviews_model->get_review_comments($review['id']);
							foreach ($comments as $key => $comment) {
							$userInfo = $reviews_model->get_userinfo_by_id($comment['user_id']);
							?>
							<li class="comment">
								<div class="comment-avatar">
									<img src="<?php echo $userInfo["image"] ?>" alt="<?php echo $userInfo["image"] ?>" />
								</div>
								<div class="comment-content">
									<p class="comment-text">
										<?php echo $comment['comment'] ?>
									</p>
									<span class="comment-meta">-
										<?php echo $userInfo['name'] ?>
									</span>
								</div>
							</li>

							<?php 
							}
							?>
						</ul>
						<button class="load-more-btn btn">Load More</button>

						<form class="comment-form" method='post'>
							<textarea class="form-control" placeholder="Add a comment" name="comment"></textarea>
							<button class="btn btn-primary" name="submit">Submit</button>
						</form>
					</div>
				</div>
				<?php
			}
			?>


		</main>
		<div class="mt-4" style="display: flex;justify-content: center; width: 100%;">
			No More Result
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
	<script src="../fontawesome/js/all.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="Review.js"></script>
</body>

</html>