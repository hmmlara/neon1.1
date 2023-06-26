$(document).ready(function () {
  $("#genere_fliter").on("change", function () {
   $(".something").remove();
    var books = "";
    let value = $(this).val();
    console.log(value);
    $.ajax({
      url: "generefliter.php",
      type: "post",
      data: { value: value },
      success: function (response) {
        books = $.parseJSON(response);
        console.log(response);

        if (books.length > 0) {
          $.each(books, function (index, book) {
            var bookCard = `<tr class="something">
                        <td>${index + 1}</td>
                        <td>${book.book_name}</td>
                        <td>${book.author_name}</td>
                        <td>${book.date}</td>
                        <td><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></td>
                        </tr>
                        `;
            $("#genere_table").append(bookCard);
          });
        }
      },
    });
    //location.reload();
  });
});
