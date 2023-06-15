<?php
session_start();
include_once('../controllers/ratingController');
$rating=$_POST['rating'];
$book_id=$_POST['book_id'];
$user_id=$_SESSION['userid'];
$rating_controller=new RatingController();
$rating=$rating_controller->updateRating($rating,$book_id,$user_id);

?>