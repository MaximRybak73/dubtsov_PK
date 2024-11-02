<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Это пробный сайт" />
    <link href="styleForDB.css " rel="stylesheet" type="text/css" />
    <link href="images/icon.webp" rel="shortcut icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Macondo:regular" rel="stylesheet" />
    <title>RybolovClub73</title>
</head>

<body>
    <header>
        <div class="container">
            <nav class="nav">
                <div class="text">RybolovClub73</div>
                <ul>
                    <li><a href="products.php">Назад</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="form">
        <h3>Добавить товар</h3>
        <form action="insertProduct.php" method="POST" enctype="multipart/form-data">
            <label for="name">Наименование:</label>
            <input type="text" id="name" name="name"><br><br>

            <label for="countt">Количество:</label>
            <input type="text" id="countt" name="countt"><br><br>

            <label for="specifications">Характеристики:</label>
            <textarea id="specifications" name="specifications"></textarea><br><br>

            <label for="definition">Подробности:</label>
            <textarea id="definition" name="definition"></textarea><br><br>

            <label for="image">Изображение:</label>
            <input type="file" id="image" name="image"><br><br>

            <input type="submit" value="Добавить термин" class="btn">
        </form>
    </div>
</body>

<?php include "footer.php"; ?>

</html>