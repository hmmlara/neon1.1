<?php
include_once __DIR__ . "/../vendor/db.php";
class Reviews
{
    private $connection = "";
    function __construct()
    {
        $this->connection = Database::connect();
    }

    function upload_review($userId, $content, $BookList)
    {
        $sql = "SELECT id
        FROM user_review
        ORDER BY id DESC
        LIMIT 1;";
        $LastIndex_statement = $this->connection->prepare($sql);
        $LastIndex_statement->execute();
        $LastIndex = $LastIndex_statement->fetch(PDO::FETCH_ASSOC);
        $UserReview_id = $LastIndex['id'] + 2;

        $insert_to_userReview_sql = "INSERT INTO `user_review`(`id`, `user_id`, `content`) VALUES (:id,:userId,:content)";
        $insert_to_userReview_statement = $this->connection->prepare($insert_to_userReview_sql);
        $insert_to_userReview_statement->bindParam(":id", $UserReview_id);
        $insert_to_userReview_statement->bindParam(":userId", $userId);
        $insert_to_userReview_statement->bindParam(":content", $content);
        if (
            $insert_to_userReview_statement->execute()
        ) {
            foreach ($BookList as $Book) {
                $sql = "INSERT INTO `review_book`( `user_review_id`, `book_id`) VALUES (:userReviewId,:BookId)";
                $statement = $this->connection->prepare($sql);
                $statement->bindParam(":userReviewId", $UserReview_id);
                $statement->bindParam(":BookId", $Book);
                $statement->execute();
            }
            return true;
        }
        else{
            return false;
        }

   

    }
    function get_all_review()
    {
        $sql = "SELECT * FROM `user_review`";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    function get_review_book($review_id)
    {
        $sql = "SELECT * FROM `review_book` WHERE `user_review_id`=:id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":id", $review_id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function get_bookinfo_by_id($id)
    {
        $sql = "SELECT * FROM `book` WHERE `id` = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function get_userinfo_by_id($id)
    {
        $sql = "SELECT * FROM `user` WHERE `id` = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function get_author_by_id($id)
    {
        $sql = "SELECT * FROM `auther` WHERE `id` = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function get_review_by_userId($id)
    {
        $sql = "SELECT * FROM `user_review` WHERE `user_id` = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}


?>