<?php
include_once "../neon/controller/categoryController.php";

$getSelectCategory=new CategoryController();
$value=$_POST['value'];
$getCategory=$getSelectCategory->getSelectCategory($value);

echo json_encode($getCategory);

?>