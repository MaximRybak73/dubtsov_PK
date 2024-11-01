<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Сайт рыболовного магазина" />
    <link href="styleForDB.css " rel="stylesheet" type="text/css" />
    <link href="images/icon.webp" rel="shortcut icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Macondo:regular" rel="stylesheet" />
    <title>
        <?php echo $title; ?>
    </title>
</head>

<header>
    <div class="container">
        <nav class="nav">
            <div class="text">RybolovClub73</div>
            <ul>
                <li>
                    <a href="index.php">Главная</a>
                </li>

                <li>
                    <a href="autentification.php">Войти</a>
                </li>

                <li>
                    <a href="products.php">Магазин</a>
                </li>

                <li>
                    <a href="infoFish.php">Факты о рыбе</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<?php
$title = "Моя корзина";
$current_page = "basket";
include("db.php");

// Проверяем, были ли выбраны товары
if (isset($_POST['products'])) {
    $selected_products = $_POST['products'];
    echo '<br><h1>Список выбранных товаров</h1>';
    echo '<ul class="basket">'; // Изменяем на <ul> для ненумерованного списка

    // Перебираем выбранные товары
    foreach ($selected_products as $product_id) {
        // Выполняем запрос к базе данных для получения информации о каждом товаре по ID
        $result = mysqli_query($mysql, "SELECT * FROM `termsproducts` WHERE id = " . intval($product_id));
        if ($row = mysqli_fetch_assoc($result)) {
            echo '<li>' . $row['name'] . '</li>'; // Отображаем название товара в списке
        }
    }

    echo '</ul>'; // Закрываем ненумерованный список
} else {
    echo '<p>Вы не выбрали ни одного товара.</p>';
}
?>

<a href="products.php" class="btn">Вернуться к товарам</a>
</body>
<?php include('footer.php'); ?>
</html>
