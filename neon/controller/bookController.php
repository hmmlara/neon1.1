<?php
include_once __DIR__."/../models/book.php";
class BookController extends Book{
    public function getAllBooks(){
        return $this->getBookList();
    }
    public function addNewBook($name,$category,$auther,$image,$pdf,$date){
        return $this->createNewBook($name,$category,$auther,$image,$pdf,$date);
    }
    public function getBook($id){
        return $this->getBookInfo($id);
    }
    public function updateBook($cid,$name,$category,$auther,$image,$pdf,$date){
        return $this->updateBookInfo($cid,$name,$category,$auther,$image,$pdf,$date);
    }
    public function deleteBook($id){
        return $this->deleteBookInfo($id);
    }
}

?>