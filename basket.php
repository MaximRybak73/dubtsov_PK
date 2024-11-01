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
        </nav>
    </div>
</header>

<?php
session_start();
include("db.php");

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    $user_id = $_SESSION['user_id'];

    foreach ($_POST['products'] as $product_id) {
        $query = "INSERT INTO basket (user_id, product_id) VALUES ($user_id, $product_id)";
        mysqli_query($mysql, $query);
    }

    $query = "SELECT termsproducts.name, termsproducts.definition, termsproducts.img 
              FROM basket 
              JOIN termsproducts ON basket.product_id = termsproducts.id 
              WHERE basket.user_id = $user_id";
    $result = mysqli_query($mysql, $query);

    echo '<h2>Моя корзина</h2>';
    echo '<table>';
    echo '<tr><th>Товар</th><th>Описание</th><th>Изображение</th></tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['definition'] . '</td>';
        echo '<td><img src="Data/img/' . $row['img'] . '" alt="' . $row['name'] . '" /></td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'Пожалуйста, войдите в систему, чтобы просмотреть корзину.';
}
?>


<a href="products.php" class="btn">Вернуться к товарам</a>
</body>
<?php include('footer.php'); ?>
</html>
