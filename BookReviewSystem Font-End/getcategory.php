<?php
include_once "../neon/controller/categoryController.php";

$getSelectCategory=new CategoryController();
$value=$_POST['value'];
$getCategory=$getSelectCategory->getUserSelectCategory($value);
//echo $getCategory;

echo json_encode($getCategory);

?>