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
