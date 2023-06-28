$(document).ready(function(e) {
    $('.unselect-btn').click(function() {
      console.log("Hello")
       var bookId = $(this).data('book-id');
       console.log(bookId);
      $('#selected_book_id').val(bookId);
   
      $('form').submit(function(e) {
        e.preventDefault(); // Prevent default form submission behavior
  
        $.ajax({
          type: 'POST',
          url: $(this).attr('action'),
          data: $(this).serialize(),
          success: function() {
            location.reload(); // Reload the page after successful form submission
          }
        });
      });
  
      $('form').submit(); // Trigger the form submission
    });
  });