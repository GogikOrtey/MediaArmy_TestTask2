<!DOCTYPE html>
<html lang="Ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Project</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Подключаем PHP файл -->
    <?php include 'main.php'; ?>
    <!-- <script src="stars.js"></script> -->
</head>
<body class="cards-page">
    <div class="header">
        <div class="button-bar">
            <button class="nav-button" onclick="window.location.href='1_SimplePage.php'">Стандартная страница</button>
            <button class="nav-button" onclick="window.location.href='2_TwinklingStars.php'">С мерцающими звёздами</button>
            <button class="nav-button" onclick="window.location.href='3_Cards.php'">В виде карточек</button>
        </div>
    </div>
    <!-- Динамически создающаяся таблица из массива php -->
    <div class="cards-area">
        <div class="card">
            <img src="your-image.jpg" alt="Card Image" class="card-img">
            <h2 class="card-title">Card Title</h2>
            <p class="card-text">This is a description text that fills the remaining space in the card.</p>
        </div>
        <div class="card">
            <img src="your-image.jpg" alt="Card Image" class="card-img">
            <h2 class="card-title">Card Title</h2>
            <p class="card-text">This is a description text that fills the remaining space in the card.</p>
        </div>
        <!-- <div class="card">
            <img src="your-image.jpg" alt="Card Image" class="card-img">
            <h2 class="card-title">Card Title</h2>
            <p class="card-text">This is a description text that fills the remaining space in the card.</p>
        </div>
        <div class="card">
            <img src="your-image.jpg" alt="Card Image" class="card-img">
            <h2 class="card-title">Card Title</h2>
            <p class="card-text">This is a description text that fills the remaining space in the card.</p>
        </div>
        <div class="card">
            <img src="your-image.jpg" alt="Card Image" class="card-img">
            <h2 class="card-title">Card Title</h2>
            <p class="card-text">This is a description text that fills the remaining space in the card.</p>
        </div> -->
    </div>
</body>
</html>
