<?php
// echo "Привет, мир!\n";

// Тематика - звёзды
// Сгенерируем ~ 20 записей, а также найдём для них ссылки на изображения

// $mass1 = ["1", "2", "3"];

// // echo $mass1;
// print_r($mass1);











// Определяем путь к файлу
// $file = 'DataBase.csv';
$file = 'DataBase_damaged.csv';

// Проверяем, существует ли файл
if (!file_exists($file)) {
    die("Файл не найден.");
}

// Открываем файл для чтения
$handle = fopen($file, 'r');

if ($handle === false) {
    die("Не удалось открыть файл.");
}

// Устанавливаем разделитель табуляции
$separator = "\t";

// Стандартное количество колонок а записи
$expectedColumns = 3;

// Печатаем ли мы ошибки, произошедшие в результате обработки строк?
$isEchoErrors = true;

// Количество ошибок, возникших при загрузке значений из входного файла
$encounteredErrorsCounter = 0;

// Общее количество загруженных строк
$allCounterForStr = 0;

// Массив для хранения данных
$data = [];

// Читаем файл строка за строкой 
while (($row = fgetcsv($handle, 0, $separator)) !== false) {
    // print_r($row);

    $allCounterForStr++;

    if (count($row) !== $expectedColumns) {
        if($isEchoErrors) {
            echo "Ошибка: Неправильное количество колонок в строке:\n"; 
        }
        print_r($row);
        $encounteredErrorsCounter++;
        continue;
    }

    // Проверяем, не пустые ли значения в колонках
    foreach ($row as $index => $value) {
        if (empty($value)) {
            if($isEchoErrors) {
                echo "Ошибка: Пустое значение в строке:\n";
            }
            print_r($row);
            $encounteredErrorsCounter++;
            continue 2; // Пропускаем строку
        }
    }

    $data[] = $row;
}

// Важно не забывать, что первый элемент массива содержит заголовки строк, а не данные

// Закрываем файл
fclose($handle);

// Выводим массив
print_r($data);

if($encounteredErrorsCounter > 0) {
    echo("\nКоличество ошибок, произошедших при загрузке данных из входного файла: $encounteredErrorsCounter");
}

$resultCountLoadDataStr = $allCounterForStr - 1 - $encounteredErrorsCounter;
// -1, потому что первая запись - это заголовки строк

echo("\n\nОбщее количество загруженных записей: $resultCountLoadDataStr");


















