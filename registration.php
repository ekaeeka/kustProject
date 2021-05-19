<?php
session_start();
require_once 'connection.php';

$name = $_POST['name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_two = $_POST['password_two'];
$errors = [];
$user_id = $_SESSION['id'];
$_SESSION['name'];

if (!empty($_POST)) {

    if ((empty($name)) && empty($email) && empty($password)) {
        $errors[] = 'Не все данные введены';
    } else {
        if ((strlen($name) < 2)) {
            $errors[] = 'Имя слишком короткое';
        } else {
            if ($result = mysqli_query($connection, "SELECT id  FROM `user` WHERE email='$email'")->num_rows) {
                $errors[] = "Такая электронная почта уже зарегистрированна";
            } else {
                if (strlen($password) < 5) {
                    $errors[] = "Пароль ненадёжный!";
                } else {
                    if ($password === $password_two) {
                        $password = password_hash($password, PASSWORD_BCRYPT);

                        mysqli_query($connection, "INSERT INTO `user` (`id`, `name`, `email`, `password`, `type`) VALUES (NULL, '$name', '$email', '$password', 1)");

                        $ok = true;

                        header("Location: login.php");
                    } else {
                        $errors[] = "Пароли не совпадают";
                    }
                }
            }
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
    <title>Войдите или зарегистрируйтесь</title>
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
                <a href="registration.php"><img src="img/user.png" alt="" class="person"></a>
            </div>
            <div class="buy">
                <a href=""><img src="img/shopping-bag.png" alt="" class="bag"></a>
            </div>
        </div>
    </div>
</header>

<div class="forms-to-autorization">
    <form action="" method="post">
        <div class="autorization-form">
            <h2>Регистрация в системе</h2>
        </div>

        <label for="">Имя и фамилия</label>
        <input type="text" name="name" placeholder="Введите свое полное имя">
        <label for="">email</label>
        <input type="email" name="email" placeholder="Введите электронну почту">
        <label for=""> Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label for="">Подтверждение пароля</label>
        <input type="password" name="password_two" placeholder="Повторите пароль">

        <?php if ($errors): ?>
            <div class="errors">
                <?php
                foreach ($errors as $error) {
                    echo "<div class='error_message'>$error</div>";
                }
                ?>
            </div>
        <?php endif; ?>

        <button class="button-reg" type="submit" name="butt">Зарегистрироваться</button>
        <p>
            Уже есть аккаунт? - <a href="login.php">Войти</a>
        </p>
        <?php if ($ok): ?>
            <div class="page">
                <a href="login.php"></a>
            </div>
        <?php endif; ?>
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
                    <a href="contacts.html">Контакты</a><br></p>
            </div>
        </div>
    </div>
</section>
</body>
</html>


