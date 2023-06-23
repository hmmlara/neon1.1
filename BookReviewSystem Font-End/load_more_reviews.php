<?php 
include_once "../controllers/reviewsController.php";
include_once "../models/reviews.php";
$review_controller = new Reviews_Controller();

$result = $review_controller->Get_Post(5,5);
echo json_encode($result);