<?php
include_once __DIR__."/../models/editorchoice.php";

class EditorController extends Editor{
    public function genreSingleFilter($id){
        return $this->gnereFliter($id);
    }
}




?>