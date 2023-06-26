<?php 
include_once "layouts/sidebar.php";
include_once "../neon/controller/bookController.php";
include_once "../neon/controller/categoryController.php";
//include_once "../neon/controller/editorController.php";

$getAllCategory = new CategoryController();
$getCategory = $getAllCategory->getAllCategory();

//$genereAll=new editorController();
//$genere=$genereAll->genreSingleFilter($id);

?>
<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex">
            <div class="col-md-3">
                <select name="" id="genere_fliter" class="form-select">
                    <option value="All">All</option>
                    <?php foreach($getCategory as $allcategory){ ?>
                        <option value="<?php echo  $allcategory['id'] ?>"><?php echo $allcategory['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 mx-3">
                <a href="../neon/addeditorchoice.php?id=<?php  echo $allcategory['id']; ?>" class="btn btn-info">Add New</a>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <table class="table">
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
                       
                    </tbody>
                </table>
            </form>

        </div>

    </div>
    
</div>

<?php

include_once "layouts/footer.php";

?>

<script src="../neon/js/adminindex.js"></script>