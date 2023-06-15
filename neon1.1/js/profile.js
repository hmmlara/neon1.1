$(document).ready(function(){
    $(".editProfile").on('click',function(e){
        e.preventDefault();
        console.log("Hello");
        $('.round').removeClass('d-none');
        $('.cancel-button').removeClass('d-none');
        $('.editProfile').addClass('d-none');
        $('.logout').addClass('d-none');
        $('.save').removeClass('d-none');
        $('.cancel').removeClass('d-none');
        $('.username').addClass('d-none');
        $('.usereditname').removeClass('d-none');
        $('.profile-bio').addClass('d-none');
        $('.usereditbio').removeClass('d-none');

    })
    $(".cancel").on("click",function(){
        $('.cancel-button').addClass('d-none');
        $('.round').addClass('d-none');
        $('.save').addClass('d-none');
        $('.cancel').addClass('d-none');
        $('.editProfile').removeClass('d-none');
        $('.logout').removeClass('d-none');
    })

    let input = document.getElementById('input');
      let img =document.getElementsByClassName('img')
      $('#input').on('change',function(){
        img.src = URL.createObjectURL(input.files[0]);
        $('.cross').removeClass('d-none');
      })
      $(".camera").click(function() {
        $("input[name='image']").click();
    });
        
    // $(".save").on('click',function(e){
    //   e.preventDefault();
    // })

    $("input[name='image']").change(function() {
      var file = this.files[0];
      var reader = new FileReader();
  
      reader.onload = function(e) {
        $('.img').attr('src', e.target.result);
      }
      reader.readAsDataURL(file);
    });

    $(".cancel-button").on("click",function(){
        $('.img').attr('src', '../image/nurse.jpg');
        $('.cross').addClass('d-none');
      }) 
    // $(document).on("click",".editProfile",function(e){
    //     e.preventDefault();
    //     $(".profile-edit").remove();
    //     $(".profile-header").append(`
    //     <div class="profile-edit d-flex justify-content-center">
	// 		<img src="../image/<?php echo $userimg; ?>" class="img" alt="" />
	// 	</div>
	// 	<h1 class="profile-name"><?php echo $username ?></h1>
	// 	<p class="profile-bio">Book Lover | Writer | Dreamer</p>
        
    
    //     `)
    //     })
})