$(document).ready(function () {
    $('.catFilter').change(function (e) {
        e.preventDefault();
        let categoryId = $(this).val();
        let sortingOption = $('#fruits').val();
        let searchQuery = $('#search').val();
        fetchData(categoryId, 1, sortingOption, searchQuery);
    });

    $('#pagination-container').on('click', 'a.page-link', function (e) {
        e.preventDefault();
        let categoryId = $('input[name="category_id"]:checked').val();
        let pageNumber = $(this).data('page');
        let sortingOption = $('#fruits').val();
        let searchQuery = $('#search').val();
        fetchData(categoryId, pageNumber, sortingOption, searchQuery);

        // Set active class
        $(this).closest('ul').find('a.page-link').removeClass('active');
        $(this).addClass('active');
    });

    $('#fruits').change(function (e) {
        e.preventDefault();
        let categoryId = $('input[name="category_id"]:checked').val();
        let sortingOption = $(this).val();
        let pageNumber = $('.pagination').find('.active').data('page');
        let searchQuery = $('#search').val();
        fetchData(categoryId, pageNumber, sortingOption, searchQuery);
    });

    $('#search').on('input', function (e) {
        let searchQuery = $(this).val();
        let categoryId = $('input[name="category_id"]:checked').val();
        let pageNumber = $('.pagination').find('.active').data('page');
        let sortingOption = $('#fruits').val();
        fetchData(categoryId, pageNumber, sortingOption, searchQuery);
    });

    $(document).on('click', '.addCart', function(event) {
        event.preventDefault();


        var productId = $(this).data('id');
        $.ajax({
            url: '/cart',
            type: 'POST',
            contentType: 'application/json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: JSON.stringify({productId: productId}),
            success: function(response) {
                showNotification(response.message, 'success')
            },
            error: function(xhr, status, error) {
                showNotification('There was an error.. Try again later!', 'error');
            }
        });
    });
});


function fetchData(categoryId, pageNumber = 1, sortingOption = 0, searchQuery = '') {
    let data = {
        category_id: categoryId,
        page_number: pageNumber,
        sorting_option: sortingOption,
        search_query: searchQuery
    };

    $.ajax({
        url: 'fruits',
        type: 'GET',
        data: data,
        success: function (response) {
            displayFilteredProducts(response);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}

function displayFilteredProducts(response, price = 0) {
    let fruits = response.fruits.data;
    let html = '<div class="row g-4 justify-content-center">';
    if(fruits.length < 1){
        html+='<h3 class="text-center mt-5">No products match your search...</h3>';
        html+='</div>';
    }
    else{
        fruits.forEach(function (fruit) {
            html += '<div class="col-md-6 col-lg-4 col-xl-3">';
            html += '<div class="rounded position-relative fruite-item">';
            html += '<div class="fruite-img">';
            html += '<a href="' + "fruits/" + fruit.id + '"><img src="' + "assets/img/" + fruit.img.href + '" class="img-fluid w-100 rounded-top" alt="' + fruit.name + '"></a>';
            html += '</div>';
            html += '<div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">' + fruit.category.name + '</div>';
            html += '<div class="p-4 border border-secondary border-top-0 rounded-bottom">';
            html += '<h4>' + fruit.name + '</h4>';
            html += '<h3 class="fs-5 fw-bold mb-3">';
            let sum = fruit.rating.reduce((acc, obj) => acc + parseFloat(obj.value), 0);
            let average = sum / fruit.rating.length;
            let roundedAverage = Math.round(average * 2) / 2;
            for (let i = 1; i <= 5; i++) {
                if (roundedAverage >= i) {
                    html += '<i class="fas fa-star text-primary"></i>';
                } else if (roundedAverage >= i - 0.5) {
                    html += '<i class="fas fa-star-half-alt text-primary"></i>';
                } else {
                    html += '<i class="far fa-star text-primary"></i>';
                }
            }
            html += '(' + fruit.rating.length + ')';
            html += '</h3>';
            html += '<div class="d-flex justify-content-between flex-lg-wrap">';
            if (price) {
                html += '<p class="text-dark fs-5 fw-bold mb-0">$' + fruit.price + ' / kg</p>';
            } else {
                html += '<p class="text-dark fs-5 fw-bold mb-0">$' + (fruit.prices.length > 0 ? fruit.prices.reduce((prev, current) => (prev.date_from > current.date_from) ? prev : current).price : 'N/A') + ' / kg</p>';
            }
            html += `<a href="#" class="btn border border-secondary rounded-pill px-3 text-primary addCart" data-id="${fruit.id}"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>`;
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
        });
        html += '</div>';
    }


    $('#fruits-container').html(html);

    let totalItems = response.fruits.total;
    let itemsPerPage = response.fruits.per_page;
    let totalPages = Math.ceil(totalItems / itemsPerPage);

    let paginationHtml = '<nav><ul class="pagination">';
    for (let i = 1; i <= totalPages; i++) {
        paginationHtml += '<li class="page-item">';
        paginationHtml += '<a class="page-link' + (i === response.fruits.current_page ? ' active' : '') + '" href="#" data-page="' + i + '">' + i + '</a>';
        paginationHtml += '</li>';
    }
    paginationHtml += '</ul></nav>';

    $('.pagination').html(paginationHtml);
}
function showNotification(message, type) {
    $('#notification').removeClass('d-none').addClass(type).text(message);
    setTimeout(function() {
        $('#notification').addClass('d-none').removeClass(type).text('');
    }, 5000); // Hide after 5 seconds
}
