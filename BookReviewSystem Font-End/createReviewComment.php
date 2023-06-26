<?php 
include_once "../controllers/reviewsController.php";
include_once "../models/reviews.php";
include_once __DIR__."/../models/register.php";

session_start();
$register_model = new CreateUser();
$userId = $register_model->getUserId($_SESSION['user_email']);
if(isset($_POST['review'])){
    return $reviews_model->create_comment($_POST['review'],$userId[0]['id']);
}
?>