<?php
include_once __DIR__."/../models/reviews.php";
class Reviews_Controller extends Reviews{
    function Get_Post($limit,$offset){
        $ReviewsContent = $this->get_review_with_limit_offset($limit,$offset);
        $result = [];
        foreach($ReviewsContent as $Review){
            $total_likes = $this->get_review_reacts($Review["id"]);
            $ReviewUser = $this->get_userinfo_by_id($Review['user_id']);
            $ReviewBooks = $this->get_review_book($Review['id']);
            $BookList = [];
            foreach($ReviewBooks as $BookId){
                $bookInfo = $this->get_bookinfo_by_id($BookId['book_id']);
                $authorInfo = $this->get_author_by_id($bookInfo['auther_id']);
                unset($bookInfo["auther_id"]);
                $authorInfoArr = array("auther"=>$authorInfo['name']);
                $bookInfo+= $authorInfoArr;
                // echo "<pre>";
                // var_dump($authorInfo);
                // echo "</pre>";

                $BookList[] = $bookInfo;
            }
            $Books_arr = array("Books"=>$BookList);
            $Review+= $Books_arr;
            $Review+= $ReviewUser;

            $Review+= $total_likes;
            $result[] = $Review;
        }
        return $result;
    }
}
?>