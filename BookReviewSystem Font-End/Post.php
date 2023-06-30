<?php
session_start();
include_once "../controllers/registercontroller.php";
include_once "../neon/controller/bookController.php";
include_once "../neon/controller/categoryController.php";
include_once('latestBook.php');
include_once "../models/reviews.php";

$review_model = new Reviews();


$getUserData = new RegisterController();
$getUserinfo = $getUserData->getUserList();

$getAllCategory = new CategoryController();
$getCategory = $getAllCategory->getAllCategory();

$getAllBook = new BookController();
$getmainAllBook=$getAllBook->getMainBooks();
//var_dump($getmainAllBook);

foreach ($getCategory as $category) {
    //var_dump($category);
}

foreach ($getUserinfo as $getUser) {
    //var_dump($getUser) ;
    if ($_SESSION["user_email"] == $getUser['email']) {
        $userimg = $getUser['image'];
        $username = $getUser['name'];
        $userbio = $getUser['bio'];
        $useremail = $getUser['email'];
    }
}
if (!isset($_SESSION['user_email'])) {
    header("location:../login.php");
}





$error_status=false;
if (isset($_POST['searchbyuser'])) {
    $bookname = $_POST['book_name'];
        $getAllBookList = $getAllBook->getSearchBooks($bookname);
        var_dump($getAllBookList);
       
        if(empty($getAllBookList)){
            $error_status=true;
          
        }else{
            $error_status=false;
            
        }
    
}
?>
<?php
include_once "../models/reviews.php";
include_once "../models/register.php";
include_once "../neon/models/book.php";
include_once "../controllers/registercontroller.php";
include_once('latestBook.php');

$userEmail = $_SESSION['user_email'];
$reviews_model = new Reviews();
$register_model = new CreateUser();
$book_model = new Book();

$userId = $register_model->getUserId($userEmail);
if (isset($_SESSION['bookList']) && isset($_GET['id'])) {
    $ReviewBookList_id = $_SESSION['bookList'];
    if(    !in_array((int)$_GET['id'],$ReviewBookList_id)
    ){
        $ReviewBookList_id[] = (int) $_GET['id'];

    }
    $_SESSION['bookList'] = $ReviewBookList_id;
} else if (isset($_SESSION['bookList']) && isset($_GET['del'])) {
    $ReviewBookList_id = $_SESSION['bookList'];
    unset($ReviewBookList_id[$_GET['del']]);
    $_SESSION['bookList'] = $ReviewBookList_id;
} else {
    $_SESSION['bookList'] = [];
}
if (isset($_POST['review-content'])) {
    $_SESSION["content"] = $_POST["review-content"];
}
if (isset($_POST['submit']) && isset($_POST['review-content']) && count($ReviewBookList_id) != 0) {
    if (
        $reviews_model->upload_review($userId[0]['id'], $_SESSION['content'], $ReviewBookList_id)
    ) {
        header("location:Review.php");
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
    <link rel="stylesheet" href="Post.css" />
    <link rel="stylesheet" href="Review.css">
</head>

<body>
    <!-- Navigation bar -->
    <?php
    include_once "nav.php";
    ?>

    <div class="container mt-4">
        <h1>Upload Review</h1>
        <form id="upload-form" method="Post" action="Post.php">
            <div class="form-group">
                <label for="review-content">Review</label>
                <textarea id="review-content" name="review-content" rows="8" required>
                    </textarea>
            </div>
            <div class="container">
                <div class="d-flex flex-wrap">
                    <?php
                    if (isset($ReviewBookList_id)) {
                        foreach ($ReviewBookList_id as $key => $ReviewBook_id) {
                            $book = $book_model->getBookInfo($ReviewBook_id);

                            ?>
                            <a href="Post.php?del=<?php echo $key ?>">
                                <div class="book-details">
                                    <img src="../image/photos/<?php echo $book[0]["image"] ?>" alt="<?php echo $book[0]["image"] ?>" />
                                    <div class="book-info">
                                        <h2>
                                            <?php echo $book[0]["name"] ?>
                                        </h2>
                                      
                                        <p>by
                                            <?php echo $book[0]["auther_name"] ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <?php
                        }
                    } else {
                        echo "<h1>Please Choice Books</h1>";
                    }
                    ?>
                </div>
            </div>
            <div class="container mt-4">
                <div class="book-card-list">
                    <form action="" method="post">
                            <div class="search-bar">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="book_name" placeholder="Search..." />
                                    <div class="input-group-append">
                                        <button class="btn btn-primary"  class="searchbook" name="searchbyuser">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </div>


                    </form>
                    <!-- Search Bar -->
                    
                    <div class="book-card-grid">
                    <?php
                    if ($error_status==false) {
                    //     echo "No books found.";
                    // } else {
                        if (!empty($getAllBookList)) {
                            foreach ($getAllBookList as $book) {
                                ?>
                                <div class="book-card">
                                <div class="book-card-image">
                                    <img src="../image/photos/<?php echo $book['image'] ?>"
                                        alt="<?php echo $book['name'] ?>" />
                                    <div class="book-card-overlay">
                                        <a href="Post.php?id=<?php echo $book['id'] ?>" class="book-card-button">Add
                                            Book</a>
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

                                        <?php
                                        if(isset($book['category_name'])){
                                            echo $book['category_name'] ;

                                        }
                                         ?>
                                    </p>
                                </div>
                            </div>
                                <!-- <div class="col-md-3 usersearch_book">
                                    <div class="card sm-4 mb-3" width="100%" height="400px">
                                        <img src="../image/photos/<?php echo $book['image']; ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?php echo $book['name']; ?>
                                            </h5>
                                            <p class="card-text">
                                                <?php echo $book['preview']; ?>
                                            </p>
                                            <p class="card-text">
                                                <?php echo $book['date']; ?>
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div> -->
                            <?php }
                        }
                    } ?>

                        <?php

                        foreach ($book_list as $book) {
                            ?>
                            <div class="book-card">
                                <div class="book-card-image">
                                    <img src="../image/photos/<?php echo $book['image'] ?>"
                                        alt="<?php echo $book['name'] ?>" />
                                    <div class="book-card-overlay">
                                        <a href="Post.php?id=<?php echo $book['id'] ?>" class="book-card-button">Add
                                            Book</a>
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

                                        <?php
                                        if(isset($book['category_name'])){
                                            echo $book['category_name'] ;

                                        }
                                         ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                    <div class="mt-4" style="display: flex; justify-content: center; width: 100%">
                        <a href="" class="btn btn-primary m-auto">Load More</a>
                    </div>
                </div>
            </div>

            <button type="submit" name="sub" class="mt-4">Upload</button>
        </form>
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
    <script src="Post.js"></script>
    <script src="../js/index.js"></script>

</body>

</html>