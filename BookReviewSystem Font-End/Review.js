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
    btn.classList.toggle('liked');
    const likeText = btn.querySelector('.like-text');
    const likeCount = btn.querySelector('.like-count');
    const likeIcon = btn.querySelector('.fa-thumbs-up')
    likeIcon.classList.toggle("liked-like-icon")
    if (btn.classList.contains('liked')) {
      likeText.innerText = 'Liked';
      likeCount.innerText = parseInt(likeCount.innerText) + 1;
      
    } else {
      likeText.innerText = 'Like';
      likeCount.innerText = parseInt(likeCount.innerText) - 1;
    }
  }
  