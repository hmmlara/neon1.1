$(document).ready(function(){
    // $("#search").on("click",function(e){
    //     e.preventDefault();
        
    // })
    $("#filter_category").on('change',function(){
        var books="";
        $("#booksearch").val("");
       
        
        let value=$(this).val();
        $.ajax({
            url:"getcategory.php",
            type:"post",
            data:{value:value},
            success : function (response){
                books = $.parseJSON(response);
                console.log(books)
                $(".usersearch_book").remove();
                if (books.length > 0) {
                    $.each(books, function(index,book) {
                        var bookCard = `<div class="col-md-3 usersearch_book">
                        <div class="card  sm-4 mb-3" width="100%" height="400px">
                        <img src="../image/photos/${book.image}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">${book.name}</h5>
                          <p class="card-text">${book.preview}</p>
                          <p class="card-text">${book.date}</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                      </div>`

                        $("#filterbook").append(bookCard);
                    });
                }
            }
        })
        if($(this).val()!="All"){
            $("#search").on("click",function(e){
                $(".usersearch_book").remove();
                booksearch=$("#booksearch").val();
                $.each(books,function(index,book){
                    if (book.name.toLowerCase().includes(booksearch.toLowerCase())) {
                        console.log(book);
                            var searchBookUser= `<div class="col-md-3 usersearch_book">
                            <div class="card  sm-4 mb-3" width="100%" height="400px">
                            <img src="../image/photos/${book.image}" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">${book.name}</h5>
                              <p class="card-text">${book.preview}</p>
                              <p class="card-text">${book.date}</p>
                              <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
                          </div>`
    
                            $("#filterbook").append(searchBookUser);
                        e.preventDefault();
                    }
                })
            })
        }
        
        
        
    })
    // $('#something').click(function() {
    //     location.reload();
    // });
})