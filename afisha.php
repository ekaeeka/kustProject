<?php
session_start();
require_once 'connection.php';

$user_id = (int)$_SESSION['id'];
$_SESSION['name'];
$errors = [];
$_SESSION['type'];
$img = $_FILES['img'];
$datetime = date('Y-m-d H:i:s', time());
$name = $_POST['name'];
$text = $_POST['text'];

if (!empty($_POST))

    if (empty($name) || empty($img) || empty($text)) {
        $errors[] = "Не все данные введены";
    } else {
        if (($img['type'] === 'image/jpeg') || ($img['type'] === 'image/bmp') || (($img['type'] === 'image/png') || (($img['type'] === 'image/jpg')))) {
            if (!$img['error']) {

                if ($_SESSION['type'] == 1) {
                    $errors[] = 'Вы не можете доавлять новости';
                } else {
                    $imgName = $img['name'];
                    $result = mysqli_query($connection, "INSERT INTO `news`(`id`, `name`, `img`, `text`, `date`) VALUES (NULL ,'$name','$imgName','$text','$datetime')");
//                    var_dump(mysqli_error($connection));
                    if ($result) {
                        move_uploaded_file($img['tmp_name'], 'upload_img/' . $img['name']);
                    }
                }
            } else {
                $errors[] = "Ошибка при добавлении фотографии";
            }
        }else{
            $errors[]="Формат фотографии не подходит";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>Афиша</title>
</head>
<body>
<header id="bg-header">
    <div class="container">
        <div class="header-content">
            <div class="logo">
                <img src="img/logo.png" alt="Дом-музей Кустодиева" class="picture">
            </div>
            <div class="menu">
                <li><a href="index.php">Главная</a></li>
                <li><a href="history.php">История</a></li>
                <li><a href="afisha.php">Афиша</a></li>
                <li><a href="visitors.html">Посетителям</a></li>
                <li><a href="contacts.html">Контакты</a></li>
            </div>
            <div class="contact">
                <?php
                if ($user_id == null) {
                    echo "<div> <a href='registration.php'><img src='img/user.png'  class='person'></a></div>";
                } else {
                    echo "<div class='logout-button'>
                    <a href='session_stop.php' class='logout'>Выйти</a>
                </div>";
                }

                ?>
            </div>
            <div class="buy">
                <a href=""><img src="img/shopping-bag.png" alt="" class="bag"></a>
            </div>
        </div>
    </div>
</header>


<?php
if ($_SESSION['type'] == 2) {
    echo " <section>
    <div class='add-news'>
        <form action='' method='post'>
            <h1>Добавление новостей</h1>
            <label for=''>Заголовок</label>
            <input type='text' name='name' placeholder='Введите название'>
            <label>Прикрепите фотографию</label><br>
            <input type='file' name='img' value='Прикрепить'><br>
            <label for=''>Текст</label>
            <input type='text' name='text' placeholder='Введите текст'>

            <button type='submit' name='add' class='button-add'>Добавить</button>
        </form>
    </div>
</section>";
}
?>

<?php if ($errors): ?>
    <div class="errors">
        <?php
        foreach ($errors as $error) {
            echo "<div class='error_message'>$error</div>";
        }
        ?>
    </div>

<?php endif; ?>
</body>
</html>