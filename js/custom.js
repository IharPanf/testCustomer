/**
 * Created by Ihar on 06.11.2015.
 */
    var objJSON = $.getJSON('order.json', function (obj) {
        showData(obj);
    });

    $('#add').on('click', clickAdd);

    function clickAdd() {
        $('.addForm').css({
            'display': 'block',
            'height': '0px'
        })
            .animate({
                'height': '450px',
            }, 3000);
    }

    function showData(param) {
        var curObj = {};
        for (customer in param) {
            curObj.customer = customer;
            curObj.email = param[customer].email;
            for (var i = 0; i < param[customer].order.length; i++) {
                curObj.orderNum = param[customer].order[i].id;
                curObj.orderDate = param[customer].order[i].date;
                curObj.orderText = param[customer].order[i].textOrder;

                $(".table").append("<tr class='rowOrder'><td>" + curObj.orderNum + "</td>" +
                    "<td>" + curObj.email + "</td>" +
                    "<td>" + curObj.customer + "</td>" +
                    "<td>" + curObj.orderDate + "</td>" +
                    "<td>" + curObj.orderText + "</td>" +
                    "<td class='motion'><button class='btn btn-warning'>Удалить</button></td></tr>");
            }
            deleteOrder();
        }
    }

    function clickSave() {
        var customerElem = $('#customer').val();

        if (!objJSON.responseJSON.hasOwnProperty(customerElem)) {
            objJSON.responseJSON[customerElem] = {
                                            email: $('#email').val(),
                                            order: [{
                                                    'id': $('#orderNum').val(),
                                                    'date': $('#orderDate').val(),
                                                    'textOrder': $('#orderText').val()
                                                    }]
                                            };
        } else {
             var newOrder = {
                        'id': $('#orderNum').val(),
                        'date': $('#orderDate').val(),
                        'textOrder': $('#orderText').val()
             };
            objJSON.responseJSON[customerElem].order.push(newOrder);
        }
        $(".rowOrder").remove();
        clickCancel();
        showData(objJSON.responseJSON);
        return false;
    }

    function clickCancel() {
        $('.addForm').hide();
        return false;
    }

    function deleteOrder() {
        $('.btn-warning').on('click',function(e){
            $(e.target).parent().parent().remove();
        })
    }