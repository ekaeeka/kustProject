<?php
session_start();
require_once 'connection.php';

$errors = [];
$email = $_POST['email'];
$password = $_POST['password'];

$user_id = (int)$_SESSION['id'];
$_SESSION['name'];
$_SESSION['type'];

if (isset($_POST['button'])) {
    if ((empty($_POST['email']) || empty($_POST['password']))) {
        $errors[] = 'Не все данные введены';
    } else {
        $result = mysqli_query($connection, "SELECT * FROM `user` WHERE email='$email'")->fetch_assoc();

        if (!empty($result)) {
            if (password_verify($_POST['password'], $result['password'])) {
                $_SESSION['name'] = $result['name'];
                $_SESSION['id'] = $result['id'];
                $_SESSION['type']=$result['type'];

                $ok = true;

                header('Location: index.php');
            } else {
                $errors[] = "Неверный пароль";
            }
        } else {
            $errors[] = "Такого пользователя не существует";
        }
    }
}

?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
        <title>Авторизация</title>
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
                    <li><a href="">Контакты</a></li>
                </div>
                <div class="contact">
                    <a href="registration.php"><img src="img/user.png" alt="" class="person"></a>
                </div>
                <div class="buy">
                    <a href=""><img src="img/shopping-bag.png" alt="" class="bag"></a>
                </div>
            </div>
        </div>
    </header>

    <div class="forms-to-enter">

        <form action="" method="post">

            <div class="head-enter">
                <h2>Вход в систему</h2>
            </div>

            <label for="">Адрес электронной почты</label>
            <input type="email" name="email" placeholder="Введите логин">
            <label for="">Пароль</label>
            <input type="password" name="password" placeholder="Введите пароль">

            <?php if ($errors): ?>
                <div class="errors">
                    <?php
                    foreach ($errors as $error) {
                        echo "<div class='error_message'>$error</div>";
                    }
                    ?>
                </div>
            <?php endif; ?>

            <button class="button-log" name="button" type="submit">Войти</button>

            <?php if ($ok): ?>
                <div class="page">
                    <a href="index.php"></a>
                </div>
            <?php endif; ?>

            <p>
                У вас нет аккаунта? - <a href="registration.php">зарегистрируйтесь!</a>
            </p>
        </form>
    </div>

    <section id="block-footer">
        <div class="container">
            <div class="footer">
                <div class="logo-footer">
                    <img src="img/logo.png" alt="Дом-музей Б.М. Кустодиева" class="picture">
                </div>
                <div class="social">
                    <img src="img/vk.png" alt="#" class="vk">
                    <img src="img/instagram.png" alt="#" class="inst">
                    <img src="img/youtube.png" alt="#" class="youtube">
                </div>

                <div class="contact">
                    <p><span class="size">Контакты</span>
                        <br>
                        г.Астрахань
                        <br>
                        Ул.Калинна,26
                        <br>
                        8(851) 251-16-29</p>
                </div>

                <div class="links">
                    <p><span class="size">Ссылки</span><br>
                        <a href="index.php">Главная</a><br>
                        <a href="history.php">История</a><br>
                        <a href="afisha.php">Афиша</a><br>
                        <a href="visitors.html">Посетителям</a><br>
                        <a href="#">Контакты</a><br></p>
                </div>
            </div>
        </div>
    </section>
    </body>
    </html>


<?php
