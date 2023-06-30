<!-- Navigation bar -->
<nav style="width:100%;top :0px;z-index:99;box-shadow:0px 5px 40px #1111" class="navbar position-fixed navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand-logo" href="#">
            <img src="logo.png" style="width: 200px; height: 100px" alt="Book Review System Logo" />
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="Books.php">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="AuthorPage.php">Author</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Review.php">Reviews</a>
                </li>

                <li class="nav-item hide-in-large">
                    <a class="nav-link" href="Profile.php">Profile</a>
                </li>
                <li class="nav-item account">
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
            </ul>
        </div>
    </nav>