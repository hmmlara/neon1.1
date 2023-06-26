<?php
include_once "../neon/controller/bookController.php";
$getbooks=new BookController();

$offset=$_POST['offset'];
$limit=$_POST['limit'];

$getBalanceBook=$getbooks->getBalanceBook($offset,$limit);

echo json_encode($getBalanceBook);




?>