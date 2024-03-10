$(document).ready(function() {
    var starsSelected = -1;

    $('.rate-star').click(function() {
        starsSelected = $('.rate-star.text-primary').length;
        checkFormValidity();
        var clickedStarIndex = $(this).index();
        $('.rate-star').removeClass('text-primary');
        $('.rate-star').each(function(index) {
            if (index <= clickedStarIndex) {
                $(this).addClass('text-primary');
            }
        });
    });

    $('#reviewDesc').on('input', function() {
        checkFormValidity();
    });

    function checkFormValidity() {
        var reviewDesc = $('#reviewDesc').val();
        if (starsSelected >= 0 && reviewDesc.trim().length > 0) {
            $('#buttonReview').prop('disabled', false);
        } else {
            $('#buttonReview').prop('disabled', true);
        }
    }

    $('#buttonReview').click(function() {
        var reviewDesc = $('#reviewDesc').val();
        var starsSelected = $('.rate-star.text-primary').length;
        var fruitId = $('#fruitId').data('id');
        $.ajax({
            url: '/review',
            method: 'POST',
            dataType:'JSON',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                starsSelected: starsSelected,
                reviewDesc: reviewDesc,
                fruitId : fruitId
            },
            success: function(response) {
                if (response.success) {
                    renderReviews(response);
                    showNotification('Review posted successfully!', 'success');
                } else {
                    showNotification('Failed to post review.. Try again later. ', 'error');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                showNotification('Failed to post review.. Try again later.', 'error');
            }
        });
        $('#reviewDesc').val('');
        $('.rate-star').removeClass('text-primary');

    });
});


function renderReviews(response) {
    $('#nav-mission').empty();
    response.data.forEach(function(review) {
        let html = '';
        for (let i = 1; i <= 5; i++) {
            if (review.value >= i) {
                html += '<i class="fas fa-star text-primary"></i>';
            } else if (review.value >= i - 0.5) {
                html += '<i class="fas fa-star-half-alt text-primary"></i>';
            } else {
                html += '<i class="far fa-star text-primary"></i>';
            }
        }

        $('#nav-mission').append(
            `<div class="d-flex align-items-start my-3">
                <img src="../assets/img/${review.user.img.href}" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                <div class="flex-grow-1 ms-3">
                    <p class="mb-2" style="font-size: 14px;">${review.published_at}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>${review.user.first_name} ${review.user.last_name}</h5>
                        <div class="d-flex my-4 fw-bold text-dark">
                            ${html}
                        </div>
                    </div>
                    <p>${review.description}</p>
                </div>
            </div>`
        );
    });
}
function showNotification(message, type) {
    $('#notification').removeClass('d-none').addClass(type).text(message);
    setTimeout(function() {
        $('#notification').addClass('d-none').removeClass(type).text('');
    }, 5000); // Hide after 5 seconds
}
