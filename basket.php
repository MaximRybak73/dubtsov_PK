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

    if (isset($_POST['products']) && is_array($_POST['products'])) {
        foreach ($_POST['products'] as $product_id) {
            $query = "INSERT INTO basket (user_id, product_id) VALUES ($user_id, $product_id)";
            mysqli_query($mysql, $query);
        }
    }

    // Обработка запроса на удаление товара из корзины
    if (isset($_POST['delete_basket_id'])) {
        $delete_basket_id = $_POST['delete_basket_id'];
        $delete_query = "DELETE FROM basket WHERE id = $delete_basket_id";
        mysqli_query($mysql, $delete_query);
    }
    

    $query = "SELECT basket.id as basket_id, termsproducts.id, termsproducts.name, termsproducts.definition, termsproducts.img 
          FROM basket 
          JOIN termsproducts ON basket.product_id = termsproducts.id 
          WHERE basket.user_id = $user_id";
    $result = mysqli_query($mysql, $query);
    if (mysqli_num_rows($result) >= 1) {

        echo '<br><h2 style="text-align: center; margin-left: 15px;">Моя корзина</h2>';
        echo '<table>';
        echo '<tr><th>Товар</th><th>Описание</th><th>Изображение</th><th>Действие</th></tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['definition'] . '</td>';
            echo '<td><img src="Data/img/' . $row['img'] . '" alt="' . $row['name'] . '" /></td>';
            echo '<td>';
            echo '<form method="post" action="basket.php">';
            echo '<input type="hidden" name="delete_basket_id" value="' . $row['basket_id'] . '">';
            echo '<button type="submit">Удалить</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }        
        echo '</table>';
    } else {
        echo '<h3 style="margin-left: 15px; margin-top: 15px; margin-bottom: 15px;">Вы не добавили ни одного товара в корзину.</h3>';
    }
} else {
    echo 'Пожалуйста, войдите в систему, чтобы просмотреть корзину.';
}
?>


<a href="products.php" class="btn">Вернуться к товарам</a><br><br><br><br><br><br><br><br><br><br><br>
</body>
<?php include('footer.php'); ?>

</html>