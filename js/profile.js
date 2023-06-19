$(document).ready(function(){
    // $(".editProfile").on('click',function(e){
    //     e.preventDefault();
    //     $('.round').removeClass('d-none');
        
    //     $('.editProfile').addClass('d-none');
    //     $('.logout').addClass('d-none');
    //     $('.save').removeClass('d-none');
    //     $('.cancel').removeClass('d-none');
    //     $('.username').addClass('d-none');
    //     $('.usereditname').removeClass('d-none');
    //     $('.profile-bio').addClass('d-none');
    //     $('.usereditbio').removeClass('d-none');

    //     if ($('.img').attr('src') !== '../image/nurse.jpg') {
    //       $('#cancelButton').removeClass('d-none');
    //     }
    // })
    $(".editProfile").on('click', function(e) {
      e.preventDefault();
      $('.round').removeClass('d-none');
      $('.editProfile').addClass('d-none');
      $('.logout').addClass('d-none');
      $('.save').removeClass('d-none');
      $('.cancel').removeClass('d-none');
      $('.username').addClass('d-none');
      $('.usereditname').removeClass('d-none');
      $('.profile-bio').addClass('d-none');
      $('.usereditbio').removeClass('d-none');
  
      if ($('.img').attr('src') !== '../image/nurse.jpg') {
        console.log("MIngal")
        $('.cross').removeClass('d-none');
        console.log("Nihao")
      }
    });
    $(".cancel").on("click",function(){
        
        $('.round').addClass('d-none');
        $('.save').addClass('d-none');
        $('.cancel').addClass('d-none');
        $('.editProfile').removeClass('d-none');
        $('.logout').removeClass('d-none');
    })

    $(".camera").on("click", function () {
      $("input[name='img']").click();
  });

  $("input[name='img']").on("change", function () {
      var file = this.files[0];
      var reader = new FileReader();
      reader.onloadend = function () {
          $(".img").attr("src", reader.result);
          if ($('.img').attr('src') !== '../image/nurse.jpg') {
            console.log("change")
            $('.cross').removeClass('d-none');
            console.log("change")
          }else{
           
            $('.cross').addClass('d-none');
          }

      }
    //   $(".cancel-button").on("click",function(){
    //     $('.img').attr('src','../image/nurse.jpg');
    //    $('#cancelButton').addClass('d-none');
    //  })
      if (file) {
        console.log(file);
          reader.readAsDataURL(file);
      }
      
  });

      
      $(".cancel-button").on("click",function(){
         $('.img').attr('src','../image/nurse.jpg');
         $("#input").val("");
        $('#cancelButton').addClass('d-none');
      })
    
      $(".save").on("click", function() {
        let img = $('#profileimg').attr('src');
        if (img == '../image/nurse.jpg') {
          console.log(img)
          $('#profileimg').attr('src', img);
          console.log("Hello");
        } else {
          $('#profileimg').attr('src', img);
          console.log(img);
        }
      });
})