<?php
include_once __DIR__."/../vendor/db.php";

class CreateUser{
    private $connection="";
    public function createUserAccount($user_name,$user_email,$user_password)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql="INSERT INTO user(name,email,password) VALUES(:user_name,:user_email,:user_password)";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":user_name",$user_name);
        $statement->bindParam(":user_email",$user_email);
        $statement->bindParam(":user_password",$user_password);

        //3.execute
        if($statement->execute())
        {
            return true;
        }else
        {
            return false;
        }
    }

    public function getAllUser()
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql="select * from user";
        $statement=$this->connection->prepare($sql);

        //3.execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>