<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
        .addForm, #save {
            text-align:center;
            display:none;
        }
        .blockBtn{
            padding: 10px 0 10px 0;
        }
		.cancel {
			text-align:right;
			background:whiteSmoke;
			margin:0px;
		}
    </style>
</head>
<body>
<div class="container">
    <div class="row blockBtn" >
            <button class="btn  btn-primary" type="button" id="add">Добавить заказ</button>
    </div>
    <div class="row addForm">
        <form class="form-actions">
			<div class='cancel'><a href=#>X</a></div>
            <label for="customer">Заказчик:</label>
            <input type="text" value="" id="customer" name="customer">

            <label for="email">email:</label>
            <input type="text" value="" id="email" name="email">

            <label for="orderNum">Номер заказа:</label>
            <input type="text" value="" id="orderNum" name="orderNum">

            <label for="orderDate">Дата заказа:</label>
            <input type="text" value="" id="orderDate" name="orderDate">

            <label for="orderText">Примечание:</label>
            <textarea id="orderText" name="orderText"></textarea>
        </form>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered">
            <tr>
                <th>#</th>
                <th>Дата заказа</th>
                <th>Заказчик</th>
                <th>Emai</th>
                <th>Текст заказа</th>
                <th>Действие</th>
            </tr>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    jQuery(document).ready(function(){
       $.getJSON('order.json', function(obj) {
                                 showData(obj);
                               }
                 );

        $('#add').on('click',clickAdd);

        function clickAdd() {
            $('.addForm').css({'display':'block',
							   'height'	:'0px'
						})
						.animate({
							'height':'400px',
						},3000);

        }
   //////////////////////////////////////////
        function showData(param) {
            var curObj = {};
            for (customer in param) {
                curObj.customer = customer;
                curObj.email = param[customer].email;
                for(var i = 0; i <  param[customer].order.length; i++) {
                    curObj.orderNum = param[customer].order[i].id;
                    curObj.orderDate = param[customer].order[i].date;
                    curObj.orderText = param[customer].order[i].textOrder;

                    $(".table").append("<tr><td>"+curObj.orderNum+"</td>" +
                        "<td>"+curObj.email+"</td>"+
                        "<td>"+curObj.customer+"</td>"+
                        "<td>"+curObj.orderDate+"</td>"+
                        "<td>"+curObj.orderText+"</td>"+
                        "<td class='motion'></td></tr>" );
                }
            }
        }

    })
</script>
</body>
</html>
