<?php
session_start();
include_once "controllers/registercontroller.php";

$register_controller = new RegisterController();
$getUserList = $register_controller->getUserList();

if (isset($_POST['register'])) {
    $error_status = false;

    // create user_name
    if (isset($_POST['user_name'])) {
        $user_name = $_POST['user_name'];
    } else {
        $error_status = true;
        $error_name = "Please Enter Your Name";
    }

    // create user_email
    if (isset($_POST['user_email'])) {
        $user_email = $_POST['user_email'];
        // echo $user_email;
    } else {
        $error_status = true;
        $error_email = "Please Enter Your Email";
    }

    // create user_password
    if (isset($_POST['user_password1'])) {
        $user_password1 = $_POST['user_password1'];
    } else {
        $error_status = true;
        $error_password1 = "Please Enter Your Password";
    }

    if (isset($_POST['user_password2'])) {
        $user_password2 = $_POST['user_password2'];
    } else {
        $error_status = true;
        $error_password2 = "Please Enter Your Password";
    }

    if ($user_password1 == $user_password2) {
        $user_password = $_POST['user_password1'];
    } else {
        echo "wrong Password";
    }

    $_SESSION['user_email'] = $user_email;
    $_SESSION['user_password'] = $user_password;
    if (isset($_SESSION['user_email'])) {
        header("location:BookReviewSystem Font-End/index.php");
    }
    echo "something";
    if ($error_status == false) {
        // checkAlreadyExit Or Not
        $accountExists = false;

        foreach ($getUserList as $user) {
            if ($user['email'] == $user_email) {
                $accountExists = true;
                break;
            }
        }

        if ($accountExists) {
            echo "Your Account Already Exists";
        } else {
            $register_controller->registerUser($user_name, $user_email, $user_password);
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action=" " method="post">
            <!-- <div class="row">
                <div class="col-md-5">
                <div class="col-md-12">
                        <label for="" class="form-control">Name</label>
                        <input type="text" name="user_name" class="form-control" id="">
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-control">Email</label>
                        <input type="text" name="user_email" class="form-control" id="">
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-control">Password</label>
                        <input type="password" name="user_password" class="form-control" id="">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary" name="register">Register</button>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                        <div class="card-img-left d-none d-md-flex">
                            <!-- Background image for card set in CSS! -->
                        </div>
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>


                            <div class="form-floating mb-3">
                                <input type="text" name="user_name" class="form-control" id="floatingInputUsername"
                                    placeholder="myusername" required autofocus>
                                <label for="floatingInputUsername">Username</label>
                                <span></span>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" name="user_email" class="form-control" id="floatingInputEmail"
                                    placeholder="name@example.com">
                                <label for="floatingInputEmail">Email address</label>
                            </div>

                            <hr>

                            <div class="form-floating mb-3">
                                <input type="password" name="user_password1" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Create Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="user_password2" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Re_Enter Password</label>
                            </div>

                            <!-- <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm Password">
                            <label for="floatingPasswordConfirm">Confirm Password</label>
                        </div> -->

                            <div class="d-grid mb-2">
                                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit"
                                    name="register">Register</button>
                            </div>

                            <a class="d-block text-center mt-2 small" href="login.php">Have an account? Sign In</a>

                            <hr class="my-4">

                            <!-- <div class="d-grid mb-2">
                            <button class="btn btn-lg btn-google btn-login fw-bold text-uppercase" type="submit">
                            <i class="fab fa-google me-2"></i> Sign up with Google
                            </button>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-lg btn-facebook btn-login fw-bold text-uppercase" type="submit">
                            <i class="fab fa-facebook-f me-2"></i> Sign up with Facebook
                            </button>
                        </div> -->


                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>