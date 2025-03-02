<!DOCTYPE html>
<html lang="Ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Project</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Подключаем PHP файл -->
    <?php include 'main.php'; ?>
    <script src="stars.js"></script>
</head>
<body>
    <div class="header">
        <div class="button-bar">
            <button class="nav-button">Стандартная страница</button>
            <button class="nav-button">С мерцающими звёздами</button>
            <button class="nav-button">В виде карточек</button>
        </div>
    </div>
    <!-- Динамически создающаяся таблица из массива php -->
    <div class="mainTable table-from-stars">
        <p class="title-for-table">Таблица:</p>
        <table>
            <thead>
                <tr>
                    <?php
                        // В нулевом элементе массива хранятся заголовки из файла
                        echo "<th style='min-width: 150px; width: auto;'>" . $data[0][0] . "</th>";
                        echo "<th style='min-width: 100px; width: auto;' class='center-column'>" . $data[0][1] . "</th>";
                        echo "<th>" . $data[0][2] . "</th>";
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Генерация строк таблицы
                    for ($i = 1; $i < count($data); $i++) {
                        echo "<tr>";
                            echo "<td>" . $data[$i][0] . "</td>";
                            if($data[$i][1] == "-") {                    // Есть ли в массиве корректная ссылка?
                                echo "<td class='center-column'>-</td>"; // Если нет
                            } else {
                                echo "<td class='center-column'>" . 
                                "<a href='" . $data[$i][1] . "'>" . "Ссылка" . "</a></td>"; // Если есть
                            }
                            echo "<td>" . $data[$i][2] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Статичная таблица:
    <div class="mainTable">
        <p class="title-for-table">Таблица:</p>
        <table>
            <thead>
                <tr>
                    <th>Колонка 1</th>
                    <th>Колонка 2</th>
                    <th>Колонка 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Данные 1</td>
                    <td>Данные 2</td>
                    <td>Данные 3</td>
                </tr>
                <tr>
                    <td>Данные 4</td>
                    <td>Данные 5</td>
                    <td>Данные 6</td>
                </tr>
            </tbody>
        </table>
    </div> -->
</body>
</html>
