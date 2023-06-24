<?php
session_start();
include_once "../controllers/registercontroller.php";
include_once "../neon/controller/bookController.php";
include_once "../neon/controller/categoryController.php";
include_once('latestBook.php');

$getUserData = new RegisterController();
$getUserinfo = $getUserData->getUserList();

$getAllCategory = new CategoryController();
$getCategory = $getAllCategory->getAllCategory();

$getAllBook = new BookController();

foreach ($getCategory as $category) {
    //var_dump($category);
}

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
}


$getAllBookList = [];

if (isset($_POST['searchbyuser'])) {
    $bookname = $_POST['bookname'];
    // if(isset($_POST['categoryName'])){


    // }

    $categoryName = $_POST['categoryName'];
    if ($categoryName == "All") {
        $getAllBookList = $getAllBook->getSearchBooks($bookname);
    }
    if ($categoryName != "All") {
        $getAllBookList = $getAllBook->searchBooks($bookname, $categoryName);
    }
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
        <form action="" method="post">
            <div class="row my-3">
                <div class="col-md-4">
                    <select class="form-control filter-select" name="categoryName" id="filter_category">
                        <option value="All" id="something">All</option>
                        <?php foreach ($getCategory as $category) {
                            ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="bookname" id="booksearch"
                            placeholder="Search..." />
                        <div class="input-group-append">
                            <button class="btn btn-primary" name="searchbyuser" id="search">
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Search Bar -->





        <!-- Books -->
        <div class="container mt-4">
            <div class="row">
                <!-- <div class=""> -->
                <div class="col-md-12 d-flex justify-content-evenly" id="filterbook">

                </div>
                <!-- </div> -->

            </div>
            <div class="row">

                <div class="col-md-12 d-flex justify-content-evenly" <?php if (!isset($_POST['searchbyuser']) || empty($_POST['searchbyuser'])) {
                    echo 'style="display: none;"';
                } else {
                    echo 'style="display: flex;"';
                } ?>>
                    <?php foreach ($getAllBookList as $BookList) {
                        ?>
                        <div class="col-md-3 usersearch_book">
                            <div class="card  sm-4 mb-3" width="100%" height="400px">
                                <img src="../image/photos/<?php echo $BookList['image'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $BookList['name'] ?>
                                    </h5>
                                    <p class="card-text">
                                        <?php echo $BookList['preview'] ?>
                                    </p>
                                    <p class="card-text">
                                        <?php echo $BookList['date'] ?>
                                    </p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
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
        <script src="../js/index.js"></script>
</body>

</html>