<?php
session_start();
include_once "../controllers/registercontroller.php";
include_once "../controllers/authorController.php";

$getUserData=new RegisterController();
$getUserinfo=$getUserData->getUserList();

$getAllAuthorInfo=new authorController();
$getAllAuthor=$getAllAuthorInfo->getAllAuthorInfo();
//var_dump($getAllAuthor);


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
		//echo $userimg;
	}

	if(isset($_POST['search']))
	{
		$usersearch=$_POST['usersearch'];
		$searchAuthor=$getAllAuthorInfo->searchAuthorInfo($usersearch);
		//$getAllAuthor=$searchAuthor;
		 //var_dump($searchAuthor);
		 foreach ($searchAuthor as  $someauthor) {
			var_dump($someauthor);
		}
		 if(sizeof($searchAuthor)==0)
		 {
			$searchAuthor=[];
		 }
		
		// echo $usersearch;
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
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a
				class="navbar-brand-logo"
				href="index.php"
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

					<li class="nav-item active">
						<a
							class="nav-link"
							href="AuthorPage.php"
							>Author</a
						>
					</li>
					<li class="nav-item">
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
									src="../image/<?php if(empty($userimg)){echo "nurse.jpg";}else{echo $userimg;}  ?>"
									alt="User Avatar"
								/>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- Rest of the Book Review System content -->
		<div class="container mt-4">
			<!-- Filter Component -->
			<form action="" method="post">
				
				<div class="row">
						<div class="col-md-12">
							<div class="search-bar">
								<div class="input-group">
									<input	type="text"	class="form-control" placeholder="Search..." name="usersearch" value="<?php if(isset($usersearch)){echo $usersearch;} ?>"/>
									<div class="input-group-append">
										<button class="btn btn-primary" id="usersearchauthor"  style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;" name="search">
											Search
										</button>
									</div>
									<div class="col-md-1">
										<button class="btn btn-info">Clear</button>
									</div>
								</div>
							</div>
						</div>
				</div>
			</form>
			
				<div class="row col-md-12 authors allauthors" id="authorContainer"
				<?php if(!isset($_POST['search']) || empty($_POST['usersearch'])  === 0) { echo 'style="display: flex;"'; } else { echo 'style="display: none;"'; } ?>>
					
					<?php
					foreach ($getAllAuthor as $key => $author) {
					?>
					<div class="col-md-3 sm-4 mb-3 originalauthors">
						<div class="card-parent">
							<div class="author-card">
							<img class="author-image card-img-top" src="../image/<?php echo $author['image'] ?>" alt="Author Image">
							<h2 class="author-name"><?php echo $author['name'] ?></h2>
							<p class="author-bio">Author Bio</p>
							<a class="author-website" href="AuthorDetail.php?id=<?php echo $author['id'] ?>" target="_blank">Author's Books</a>
							</div>
						</div>
					</div>
					<?php
					}
					?>
				</div>
				<div class="row col-md-12 authors" id="usersearchauthorname"
				 <?php if(isset($_POST['search']) && !empty($_POST['usersearch'])) { echo 'style="display: flex;"'; } else { echo 'style="display: none;"'; } ?>>
					<?php
					foreach ($searchAuthor as $key => $someauthor) {
					?>
					<div class="col-md-3 sm-4 mb-3">
						<div class="card-parent">
							<div class="author-card">
							<img class="author-image card-img-top" src="../image/<?php echo $someauthor['image'] ?>" >
							<h2 class="author-name"><?php echo $someauthor['name'] ?></h2>
							<p class="author-bio">Author Bio</p>
							<a class="author-website" href="AuthorDetail.php" target="_blank">Author's Books</a>
							</div>
						</div>
					</div>
					<?php
					}
					?>
				</div>
				<?php if(!isset($_POST['search'])){ ?>
					<div class="mt-4" style="display: flex;justify-content: center; width: 100%;">
						<button type="" class="btn btn-primary m-auto " name="loadmore" id="loadMoreBtn">Load More</button>
					</div>
			<?php }?>
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
		<script src="../js/author.js"></script>
	</body>
</html>
