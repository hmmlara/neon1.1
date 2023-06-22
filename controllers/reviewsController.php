<?php
include_once __DIR__."/../models/reviews.php";
class Reviews_Controller extends Reviews{
    function Get_Post($limit,$offset){
        $ReviewsContent = $this->get_review_with_limit_offset($limit,$offset);
        $result = [];
        foreach($ReviewsContent as $Review){
            $total_likes = $this->get_review_reacts($Review["id"]);
            $comments = $this->get_review_comments($Review['id']);
            $ReviewUser = $this->get_userinfo_by_id($Review['user_id']);
            $ReviewBooks = $this->get_review_book($Review['id']);
            $BookList = [];
            foreach($ReviewBooks as $BookId){
                $bookInfo = $this->get_bookinfo_by_id($BookId['book_id']);
                $BookList[] = $bookInfo;
            }
            $Books_arr = array("Books"=>$BookList);
            $Review+= $Books_arr;
            $Review+= $ReviewUser;

            $comments_list_with_user_info = [];
            
            foreach($comments as $comment){
                $userInfo = $this->get_userinfo_by_id($comment['user_id']);
                $comment += array("user_info"=>$userInfo);
                $comments_list_with_user_info[] = $comment;
            }
            // $commentsArr = array("comments"=>$comments);
            $Review+=  array("comments"=>$comments_list_with_user_info);
            $Review+= $total_likes;
            $result[] = $Review;
        }
        return $result;
    }
}
?>