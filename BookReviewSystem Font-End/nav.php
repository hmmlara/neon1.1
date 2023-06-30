<!-- Navigation bar -->
<nav style="width:100%;top :0px;z-index:99;box-shadow:0px 5px 40px #1111" class="navbar position-fixed navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand-logo" href="#">
            <img src="logo.png" style="width: 170px; height: 80px" alt="Book Review System Logo" />
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse d-flex justify-content-center navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"><i class="fa-solid fa-house-chimney mx-2"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="Books.php"><i class="fa-solid fa-book mx-2"></i>Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="AuthorPage.php"><i class="fa-solid fa-feather mx-2"></i>Author</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Review.php"><i class="fa-solid fa-message mx-2"></i>Reviews</a>
                </li>

                <li class="nav-item hide-in-large">
                    <a class="nav-link" href="Profile.php">Profile</a>
                </li>
               
            </ul>
        </div>
        <li class="nav-item d-flex justify-content-center account">
                    <a href="Profile.php">
                        <div class="avatar">
                            <img src="../image/<?php if (empty($userimg)) {
                                echo "nurse.jpg";
                            } else {
                                echo $userimg;
                            } ?>" alt="User Avatar" />
                        </div>
                    </a>

                </li>
    </nav>
    <div style="width: 100%;height: 100px;">
        Nav
    </div>