<?php
$title = "RybolovClub73";
$current_page = 'home';
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Сайт рыболовного магазина" />
    <link href="style.css " rel="stylesheet" type="text/css" />
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
                    <a href="index2.php">Главная</a>
                </li>

                <li>
                    <a href="autentification.php">Войти</a>
                </li>

                <li>
                    <a href="products2.php">Магазин</a>
                </li>

                <li>
                    <a href="infoFish2.php">Факты о рыбе</a>
                </li>

                <li>
                    <a href="basket2.php">Моя корзина</a>
                </li>

                <li>
                    <a href="feedback.php">Обратная связь</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<?php
include("db.php");
$current_page='addproducts';
include("header.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $definition = $_POST['definition'];
    $image = $_FILES['image']['name'];
    $countt = $_POST['countt'];

    // Загрузка изображения в папку
    move_uploaded_file($_FILES['image']['tmp_name'], 'Data/img/' . $image);

    // SQL-запрос для вставки термина, определения и изображения
    $query = "INSERT INTO `termsproducts` (name, definition, img, count) VALUES ('$name', '$definition', '$image', '$countt')";

    if (mysqli_query($mysql, $query)) {
        echo "Новый товар успешно добавлен!";

    } else {
        echo "Ошибка при добавлении товара: " . mysqli_error($mysql);
    }
}

include("footer.php");
?>
