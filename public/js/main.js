$('body').on('click', '.add-to-cart-link', function (e) {
    e.preventDefault();
    const id = $(this).data('id'),
        qty = $('.quantity input').val() ?? 1,
        mod = $('.available select').val();
    $.ajax({
        url: '/cart/add',
        data: {id: id, qty: qty, mod: mod},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка! Попробуйте позже!')
        }
    })
})

$('#cart .modal-body').on('click', '.del-item', function () {
    let id = $(this).data('id');
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка!')
        }
    })
})

function showCart(cart) {
    $('#cart .modal-footer a, #cart .modal-footer .btn-danger').visible = $.trim(cart) === '<h3>Корзина пуста</h3>'

    $('#cart .modal-body').html(cart);
    $('#cart').modal();
    if ($('.cart-sum').text()) {
        $('.simpleCart_total').html($('#cart .cart-sum').text());
    } else {
        $('.simpleCart_total').text('Empty Cart');
    }
}

function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка! Попробуйте позже!')
        }
    })
}

function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка! Попробуйте позже!')
        }
    })
}

$('#currency').change(function () {
    window.location = 'currency/change?curr=' + $(this).val();
})

$('.available select').on('change', function () {
    var modId = $(this).val(),
        color = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        oldPrice = $(this).find('option').filter(':selected').data('old-price'),
        basePrice = $('#base-price').data('base'),
        oldBasePrice = $('#old-price').data('base');
    if (price) {
        $('#base-price').html(symbolLeft + '&nbsp;' + price + '&nbsp;' + symbolRight);
        if (price === oldPrice)
            $('#old-price').html('');
        else
            $('#old-price').html(symbolLeft + '&nbsp;' + oldPrice + '&nbsp;' + symbolRight);
    } else {
        $('#base-price').html(symbolLeft + '&nbsp;' + basePrice + '&nbsp;' + symbolRight);
        if (price === oldBasePrice)
            $('#old-price').html('');
        else
            $('#old-price').html(symbolLeft + '&nbsp;' + oldBasePrice + '&nbsp;' + symbolRight);
    }
})
