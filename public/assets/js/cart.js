$(document).ready(function() {
    $(document).on('click', '.removeCart', function() {
        var productId = $(this).data('id');
        console.log(productId)
        $.ajax({
            url: '/cart',
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                productId: productId
            },
            success: function(response) {
                showNotification(response.message, 'success');
                renderCartTable(response.fruits);
            },
            error: function(xhr, status, error) {
                showNotification('There was an error.. Try again later!', 'error');
            }
        });
    });
    $(document).on('input', '.qtyInput', function() {
        var productId = $(this).data('id');
        var quantity = $(this).val();

        $.ajax({
            url: '/cart/qty',
            type: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                productId:productId,
                quantity: quantity
            },
            success: function(response) {
                showNotification(response.message, 'success');
                renderCartTable(response.fruits);
            },
            error: function(xhr, status, error) {
                showNotification('There was an error.. Try again later!', 'error');
            }
        });
    });
});

function showNotification(message, type) {
    $('#notification').removeClass('d-none').addClass(type).text(message);
    setTimeout(function() {
        $('#notification').addClass('d-none').removeClass(type).text('');
    }, 5000); // Hide after 5 seconds
}

function renderCartTable(fruits) {
    var tableBody = $('#cartTable tbody');
    tableBody.empty();
    var subtotal = 0;

    if (fruits.length < 1) {
        var html = `<h1 class="text-center my-5">Your cart is empty, you can fill it up <a
                href="/fruits">here!</a>
        </h1>`;
        $('#cartSection').html(html);
    } else {
        fruits.forEach(function (fruit) {
            var sortedPrices = fruit.fruits.prices.sort((a, b) => new Date(b.date_from) - new Date(a.date_from));
            var newestPrice = sortedPrices[0];
            subtotal += newestPrice.price * fruit.quantity;
            var row = `
            <tr>
                <th scope="row">
                    <div class="d-flex align-items-center">
                        <img src="assets/img/${fruit.fruits.img.href}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                    </div>
                </th>
                <td>
                    <p class="mb-0 mt-4">${fruit.fruits.name}</p>
                </td>
                <td>
                    <p class="mb-0 mt-4">$${newestPrice.price}</p>
                </td>
                <td>
                    <div class="input-group quantity mt-4" style="width: 100px;">
                        <input data-id="${fruit.id_fruits}" type="number" class="form-control form-control-sm text-center border-0 qtyInput" value="${fruit.quantity}" min="1">
                    </div>
                </td>
                <td>
                    <p class="mb-0 mt-4">$${(newestPrice.price * fruit.quantity).toFixed(0)}</p>
                </td>
                <td>
                    <button data-id="${fruit.fruits.id}" class="btn btn-md rounded-circle bg-light border mt-4 removeCart" >
                        <i class="fa fa-times text-danger"></i>
                    </button>
                </td>
            </tr>
        `;
            total = subtotal+10;
            tableBody.append(row);
            $('#subtotal').text('$' + subtotal.toFixed(0));
            $('#total').text('$' + total.toFixed(0));
        });
    }
}

