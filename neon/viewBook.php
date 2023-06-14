<?php

include_once "layouts/sidebar.php";
include_once "controller/BookController.php";
$cid=$_GET['id'];
$book_controller=new BookController();
$book=$book_controller->getBook($cid);
echo $cid;
?>



<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

        <div class="card" style="width: 18rem;">
                <img src="img/photos/<?php echo $book['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                        <h3 class="card-tit"><strong><?php echo $book['name'] ?></strong></h1>
                        <h4 class="card-title"><strong><?php echo $book['category_name'] ?></h3>
                        <h4 class="card-title"><strong><?php echo $book['auther_name'] ?></h3>
                        <button class="btn btn-primary open" id="<?php  echo $cid ?>">Read</button>
                        <button class="btn btn-primary comment" id="<?php  echo $cid ?>">Comment</button>
                        
                </div>
        </div>
        <!-- <div class="card col-md">
            <div class="card-body">
            <div class="row">
                    
                    <label for="" class="form-label">id:<strong><?php echo $book['id'] ?></strong></label>
                
            </div>
                <div class="row">
                    
                        <label for="" class="form-label">Book Name:<strong><?php echo $book['name'] ?></strong></label>
                    
                </div>
                <div class="row">
                    
                        <label for="" class="form-label">Category Name:<strong><?php echo $book['category_name'] ?></strong></label>
                    
                </div>
                <div class="row">
                    
                        <label for="" class="form-label">Author Name:<strong><?php echo $book['auther_name'] ?></strong></label>
                    
                </div>
                <div class="row">
                    
                        <label for="" class="form-label">image:<strong><?php echo $book['image'] ?></strong></label>
                    
                </div>
                <div class="row">
                    
                        <label for="" class="form-label">pdf file:<strong><?php echo $book['pdf_file'] ?></strong></label>
                    
                </div>
            </div>
        </div> -->
        <div>
            <a href="book.php" class="btn btn-success">Back to Users</a>
        </div>
	</div>
</main>

<?php

include_once "layouts/footer.php"

?>