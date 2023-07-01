$(document).ready(function(){
    $("#filter_category").on('change',function(){
       var books="";
        let value=$(this).val();
        $.ajax({
            url:"getcategory.php",
            type:"post",
            data:{value:value},
            success : function (response){
                 books = $.parseJSON(response);
                console.log(response)

                $(".usersearch_book").remove();
                if (books.length > 0) {
                    $.each(books, function(index,book) {
                        var bookCard = `
                        <div class="book-card usersearch_book">
                        <div class="book-card-image">
                            <img src="../image/photos/${book.image}" alt="${book.image}" />
                            <div class="book-card-overlay">
                                <a href="#" class="book-card-button">Read More</a>
                            </div>
                        </div>
                        <div class="book-card-info">
                            <h3 class="book-card-title">${book.name}</h3>
                            <p class="book-card-author">Author:${book.auther_name}</p>
                            <p class="book-card-genre">Genre: Fantasy</p>
                        </div>
                    </div>
                        `

                        $("#filterbook").append(bookCard);
                    });
                }
            }
        })
        
        if($("#filter_category").val()!=="All" || $("#booksearch").val().length>0){
            console.log($(".load_more").length)
           $("#loadmorebtn").remove();
            // $(".load_more").addClass("d-none");
        }

        if($(this).val()!="All"){
            $("#search").on("click",function(e){
                console.log("////////")
                $(".usersearch_book").remove();
                booksearch=$("#booksearch").val();
                //e.preventDefault();
                console.log(booksearch)
                console.log(books.name)
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
                    }
                })
                e.preventDefault();
            })
        }else{
            $("#booksearch").val()
            location.reload();
        }
        
    })

    $("#search").on("click",function(){
        if($("#booksearch").length>0){
            console.log($("#booksearch").length)
            $("#loadmorebtn").remove();
            //e.preventDefault();
        }
       
    })


    // if ($("#filter_category").val() != "All" || $("#booksearch").val().length > 0) {
    //     $(".load_more").remove();
    //     console.log("Hello");
    //}
    

    //loadmorebtn
    var offset=4;
    var limit=4;

    $("#loadmorebtn").on("click",function(){
        $.ajax({
            type:"POST",
            url:"bookloadmore.php",
            data:{
                offset: offset,
                limit: limit,
            },
            success :function(response){
                console.log(response)
                var balanceBooks=$.parseJSON(response);
                var remainBook=$(".select_all");
                if (balanceBooks.length > 0) {
                    $.each(balanceBooks, function(index, balanceBook) {
                        var BookCard = `<div class="book-card usersearch_book">
                        <div class="book-card-image">
                            <img src="../image/photos/${balanceBook.image}" alt="${balanceBook.image}" />
                            <div class="book-card-overlay">
                                <a href="#" class="book-card-button">Read More</a>
                            </div>
                        </div>
                        <div class="book-card-info">
                            <h3 class="book-card-title">${balanceBook.name}</h3>
                            <p class="book-card-author">Author:${balanceBook.auther_name}</p>
                            <p class="book-card-genre">Genre: Fantasy</p>
                        </div>
                    </div>
                        `
                            remainBook.append(BookCard);
                    });
                    offset += limit; 
                }
                
                if(balanceBooks.length<3)               
                {
                    console.log(balanceBooks.length)
                    $('#loadmorebtn').hide(); 
                }
            }
        })
    })

    // if ($("#filter_category").val() != "All") {
    //     $(".load_more").remove();
    //     alert("Hello")
    //     console.log("All");
    // }

    
})