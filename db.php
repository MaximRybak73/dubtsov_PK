<?php
define('DB_HOST', 'localhost'); //Адрес
define('DB_USER', 'rybolocl_fishing'); //Имя пользователя
define('DB_PASSWORD', 'AlmaZ2207205'); //Пароль
define('DB_NAME', 'rybolocl_fishing'); //Имя БД



try {
    $mysql = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
} catch (Exception) {

    die("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    exit();

}



?>