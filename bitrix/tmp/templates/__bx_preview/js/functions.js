
$('input[name="PHONE"]').mask('+7 (999) 999 99 99');
$('input[autocomplete="tel"]').mask('+7 (999) 999 99 99');

$('.cart__content .cart__radio').change(function(){
    $('.cart__content > p.article').text("Арт: " + $(this).val());
    $('.cart__content > .cart__price').text($(this).attr('data-price'));
});


$('.callback-btn').click(function(){
    $('#callback').bPopup({
        zIndex:1000
    });
});



var path = "/bitrix/templates/medical-templates/ajax/";

function replaseBasketTop() {
    $.ajax({
        url: path + 'basket.php',
        type: 'get',
        success: function (data) {
            $('.header__basket').replaceWith(data);
        }
    })
}

function replaseBasketMobileTop() {
    $.ajax({
        url: path + 'basket.mobile.php',
        type: 'get',
        success: function (data) {
            $('.header__basket_mobile').replaceWith(data);
        }
    })
}


function addToBasket2(idel, quantity,el) {
    $art = $(el).closest('.cart__content').find('.cart__radio:checked').val();
    if(!$art){
        $art = $(el).closest('.cart__content').find('.article').text().replace("Арт: ","");
    }
    $color = $.trim($(el).closest('.cart__content').find('.cart__radio:checked').parent().text());

    $href = path + "add.php?id=" + idel + '&quantity=' + quantity + '&art=' + $art + '&color=' + $color;
    $.ajax({
        url: $href,
        type: 'get',
        success: function (data) {
            console.log(data);
            if (data == 'Товар успешно добавлен в корзину') {
                replaseBasketTop();
                replaseBasketMobileTop();
                alertify.success(data);
            } else {
                alertify.error(data);
            }
        }
    });
    return false;
}


