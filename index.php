<?php
session_start();
$title = "RybolovClub73";
$current_page = 'home';
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Сайт рыболовного магазина">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="images/icon.webp" rel="shortcut icon" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Macondo:regular" rel="stylesheet">
    <title>
        <?php echo $title; ?>
    </title>
    <style>
        .slideshow-container {
            width: 100%;
            max-width: 600px;
            height: 400px;
            position: relative;
            margin: auto;
            overflow: hidden;
        }

        .slide-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
            transition: opacity 1s ease-in-out;
        }

        .active {
            display: block;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <nav class="nav">
                <div class="text">RybolovClub73</div>
                <ul>
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                        <li><a href="index.php">Главная</a></li>
                        <li><a href="autentification.php">Войти</a></li>
                        <li><a href="products.php">Магазин</a></li>
                        <li><a href="infoFish.php">Факты о рыбе</a></li>
                        <li><a href="basket.php">Моя корзина</a></li>
                        <li><a href="feedback.php">Обратная связь</a></li>
                        <li><a href="logout.php">Выход</a></li>
                    <?php else: ?>
                        <li><a href="index.php">Главная</a></li>
                        <li><a href="autentification.php">Войти</a></li>
                        <li><a href="products.php">Магазин</a></li>
                        <li><a href="infoFish.php">Факты о рыбе</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
    <br>
    <div class="slideshow-container">
        <img class="slide-image" src="images/shop1.webp" alt="Фото рыболовного магазина">
        <img class="slide-image" src="images/shop3.webp" alt="Фото рыболовного магазина">
        <img class="slide-image" src="images/shop2.webp" alt="Фото рыболовного магазина">
    </div>

    <div class="main_text" style="margin-left: 15px;">
        <br>
        <h3>Добро пожаловать на сайт рыболовного магазина RybolovClub73!</h3>
        <h3>На нашем сайте вы можете приобрести рыболовные снасти, приманки и товары для кемпинга.</h3>
    </div>
    <table>
        <caption><h4>На что ловить в зависимости от реки в Ульяновске:</h4></caption>
        <tr>
            <th>Река</th>
            <th>Вид удилища</th>
        </tr>
        <tr>
            <td>Волга</td>
            <td>Фидер, спиннинг</td>
        </tr>
        <tr>
            <td>Свияга</td>
            <td>Телескопическая удочка, донка</td>
        </tr>
        <tr>
            <td>Сельд</td>
            <td>Фидер, телескопическая удочка</td>
        </tr>
        <tr>
            <td>Барыш</td>
            <td>Маховое удилище, спиннинг</td>
        </tr>
    </table>

    <?php include "footer.php"; ?>

    <script>
        let slideIndex = 0;
        const slides = document.getElementsByClassName("slide-image");

        function showSlides() {
            for (let i = 0; i < slides.length; i++) {
                slides[i].classList.remove("active");
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            slides[slideIndex - 1].classList.add("active");
            setTimeout(showSlides, 3000);
        }

        showSlides();
    </script>
</body>

</html>