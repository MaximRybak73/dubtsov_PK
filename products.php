<?php
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

$title = "RybolovClub73";
$current_page = 'products';
include("db.php");

$result = mysqli_query($mysql, "SELECT * FROM `termsproducts`");

if ($result) {



    echo '<form method="POST" action="basket.php">'; // Открываем форму
    echo '<table>';
    echo '<tr>  <th>Товар</th><th>Определение</th><th>Изображение</th></tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['definition'] . '</td>';
        echo '<td><img class="Image" title="' . $row['name'] . '" src="' . $row['img'] . '" alt="' . $row['name'] . '" /></td>';
        echo '</tr>';
    }

    echo '</table>';

    echo '</form>'; // Закрываем форму
} else {
    echo 'Ошибка при извлечении данных: ' . mysqli_error($mysql);
}
?>
<br>
<a href="addProduct.php" class="btn">Добавить новый товар</a>
</body>
<?php include('footer.php'); ?>

</html>