$(document).ready(function(){
  
    let reviewContent =   $("#review-content")
    if(localStorage.getItem("content")){
        reviewContent.val(localStorage.getItem("content"))
    }
    else{
        localStorage.setItem("content","")
    }
    let value = ""
    reviewContent.keyup((e)=>{
        value = reviewContent.val()
        console.log(value);
        localStorage.setItem("content",value)
    })
})
