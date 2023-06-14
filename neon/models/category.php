<?php
include_once __DIR__."/../vendor/db.php";
class Category{
    public function getCategoryList(){
        //1.DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2. sql statementfa
        $sql="SELECT * from category";
        $statement=$this->connection->prepare($sql);
        //3. execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    // public function createNewAuther($name,$profile){
    //     //1.DB connection
    //     $this->connection=Database::connect();
    //     $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     //2.sql statement
    //     $sql="INSERT INTO auther( name, profile) VALUES
    //     (:name,:profile)";
    //     $statement=$this->connection->prepare($sql);
    //     $statement->bindParam(":name",$name);
    //     $statement->bindParam(":profile",$profile);
    //     if($statement->execute()){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // }
    // public function getAutherInfo($id){
    //     $this->connection=Database::connect();
    //     $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //     $sql="SELECT * from auther where id=:id";
    //     $statement = $this->connection->prepare($sql);

    //     $statement->bindParam(":id",$id);

    //     $statement->execute();
    //     return $statement->fetch(PDO::FETCH_ASSOC);
    // }
    // public function updateAutherInfo($cid,$name,$profile){
    //     $this->connection=Database::connect();
    //     $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //     $sql="UPDATE auther SET  name = :name, profile = :profile WHERE id=:id;
    //     ";
    //     $statement=$this->connection->prepare($sql);
    //     $statement->bindParam(":name",$name);
    //     $statement->bindParam(":profile",$profile);
    //     $statement->bindParam(":id",$cid);
    //     if($statement->execute()){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // }
    // public function deleteAutherInfo($id){
        
    //         $this->connection = Database::connect();
    //         $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //         $sql = "delete from auther where id=:id";

    //         $statement = $this->connection->prepare($sql);
    //         $statement->bindParam(":id", $id);

    //         if($statement->execute())
    //     return "success";
    //     else
    //     return "fail";
        
    // }

}
?>