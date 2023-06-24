//Comment Load More Function
// $(document).ready(function() {
//     var commentsPerPage = 2; // Number of comments to show per page
//     var $commentList = $('.comment-list');
//     var $loadMoreBtn = $('.load-more-btn');
//     var totalComments = $commentList.children('.comment').length;
//     var visibleComments = commentsPerPage;

//     // Initially hide all comments beyond the specified limit
//     $commentList.children('.comment:gt(' + (visibleComments - 1) + ')').hide();

//     // Show/hide "Load More" button based on the number of comments
//     if (totalComments <= visibleComments) {
//       $loadMoreBtn.hide();
//     }

//     // Handle "Load More" button click event
//     $loadMoreBtn.on('click', function() {
//       visibleComments += commentsPerPage;

//       // Show the next set of comments
//       $commentList.children('.comment:lt(' + visibleComments + ')').show();

//       // Hide the "Load More" button if all comments are visible
//       if (visibleComments >= totalComments) {
//         $loadMoreBtn.hide();
//       }
//     });
//   });

//Like Btn
function toggleLike(btn) {
	btn.classList.toggle("liked");
	const likeText = btn.querySelector(".like-text");
	const likeCount = btn.querySelector(".like-count");
	const likeIcon = btn.querySelector(".fa-thumbs-up");
	likeIcon.classList.toggle("liked-like-icon");
	if (btn.classList.contains("liked")) {
		likeText.innerText = "Liked";
		likeCount.innerText = parseInt(likeCount.innerText) + 1;
	} else {
		likeText.innerText = "Like";
		likeCount.innerText = parseInt(likeCount.innerText) - 1;
	}
}

$(document).ready(function () {
	var offset = 4;
	var limit = 4;

	$("#loadMoreBtn").on("click", function () {
		$.ajax({
			type: "POST",
			url: "load_more_reviews.php",
			data: {
				offset: offset,
				limit: limit,
			},
			success: function (response) {
				console.log(response);
				var reviews = $.parseJSON(response);
				var authorContainer = $("main");

				if (reviews.length > 0) {
					$.each(reviews, function (index, review) {
						let books = review.Books;
						var authorCard = `
			
				<div class="review">
					<div class="review-header">
						<div class="user-profile">
							<img src="${review.image}" alt="${review.image}" />
							<div class="user-details">
								<h3>
                      ${review.name}
								</h3>
								<p>${review.date}</p>
							</div>
						</div>
					</div>
					<div class="review-content">
						<div class="d-flex flex-wrap">
						
						</div>

						<p>
						${review.content}
						</p>
					</div>`;

						books.forEach((element) => {
							authorCard += `<a href="BookDetail.php?id=${element.id}">
					<div class="book-details">
						<img src="${element.image}" alt="${element.image}" />
						<div class="book-info">
							<h2>
							${element.name}
							</h2>
						
							<p>by
							${element.auther_id}
							</p>
						</div>
					</div>
				</a>`;
						});

						authorCard += `
						
					<div class="review-actions position-relative">
						<button class="like-btn" onclick="toggleLike(this)">
							<i class="fas fa-thumbs-up"></i>
							<span class="like-text">Like</span>
							<span class="like-count">
								${review.user_react}
							</span>
						</button>
						<button class="comment-btn">
							<i class="fas fa-comment"></i> Comment
						</button>
					
					</div>
					
				</div>
			
                        `;

						authorContainer.append(authorCard);
					});

					offset += limit;
				}

				if (reviews.length < 3) {
					console.log(authors.length);
					$("#loadMoreBtn").hide();
				}
			},
		});
	});
});
