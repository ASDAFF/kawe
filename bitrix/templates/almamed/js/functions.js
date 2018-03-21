
var path = "/bitrix/templates/almamed/ajax/";

function replaseBasketTop() {
    $.ajax({
        url: path + 'basket.php',
        type: 'get',
        success: function (data) {
            $('.header__basket').replaceWith(data);
        }
    })
}


function addToBasket2(idel, quantity,el) {
    $href = path + "add.php?id="+idel;
    $.ajax({
        url: $href + '&quantity=' + quantity,
        type: 'get',
        success: function (data) {
            if (data == 'Товар успешно добавлен в корзину') {
                replaseBasketTop();
                alertify.success(data);
            } else {
                alertify.error(data);
            }
        }
    });
    return false;
}

