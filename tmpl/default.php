<?PHP header("Content-Type: text/html; charset=utf-8");?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row blockBtn" >
            <button class="btn  btn-primary" type="button" id="add">Добавить заказ</button>
    </div>
    <div class="row addForm">
        <form class="form-actions " method="post" action="">
			<div class='cancel'><a href='#' onclick="return clickCancel();">X</a></div>
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
			<br>
			<button class="btn btn-success" id="saveOrder" onclick="return clickSave();">Сохранить</button>
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
<script src="js/custom.js"></script>
</body>
</html>
