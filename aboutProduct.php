<?php
session_start();
include("db.php");

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $result = mysqli_query($mysql, "SELECT * FROM `termsproducts` WHERE `id` = $productId");

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "Товар не найден.";
        exit();
    }
} else {
    echo "Неверный идентификатор товара.";
    exit();
}
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
        <?php echo $product['name']; ?>
    </title>
</head>

<header>
    <div class="container">
        <nav class="nav">
            <div class="text">RybolovClub73</div>
        </nav>
    </div>
</header>

<body>
    <div class="aboutProduct">
        <br>
        <h1>
            <?php echo $product['name']; ?>
        </h1>
        <br><img src="Data/img/<?php echo $product['img']; ?>" alt="<?php echo $product['name']; ?>"
            style="width:300px; height:auto;">
        <br>
        <p><strong>Описание:</strong> <?php echo $product['definition']; ?>
        </p>
        <p><strong>Характеристики:</strong> <?php echo $product['specifications']; ?>
        </p>

        <br>
        <p><strong>Количество в наличии:</strong> <?php echo $product['count']; ?>
        </p>
    </div>
    <br><a href="products.php" class="btn">Вернуться к списку товаров</a>
</body>
<?php include('footer.php'); ?>

</html>