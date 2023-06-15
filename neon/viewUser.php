<?php

include_once "layouts/sidebar.php";
include_once "controller/userController.php";
$cid=$_GET['id'];
$user_controller=new UserController();
$user=$user_controller->getUser($cid);

?>



<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
        <div class="card col-md">
            <div class="card-body">
            <div class="row">
                    
                    <label for="" class="form-label">id:<strong><?php echo $user['id'] ?></strong></label>
                
            </div>
                <div class="row">
                    
                        <label for="" class="form-label">User Name:<strong><?php echo $user['name'] ?></strong></label>
                    
                </div>
                <div class="row">
                    
                        <label for="" class="form-label">Email:<strong><?php echo $user['email'] ?></strong></label>
                    
                </div>
                <div class="row">
                    
                        <label for="" class="form-label">Password:<strong><?php echo $user['password'] ?></strong></label>
                    
                </div>
            </div>
        </div>
        <div>
            <a href="user.php" class="btn btn-success">Back to Users</a>
        </div>
	</div>
</main>

<?php

include_once "layouts/footer.php"

?>