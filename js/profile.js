$(document).ready(function(){
    $(".editProfile").on('click',function(e){
        e.preventDefault();
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

    $(".camera").on("click", function () {
      console.log("some");
      $("input[name='img']").click();
  });

  $("input[name='img']").on("change", function () {
      var file = this.files[0];
      var reader = new FileReader();
      reader.onloadend = function () {
          $(".img").attr("src", reader.result);
          $(".cross").removeClass("d-none");
      }
      if (file) {
          reader.readAsDataURL(file);
      }
  });


    // $(".camera").click(function() {
    //   console.log("some")
    //   $("input[name='img']").click();
    // });

    let input = document.getElementById('input');
      let img =document.getElementsByClassName('img')
      $('#input').on('change',function(){
        img.src = URL.createObjectURL(input.files[0]);
        $('.cross').removeClass('d-none');
      })
      
      $(".cancel-button").on("click",function(e){
         $('.img').attr('src','../image/nurse.jpg');
        $('.cross').addClass('d-none');
        

        })
    // $(".save").on('click',function(e){
    //   e.preventDefault();
    // })

    // $("input[name='image']").change(function() {
    //   console.log("Hello")
    //   var file = this.files[0];
    //   var reader = new FileReader();
  
    //   reader.onload = function(e) {
    //     $('.img').attr('src', e.target.result);
    //   }
    //   reader.readAsDataURL(file);
    // });

$(".save").on("click",function(){
  let img=$('#profileimg').attr('src');
  $('#profileimg').attr('src')=img;
  console.log(img);
})

    // document.getElementsByClassName('save').addEventListener('click', function() {
      
    //   img=$('.img').attr('src','../image/nurse.jpg')
    //   $.ajax({
    //     method:'post',
    //     url:'../BookReviewSystem Font-End/Profile.php',
    //     data:{img:img},
    //     success:function(response)
    //     {
    //        console.log(response)
    //     }

    // })
    // //     // e.preventDefault();
    //    }) 
    
})