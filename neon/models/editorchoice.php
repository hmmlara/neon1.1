<?php
include_once __DIR__ . "/../vendor/db.php";
class Editor
{
    public $connection = "";
    // function __construct()
    // {
    //     $this->connection = Database1::connect();
    // }
    public function gnereFliter($id)
    {
        //1.DB connection
        $this->connection = Database1::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT book.name AS book_name, auther.name AS author_name, book.date
        FROM editor_choice 
        JOIN book ON editor_choice.book_id = book.id
        JOIN book_category ON book.id = book_category.book_id
        LEFT JOIN auther ON book.auther_id = auther.id
        WHERE book_category.category_id = $id;";
        $statement = $this->connection->prepare($sql);

        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>