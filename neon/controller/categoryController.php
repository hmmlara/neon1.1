<?php
include_once __DIR__."/../models/category.php";
class CategoryController extends Category{
    public function getAllCategory(){
        return $this->getCategoryList();
    }
    // public function addNewAuther($name,$profile){
    //     return $this->createNewAuther($name,$profile);
    // }
    // public function getAuther($id){
    //     return $this->getAutherInfo($id);
    // }
    // public function updateAuther($cid,$name,$profile){
    //     return $this->updateAutherInfo($cid,$name,$profile);
    // }
    // public function deleteAuther($id){
    //     return $this->deleteAutherInfo($id);
    // }
}

?>