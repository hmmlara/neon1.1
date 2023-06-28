$(document).ready(function () {
    $('.success123').click(function() {
      console.log("Clik")
        var bookId = $(this).data('book-id');
        console.log(bookId)
        
        $('#selected_book_id').val(bookId);
        // e.preventDefault();
        //$('form').submit();
        
        
    });
    $('.unselete123').click(function() {
      // $(".btn-success").remove();
      // $(".btn-danger").append();
        var bookId = $(this).data('book-id');
        console.log(bookId)
        $('#selected_book_id').val(bookId);
        //e.preventDefault();
        
        
        //$('form').submit();
        
        
    });
});
