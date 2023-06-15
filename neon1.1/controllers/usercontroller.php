<?php 
include_once __DIR__."/../models/Users.php";
class UserController extends Users{

    //update or edit userINfo
    public function updateUserInfo($editusername,$useremail,$edituserbio,$filename)
    {
        return $this->updateUser($editusername,$useremail,$edituserbio,$filename);
    }
}

?>