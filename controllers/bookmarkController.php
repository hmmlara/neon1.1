<?php
include_once __DIR__."/../models/bookmark.php";
class BookmarkController extends Bookmark{
    public function getAllBookmark($user_id){
        return $this->getAllBookmarkList($user_id);
    }

    // public function searchAuthorInfo($usersearch)
    // {
    //     return $this->searchAuthor($usersearch);
    // }

    // public function getMoreAuthors($offset, $limit)
    // {
    //     return $this->getMoreAuthor($offset, $limit);
    // }

    // public function getAllAuthorFromAuthorDetail()
    // {
    //     return $this->getAllAuthorFromDetail();
    // }
}


?>