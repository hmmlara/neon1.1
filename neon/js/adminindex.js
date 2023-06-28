$(document).ready(function () {
    $('.success-btn').click(function() {
      console.log("Clik")
        var bookId = $(this).data('book-id');
        console.log(bookId)
        $('#selected_book_id').val(bookId);
        //e.preventDefault();
        
        //$(this).removeClass('btn-success').addClass('btn-danger');
        $('form').submit();
        
        
    });
    $('.unselete-btn').click(function() {
      console.log("Clik")
      // $(".btn-success").remove();
      // $(".btn-danger").append();
        var bookId = $(this).data('book-id');
        console.log(bookId)
        $('#selected_book_id').val(bookId);
        //e.preventDefault();
        
        //$(this).removeClass('btn-success').addClass('btn-danger');
        $('form').submit();
        
        
    });
});
