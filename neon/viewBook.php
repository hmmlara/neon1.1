<?php

include_once "layouts/sidebar.php";
include_once "controller/BookController.php";
include_once "../controllers/commentController.php";
$cid=$_GET['id'];
$book_controller=new BookController();
$book=$book_controller->getBook($cid);
$comment_controller=new CommentController();
$comment=$comment_controller->getAllComments($cid);
echo $cid;
?>



<main class="content ">
        
	<div class="container p-0">
		<!-- <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1> -->
        
                
                                <div class="col-md-3" >
                                        <div class="card" style="width: 18rem;">
                                                <img src="img/photos/<?php echo $book['image'] ?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                        <h3 class="card-tit"><strong><?php echo $book['name'] ?></strong></h1>
                                                        <h4 class="card-title"><strong><?php echo $book['category_name'] ?></h3>
                                                        <h4 class="card-title"><strong><?php echo $book['auther_name'] ?></h3>
                                                        <button class="btn btn-primary open" id="open">Read</button>
                                                
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-3" >
                                        <div class="comments" style="width: 80rem; height:500px; overflow:scroll; padding:0;">
                                                <h4 style="  position: sticky; top: 0; background-color:#E8EBF0; height: 30px; padding-left: 20px; padding-top: 5px;">Comments</h4>
                                                <ul class="comment-list">
                                                        <?php
                                                        foreach ($comment as $com) {
                                                        ?>
                                                        <li class="comment">
                                                                <div class="comment-avatar">
                                                                        <img
                                                                                src="../img/photos/<?php echo $com['image'] ?>"
                                                                                alt="<?php echo $com['name'] ?>"
                                                                        />
                                                                </div>
                                                                <div class="comment-content">
                                                                        <p class="comment-text"><?php echo $com['comment'] ?></p>
                                                                        <span class="comment-meta">- <?php echo $com['name'] ?></span>
                                                                </div>
                                                        </li>
                                                        <?php
                                                        }
                                                        ?>
                                                </ul>
                                        </div>
                                </div>
                        
                                                        
        <div class="row"  id="pdfContainer"></div>
        
        
        <div>
            <a href="book.php" class="btn btn-success">Back to Users</a>
        </div>
	</div>
        
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
      $("#open").click(function() {
        openPDF("pdf/ei_maung.pdf");
      });

//       $(".comment").click(function() {
//         // openPDF("pdf/sample.pdf");
//         console.log('comment');
//       });

    });
    function openPDF(filePath) {
        event.preventDefault();
        
      var pdfContainer = $("#pdfContainer");
      
      pdfContainer.html('<iframe src="' + filePath + '" width="100%" height="600px" ></iframe>');
    }
    
  </script>
<?php

include_once "layouts/footer.php"

?>