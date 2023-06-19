
<?php
session_start();
$user_id=$_SESSION['userid'];

include_once('../neon/controller/bookController.php');
include_once('../controllers/commentController.php');
$cid=$_GET['id'];
$book_controller=new BookController();
$book=$book_controller->getBook($cid);
$comment_controller=new CommentController();
$comment=$comment_controller->getAllComments($cid);
if(isset($_POST['submit'])){
	$comment=trim($_POST['comment']);
	if (strlen($comment) > 0 && $comment !== str_repeat(' ', strlen($comment))){
		$update_comment=$comment_controller->addNewComment($comment,$user_id,$book['id']);
		$comment=$comment_controller->getAllComments($cid);
	}
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
			href="BookDetail.css"
		/>
		<!-- <link
			rel="stylesheet"
			href="style.css"
		/> -->
		<style>
			/* Custom CSS styles */
			body {
				font-family: Arial, sans-serif;
			}

			/* .container {
				background-color: #fff;
				padding: 20px;
				border-radius: 5px;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			} */
		</style>
	</head>
	<body>
		<!-- Navigation bar -->
		<?php 
	include_once "nav.php";
	?>
		<div class="container">
			<div class="book-card">
				<div class="bookmark-icon">
					<i class="fa-regular fa-bookmark"></i>
				</div>

				<div class="book-info">
				<h3 class="book-title"><?php echo $book['name'] ?></h3>
					<div class="book-image">
						<img
							src="../image/photos/<?php echo $book['image'] ?>"
							alt="<?php echo $book['name'] ?>"
						/>
					</div>
					<p class="book-author"><?php echo $book['auther_name'] ?></p>
					<span class="current-rating">4.5</span>

					<p class="book-description">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium
						temporibus et voluptate id. Nobis, dicta! Doloribus, illum dolore
						facere, numquam molestiae perferendis officiis sit ipsa possimus ea
						consequatur nihil a. Lorem ipsum dolor sit amet, consectetur
						adipisicing elit. Laudantium temporibus et voluptate id. Nobis,
						dicta! Doloribus, illum dolore facere, numquam molestiae perferendis
						officiis sit ipsa possimus ea consequatur nihil a. Lorem ipsum dolor
						sit amet, consectetur adipisicing elit. Laudantium temporibus et
						voluptate id. Nobis, dicta! Doloribus, illum dolore facere, numquam
						molestiae perferendis officiis sit ipsa possimus ea consequatur
						nihil a. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
						Laudantium temporibus et voluptate id. Nobis, dicta! Doloribus,
						illum dolore facere, numquam molestiae perferendis officiis sit ipsa
						possimus ea consequatur nihil a.
					</p>
					<a class="read-more-btn">...See More</a>

					<div class="actions">
						<div class="bottom-icons">
							<div class="rating " id=<?php $book['id'] ?>>
								<span class="star"></span>
								<span class="star"></span>
								<span class="star"></span>
								<span class="star"></span>
								<span class="star"></span>
							</div>
							<div class="download-icon btn btn-primary">
								DownLoad
								<i class="fas fa-download"></i>
							</div>
						</div>
					</div>

					<div class="who-viewed">
						<img
							src="avatar1.jpg"
							alt="Avatar 1"
							class="avatar"
						/>
						<img
							src="avatar2.jpg"
							alt="Avatar 2"
							class="avatar"
						/>
						<span class="view-count">+3</span>
					</div>
				</div>
			</div>

			<!-- Comment Session -->
			<div class="comments">
				<h4>Comments</h4>
				<ul class="comment-list">
					<?php
					foreach ($comment as $com) {
					?>
					<li class="comment">
						<div class="comment-avatar">
							<img
								src="../image/photos/<?php echo $com['image'] ?>"
								alt="<?php echo $com['name'] ?>"
							/>
						</div>
						<div class="comment-content">
							<p class="comment-text"><?php echo $com['comment'] ?></p>
							<span class="comment-meta">- <?php echo $com['name'] ?></span>
						</div>
					</li>
					<?php
					}
					?>
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

				<form class="comment-form" method='post'>
					<textarea
						class="form-control"
						placeholder="Add a comment" name="comment"
					></textarea>
					<button class="btn btn-primary" name="submit">Submit</button>
				</form>
			</div>
		</div>

		<!-- footer -->
		<footer class="footer">
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
										>Went List</a
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
										>Went List</a
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
		<script src="BookDetail.js"></script>
	</body>
</html>
