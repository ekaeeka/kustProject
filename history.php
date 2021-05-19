<?php
session_start();
require_once 'connection.php';

$user_id = (int)$_SESSION['id'];
$_SESSION['name'];
$errors = [];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>История музея</title>
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
                <li><a href="visitors.php">Посетителям</a></li>
                <li><a href="contacts.html">Контакты</a></li>
            </div>
            <div class="contact">
                <?php
                if ($user_id == null){
                    echo "<div> <a href='registration.php'><img src='img/user.png'  class='person'></a></div>";
                }else{
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

<section>
    <div class="container">
        <div class="block-2">
            <div class="head3">
                <h1>История дом-музея <br>
                    Бориса Михайловича Кустодиева</h1>
            </div>
        </div>
        <div class="history">
            <div class="part-one">
                <p>Дом – музей Б.М. Кустодиева <br>
                    был открыт 15 мая 2002 года.<br><br>
                    В 1873 году участок принадлежал купцу<br>
                    Конону Матвеевичу Моисееву.<br>
                    На нем располагался деревянный дом со службами.<br>
                    В 1883 году хозяину было выдано<br>
                    разрешение на постройку деревянного флигеля<br>
                    и лавки на каменном фундаменте.<br>
                    Через 4 года (в 1887г.) была разрешена пристройка<br>
                    к дому каменных двухэтажных служб и галереи.
                </p>
                <img src="img/dommuseum.png" alt="Дом" class="home-museum">
            </div>

            <div class="part-two">
                <img src="img/kust.png" alt="Картины Кустодиева" class="kust">

                <p>В начале ХХ века владение перешло к сыну купца<br>
                    Моисееву Ивану Кононовичу, которому в 1902 г.<br>
                    было выдано разрешение на постройку каменного<br>
                    двухэтажного дома с нежилым подвалом.<br>
                    По документам 1912г. известно, что в это время<br>
                    дом принадлежит купцу Злобину.<br>
                    Есть также информация о том,<br>
                    что в последние годы перед революцией 1917г.<br>
                    часть дома использовалась в качестве типографии.<br>
                </p>
            </div>

            <div class="part-three">

                <p>
                    Во дворе дома был построен деревянный флигель,<br>
                    в котором некоторое время проживала семья<br>
                    Кустодиевых (после 1900г. мать<br>
                    Екатерина Прохоровна.)<br>
                    В 1890 году в этом доме <br>
                    проживали также сестры Шавердовы –<br>
                    Александра и Надежда. Известно, что<br>
                    Александра Степановна была крестной матерью<br>
                    Бориса Кустодиева,<br>
                    которую он неоднократно навещал.<br>
                </p>

                <img src="img/mother.png" alt="Мама Бориса Михайловича" class="mother">
            </div>

            <div class="part-four">
                <img src="img/visiter.png" alt="Посетители" class="visit">

                <p>
                    С 1990г. силами местной реставрационной <br>
                    мастерской велись реставрационные работы<br>
                    дома, который поставлен на охрану<br>
                    как памятник истории.<br>
                    В 2002г. последние работы были проведены<br>
                    на средства организации «Астраханьгазпром».<br>
                    15 мая 2002г. музей открыл свои двери<br>
                    для посетителей.<br>
                </p>
            </div>
        </div>
    </div>
</section>

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
                    <a href="#">Афиша</a><br>
                    <a href="#">Посетителям</a><br>
                    <a href="#">Контакты</a><br></p>
            </div>
        </div>
    </div>
</section>
</body>
</html>
