<?php
session_start();
$title = "RybolovClub73";
$current_page = 'home';
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Сайт рыболовного магазина" />
    <link href="styleForDB.css " rel="stylesheet" type="text/css" />
    <link href="images/icon.webp" rel="shortcut icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Macondo:regular" rel="stylesheet" />
    <title>
        <?php echo $title; ?>
    </title>

    <style>
        .product-container {
            position: relative;
            display: inline-block;
        }

        .details-btn {
            display: none;
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #f78f3f;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 4px;
        }

        .product-container:hover .details-btn {
            display: block;
        }
    </style>
</head>

<header>
    <div class="container">
        <nav class="nav">
            <div class="text">RybolovClub73</div>
            <ul>
                <li>
                    <a href="index.php">Назад</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<?php

$title = "RybolovClub73";
$current_page = 'products';
include("db.php");

$result = mysqli_query($mysql, "SELECT * FROM `termsproducts`");

if ($result) {
    echo '<form method="POST" action="basket.php">';
    echo '<table>';

    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']):

        echo '<tr><th>Выбрать</th><th>Товар</th><th>Определение</th><th>Изображение</th></tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td><input type="checkbox" name="products[]" value="' . $row['id'] . '"></td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['definition'] . '</td>';
            echo '<td>';
            echo '<div class="product-container">';
            echo '<img class="Image" title="' . $row['name'] . '" src="Data/img/' . $row['img'] . '" alt="' . $row['name'] . '" />';
            echo '<button class="details-btn" onclick="viewDetails(' . $row['id'] . ')">Подробнее</button>';
            echo '</div>';
            echo '</td>';
            echo '</tr>';
        }
    else:
        echo '<tr><th>Товар</th><th>Определение</th><th>Изображение</th></tr>';
    
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['definition'] . '</td>';
            echo '<td>';
            echo '<div class="product-container">';
            echo '<img class="Image" title="' . $row['name'] . '" src="Data/img/' . $row['img'] . '" alt="' . $row['name'] . '" />';
            echo '<button class="details-btn" onclick="viewDetails(' . $row['id'] . ')">Подробнее</button>';
            echo '</div>';
            echo '</td>';
            echo '</tr>';
        }
    endif;
    echo '</table>';
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']):
        echo '<br><button type="submit" class="btn">Перейти в корзину</button>';
    endif;
    echo '</form>'; // Закрываем форму
} else {
    echo 'Ошибка при извлечении данных: ' . mysqli_error($mysql);
}
?>

<script>
    // Функция для перехода на страницу с подробной информацией о товаре
    function viewDetails(productId) {
        event.preventDefault();
        window.location.href = "aboutProduct.php?id=" + productId;
    }
</script>
<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && isset($_SESSION['isadmin']) && $_SESSION['isadmin']): ?>
    <br>
    <a href="addProduct.php" class="btn">Добавить новый товар</a>
<?php endif; ?>
</body>
<?php include('footer.php'); ?>

</html>