<?php
session_start();
include_once "../controllers/registercontroller.php";
include_once('latestBook.php');
$getUserData = new RegisterController();
$getUserinfo = $getUserData->getUserList();
foreach ($getUserinfo as $getUser) {
    //var_dump($getUser) ;
}
if (!isset($_SESSION['user_email'])) {
    header("location:../login.php");
} 
if ($_SESSION["user_email"] == $getUser['email']) {
    $userimg = $getUser['image'];
    $username = $getUser['name'];
    $userbio = $getUser['bio'];
    $useremail = $getUser['email'];
    echo $userimg;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Review System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
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
                <input type="text" class="form-control" placeholder="Search..." />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
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
    </div>




    <!-- Books -->
    <div class="container mt-4">
        <div class="book-card-list">
            <!-- <h2 class="ms-2 float-left">Books</h2> -->

            <div class="view-options  ">
                <button class="view-option-btn active" data-update="list">
                    Lastest Update
                </button>
                <button class="view-option-btn" data-radom="grid">
                    Content at redom
                </button>
            </div>
            <div class="book-card-grid">
                <?php
                foreach ($book_list as $book) {
                    ?>
                    <div class="book-card">
                        <div class="book-card-image">
                            <img src="../image/photos/<?php echo $book['image'] ?>" alt="<?php echo $book['name'] ?>" />
                            <div class="book-card-overlay">
                                <a href="BookDetail.php?id=<?php echo $book['id'] ?>" class="book-card-button">Read More</a>
                            </div>
                        </div>
                        <div class="book-card-info">
                            <h3 class="book-card-title">
                                <?php echo $book['name'] ?>
                            </h3>
                            <p class="book-card-author">
                                <?php echo $book['auther_name'] ?>
                            </p>
                            <p class="book-card-genre">
                                <?php echo $book['category_name'] ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
                ?>

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
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.esm.browser.min.js'

        const swiper = new Swiper('.swiper', {
            slidesPerView: '3',
            spaceBetween: 20,
            autoplay: {
                delay: 5000,
            },
            breakpoints: {
                // when window width is >= 320px
                480: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                // when window width is >= 480px
                740: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                1040: {
                    slidesPerView: 4,
                    spaceBetween: 40
                }
            }

        });		</script>
    <script src="app.js"></script>
</body>

</html>