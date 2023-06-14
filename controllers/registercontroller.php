<?php
include_once __DIR__."/../models/register.php";
class RegisterController extends CreateUser{

    //getUserList
    public function getUserList()
    {
        return $this->getAllUser();
    }
    
    //RegisterUser
    public function registerUser($user_name,$user_email,$user_password)
    {
        return $this->createUserAccount($user_name,$user_email,$user_password);
    }
}


?>