<?php
include_once 'controller/bookController.php';

$id=$_POST['id'];
$book_controller=new BookController();
echo $book_controller->deleteBook($id);
?>