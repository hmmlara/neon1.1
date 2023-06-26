<?php
include_once "../neon/controller/editorController.php";
$id=$_POST['value'];
$genereAll=new editorController();
$genere=$genereAll->genreSingleFilter($id);

echo json_encode($genere)

?>
