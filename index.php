<?php
session_start();
require_once 'connection.php';

$user_id = (int)$_SESSION['id'];
$_SESSION['name'];
$errors = [];
$_SESSION['type'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>Дом - музей Б.М.Кустодиева</title>
</head>
<body>
<header class="header">
    <div class="container">
        <div class="header-content">
            <div class="logo">
                <img src="img/logo.png" alt="Дом-музей Б.М. Кустодиева" class="picture">
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
                    echo "<div> <a href='login.php'><img src='img/user.png'  class='person'></a></div>";
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
        <div class="heading">

            <?php
            if ($_SESSION['type'] == 2) {
                echo "<div class='button-for-admin'><a href=''>Редактировать сайт</a></div>";
            }
            ?>

            <div class="head1">
                <h1>Дом-Музей<br>Бориса Михайловича Кустудиева</h1>
                <h2>1878 - 1927</h2>
            </div>
            <div class="head2">
                <h3>Погрузитесь во времена жизни и творчества<br>
                    великого российского и советского художника Бориса Кустодиева</h3>
            </div>
        </div>
    </div>
</header>
<section class="bg-sec-slider">
    <div class="container">
        <div class="block-2">
            <div class="head3">
                <h1>Фотографии музея</h1>
            </div>
            <div class="slider">
                <div class="item">
                    <img src="img/3-kopiya.jpg" alt="" class="picture-mus">
                </div>

                <div class="item">
                    <img src="img/72-kopiya.jpg" alt="" class="picture-mus">
                </div>

                <div class="item">
                    <img src="img/124544231.jpg" alt="" class="picture-mus">
                </div>

                <div class="item">
                    <img src="img/visiter.png" alt="" class="picture-mus">
                </div>

                <div class="item">
                    <img src="img/dommuseum.png" alt="" class="picture-mus">
                </div>

                <div class="item">
                    <img src="img/kust.png" alt="" class="picture-mus">
                </div>

                <a class="prev" onclick="minusSlide()"><img src="img/prev.png" alt="" class="arrow-1"></a>
                <a class="next" onclick="plusSlide()"><img src="img/next.png" alt="" class="arrow-2"></a>
            </div>

            <div class="slider-dots">
                <span class="slider-dots_item" onclick="currentSlide(1)"></span>
                <span class="slider-dots_item" onclick="currentSlide(2)"></span>
                <span class="slider-dots_item" onclick="currentSlide(3)"></span>
                <span class="slider-dots_item" onclick="currentSlide(4)"></span>
                <span class="slider-dots_item" onclick="currentSlide(5)"></span>
                <span class="slider-dots_item" onclick="currentSlide(6)"></span>
            </div>
            <script src="js/main.js"></script>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="block-3">
            <div class="about-painter">
                <div class="photo-Kustodiev">
                    <img src="img/big-person-15640983711.jpg" alt="" class="pic-kust">
                </div>
                <div class="text-about-painter">
                    <div class="heading-about">
                        <h2>Борис Кустодиев</h2>
                    </div>

                    <div class="about">
                        <p><br>
                            Борис Михайлович Кустодиев (23 февраля <br> 1878, Астрахань — <br>
                            26 мая 1927, Ленинград) - <br>
                            художник, запечатлевший на своих ярких<br>
                            и жизнерадостных полотнах сцены <br> русских будней
                            и праздников.<br>
                            Любил жанр портрета-картины,<br>
                            когда характер героя раскрывается через<br>
                            окружающий его пейзаж, интерьер<br>
                            или даже служащую фоном жанровую сцену.
                            <br>
                        </p>
                    </div>
                </div>
            </div>
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
                    <a href="afisha.php">Афиша</a><br>
                    <a href="visitors.html">Посетителям</a><br>
                    <a href="#">Контакты</a><br></p>
            </div>
        </div>
    </div>
</section>
</body>
</html>