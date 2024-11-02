<?php
$title = "RybolovClub73";
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
                    <a href="products.php">Назад</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<?php
include("db.php");
$current_page='addproducts';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $definition = $_POST['definition'];
    $image = $_FILES['image']['name'];
    $countt = $_POST['countt'];
    $specifications = $_POST['specifications'];

    // Загрузка изображения в папку
    move_uploaded_file($_FILES['image']['tmp_name'], 'Data/img/' . $image);

    $query = "INSERT INTO `termsproducts` (name, definition, specifications, img, count) VALUES ('$name', '$definition', '$specifications', '$image', '$countt')";

    if (mysqli_query($mysql, $query)) {
        echo "Новый товар успешно добавлен!";

    } else {
        echo "Ошибка при добавлении товара: " . mysqli_error($mysql);
    }
}

include("footer.php");
?>