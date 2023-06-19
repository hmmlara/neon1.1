<?php
include_once __DIR__."/../vendor/db.php";
class author{
    private $connection="";
    public function getAllAuthor(){
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql="select * from auther limit 4";
        $statement=$this->connection->prepare($sql);

        //3.execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function searchAuthor($usersearch)
    {
        echo "something";
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql Statement
        $sql = "SELECT * FROM auther WHERE name LIKE '%" . $usersearch . "%'" ;
        $statement=$this->connection->prepare($sql);

        //$statement->bindParam(":mydata",$usersearch);

        //3.execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getMoreAuthor($offset, $limit)
    {
        //1.DataBase Connect
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM auther LIMIT $limit OFFSET $offset";
        $result =$statement=$this->connection->prepare($sql);

        // Execute the query and fetch the results
        //$result = mysqli_query($your_db_connection, $query);
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

        //$authors = array();

        // Loop through the query results and build the authors array
        // while ($row = mysqli_fetch_assoc($result)) {
        //     $author = array(
        //         'name' => $row['name'],
        //         'image' => $row['image'],
        //         // Add more author data fields as needed
        //     );

            //$authors[] = $author;
        //}

        // Return the authors array
        //return $authors;
    }
}

?>