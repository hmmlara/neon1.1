<?php
include_once "../neon/controller/categoryController.php";
include_once "../models/reviews.php";

$review_model = new Reviews();
$getSelectCategory=new CategoryController();
//$value=$_POST['value'];
$getCategory=$getSelectCategory->getUserSelectCategory(1);
var_dump($getCategory);
//echo $getCategory;

//echo json_encode($getCategory);

?>