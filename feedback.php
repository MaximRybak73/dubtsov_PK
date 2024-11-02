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
                    <a href="index.php">Назад</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<?php
$title = "RybolovClub73";
$current_page = 'feedback';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <link href="forFeedback.css " rel="stylesheet" type="text/css" />
    <link href="images/icon.webp" rel="shortcut icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Macondo:regular" rel="stylesheet" />
    <title><?php echo $title ?></title>
</head>

<body>
<form action="feedback.php" method="post" enctype="multipart/form-data">
    <label for="FIO">Введите ФИО:</label>
    <input type="text" placeholder="ФИО" id="FIO" name="FIO"><br><br>

    <label for="Email">Введите Email:</label>
    <input type="text" placeholder="Email" id="Email" name="Email"><br>

    <label>Откуда узнали о нас?</label>
    <label><input type="radio" name="source" value="Социальные сети">Социальные сети</label>
    <label><input type="radio" name="source" value="От друзей">От друзей</label>
    <label><input type="radio" name="source" value="Реклама">Реклама</label>
    <br>

    <label>Выберите тип обращения:</label>
    <select name="type">
        <option>---</option>
        <option value="Жалоба">Жалоба</option>
        <option value="Предложение">Предложение</option>
    </select><br><br>

    <textarea placeholder="Введите текст сообщения:" name="message" style="margin-left:15px; "></textarea><br><br>

    <input type="file" name="file"><br><br>

    <label for="checkbox">Даю согласие на обработку персональных данных:</label>
    <input type="checkbox" name="consent" value="1"><br><br>
    <input type="submit" value="Отправить">
</form>

    <?php include('footer.php');?>
</body>
</html>

<?php
session_start();
include("db.php"); // Подключение к базе данных

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $FIO = mysqli_real_escape_string($mysql, $_POST['FIO']);
    $Email = mysqli_real_escape_string($mysql, $_POST['Email']);
    $source = mysqli_real_escape_string($mysql, $_POST['source']);
    $type = mysqli_real_escape_string($mysql, $_POST['type']);
    $message = mysqli_real_escape_string($mysql, $_POST['message']);
    $consent = isset($_POST['consent']) ? 1 : 0;
    
    $file_path = null;
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $upload_dir = 'uploads/';
        $file_name = basename($_FILES['file']['name']);
        $target_file = $upload_dir . $file_name;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            $file_path = $target_file;
        }
    }

    $query = "INSERT INTO feedback (FIO, Email, source, type, message, file_path, consent) 
              VALUES ('$FIO', '$Email', '$source', '$type', '$message', '$file_path', '$consent')";

    if (mysqli_query($mysql, $query)) {
        echo "Ваше сообщение успешно отправлено!";
    } else {
        echo "Ошибка: " . mysqli_error($mysql);
    }
}
?>
