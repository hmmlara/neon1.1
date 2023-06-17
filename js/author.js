$(document).ready(function(){
     
    var offset = 4; 
    var limit = 4;

    $('#loadMoreBtn').on('click',function() {
        $.ajax({
            type: "POST",
            url: "load_more_authors.php", 
            data: {
                offset: offset,
                limit: limit,
            },
            success: function(response) {
                console.log(response)
                var authors = $.parseJSON(response);
                var authorContainer = $('#authorContainer');

                if (authors.length > 0) {
                    $.each(authors, function(index, author) {
                        var authorCard = '<div class="col-md-3 sm-4 mb-3 originalauthors">' +
                            '<div class="card-parent">' +
                            '<div class="author-card">' +
                            '<img class="author-image card-img-top" src="../image/' + author.image + '" alt="Author Image">' +
                            '<h2 class="author-name">' + author.name + '</h2>' +
                            '<p class="author-bio">Author Bio</p>' +
                            '<a class="author-website" href="AuthorDetail.php" target="_blank">Author\'s Books</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        authorContainer.append(authorCard);
                    });

                    offset += limit; 
                    console.log(offset)
                    console.log(authors.length)
                }
                
                if(authors.length<3)               
                {
                    console.log(authors.length)
                    $('#loadMoreBtn').hide(); 
                }
            }
        });
        
    });
})