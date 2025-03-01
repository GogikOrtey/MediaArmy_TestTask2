<?php

// Тематика - звёзды
// Сгенерируем ~ 20 записей, а также найдём для них ссылки на изображения










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

// Печатаем ли мы ошибки, произошедшие в результате обработки строк?
$isEchoErrors = true;

// Количество ошибок, возникших при загрузке значений из входного файла
$encounteredErrorsCounter = 0;

// Общее количество загруженных строк
$allCounterForStr = 0;

// Массив для хранения данных
$data = [];

while (($row = fgetcsv($handle, 0, $separator)) !== false) {
    $allCounterForStr++;

    // Проверяем значения в колонках и заменяем пустые на "-"
    foreach ($row as $index => $value) {
        if (empty($value)) {
            $row[$index] = "-";
            if ($isEchoErrors) {
                echo "Ошибка: Пустое значение заменено на '-' в строке:\n";
            }
            print_r($row);
            $encounteredErrorsCounter++;
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


















