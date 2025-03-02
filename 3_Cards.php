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
        <?php
            // Генерация карточек
            for ($i = 1; $i < count($data); $i++) {
                echo "<div class='card'>";

                    if($data[$i][1] == "-") {                    // Есть ли в массиве корректная ссылка?
                        // echo "<td class='center-column'>-</td>"; // Если нет
                        echo('<img src="' . $data[$i][1] . '" alt="Card Image" class="card-img">'); // Если есть
                    } else {
                        echo('<img src="' . $data[$i][1] . '" alt="Card Image" class="card-img">'); // Если есть
                    }
                    
                    echo('<h2 class="card-title">'.$data[$i][0].'</h2>');
                    echo('<p class="card-text">' . $data[$i][2] . '</p>');

                    echo('<a href="https://ya.ru/search/?text=Звезда%20' . $data[$i][0] . '%20интересные%20факты" target="_blank"');
                    echo('<button class="button-into-cards">Узнать подробнее</button>');
                    echo('</a>');

                echo "</div>";
            }
        ?>

        <!-- <div class="card">
            <img src="your-image.jpg" alt="Card Image" class="card-img">
            <h2 class="card-title">Card Title</h2>
            <p class="card-text">This is a description text that fills the remaining space in the card.</p>
            <button class="nav-button" onclick="window.location.href='https://ya.ru/search/?text=Запрос'">В виде карточек</button> 
            <a href="https://ya.ru/search/?text=Запрос%20123" target="_blank">    
                <button class="button-into-cards">Узнать подробнее</button>
            </a>
        </div> -->

        <!-- 

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
    <div class="spase-undo-sooter"></div>
</body>
</html>
