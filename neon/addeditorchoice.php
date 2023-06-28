<?php 
include_once "layouts/sidebar.php";
include_once "../neon/controller/bookController.php";
include_once "../neon/controller/editorController.php";
include_once "../neon/controller/categoryController.php";

$getAllCategory = new CategoryController();
$getCategory = $getAllCategory->getAllCategory();



$book_controller=new BookController();
$book_list=$book_controller->getAllBooks();
foreach($book_list as $book){
   // var_dump($book);
}
//echo "///////////////////////////////////////";
$filter_genere = isset($_POST["filter_genere"]) ? $_POST["filter_genere"] : "All";

$getSelectCategory=new EditorController();
$genere=$getSelectCategory->getAllEditorChoice();
// foreach($genere as $selectgene){
//    var_dump($selectgene);
// }
if(isset($_POST['check'])){
if(isset($_POST['book_id'])){
    $book_id=$_POST['book_id'];
    echo $book_id;
    $setbook=$getSelectCategory->insetBooks($book_id);
    echo '<script>window.location.href = "addeditorchoice.php";</script>';
    //exit();
}
}

if(isset($_POST['uncheck'])){
    $book_id=$_POST['book_id'];
    //echo $book_id;
    $deleteeditor=$getSelectCategory->deleteCategory($book_id);
    echo '<script>window.location.href = "addeditorchoice.php";</script>';
    
}


?>
<div class="container">
    <div class="row">
    <h1 class="h3 mb-3 mt-3"><strong>Editor Choice</strong> Dashboard</h1>

        <div class="col-md-12 d-flex">
            <!-- <div class="col-md-3 mb-3">
                <select name="filter_genere" id="genere_fliter" class="form-select">
                    <option value="All">All</option>
                    <?php foreach($getCategory as $allcategory){ ?>
                        <option value="<?php echo  $allcategory['id']; ?>"><?php echo $allcategory['name'] ?></option>
                    <?php } ?>
                </select>
            </div> -->

            
            <div class="col-md-4 mx-3 link">
                <a href="../neon/adminindex.php" class="btn btn-secondary mx-2 my-3"><i class="fa-solid fa-arrow-left"></i>   Back</a>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            
                <table class="table my-3" id="myTable" >
                <form action="" method="post">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Book Name</th>
                            <th>Auther Name</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="genere_table">
                        <?php if($filter_genere==="All"){ ?>
                            <?php foreach($book_list as $index =>$books){ ?> 
                                <?php
                            $isGenereInBook = false;
                            foreach ($genere as $selectgene) {
                                if ($selectgene['book_id'] == $books['id']) {
                                    $isGenereInBook = true;
                                    
                                }
                            }
                        ?>
                                <tr class="something" id="show">
                                    <td><?php echo $index+1 ?></td>
                                    <td><?php echo $books["name"] ?></td>
                                    <td><?php echo $books["auther_name"] ?></td>
                                    <td><?php echo $books["date"] ?></td>
                                    <td><?php if ($isGenereInBook){ ?>
                                    <button class="btn btn-danger unselete-btn" name="uncheck" data-book-id="<?php echo $books['id']; ?>"><i class="fa-solid fa-x"></i></button>
                                <?php } else { ?>
                                    <button class="btn btn-success success-btn" name="check" data-book-id="<?php echo $books['id']; ?>" ><i class="fa-solid fa-check"></i></button>
                                <?php } ?></td>
                                </tr>
                            <?php } ?>   
                        <?php } ?>   
                        <input type="hidden" name="book_id" id="selected_book_id" value="">
                    </tbody> 
                    </form>
                </table>
            

        </div>

    </div>
    
</div>

<?php

include_once "layouts/footer.php";

?>

<script src="../neon/js/adminindex.js"></script>