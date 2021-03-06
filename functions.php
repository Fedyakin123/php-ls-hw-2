<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 17.07.2017
 * Time: 13:03
 */


//Задание #1
//Функция должна принимать массив строк и выводить каждую строку в отдельном параграфе (тег <p>)
//Если в функцию передан второй параметр true, то возвращать (через return) результат в виде одной объединенной строки.

/**
 * @param $arr
 * @param bool|false $glued
 * @return string
 */
function task1($arr, $glued = false)
{
    $result = '';
    foreach ($arr as $string) {
        echo "<p>$string</p>";  //В любом случае выводим по строке

        if ($glued) {
            $result .= $string; //Клеим строку, в случае, если второй параметр true
        }
    }
    return $result;
}

//Задание #2
//
//Функция должна принимать 2 параметра:
//массив чисел;
//строку, обозначающую арифметическое действие,    которое нужно выполнить со всеми элементами массива.
//Функция должна вывести результат на экран.
//Функция должна обрабатывать любой ввод, в том числе некорректный и выдавать сообщения об этом

/**
 * @param $arr
 * @param $action
 * @return string
 */
function task2($arr, $action)
{

    $status = '';

    if (func_num_args() !== 2) {
        $status .= '<p>Ошибка: Неверное количество аргументов</p>'; // Проверяем на кол-во аргументов
    }
    if (!is_array($arr)) {
        $status .= '<p>Ошибка: Первый аргумент не является массивом</p>';
        //Проверяем, является ли первый аргумент массивом
    } else { //Если является, то посмотрим, являются ли его аргументы числами или строками содержащими числа
        foreach ($arr as $index => $value) {
            if (is_numeric($value)) {
                continue; //Если число - то перескакиваем на следующую итерацию
            }
            $status .= '<p>Ошибка: ' . ($index + 1) . '-й Элемент массива
            не является числом или строкой содержащей число</p>';
        }
    }
    if (!($action === '+' || $action === '-' || $action === '/' || $action === '*')) {
        //Корявая проверка арифметического действия, но что то лучше не придумалось. Наверное можно как то реализовать
        //используя регулярные выражения
        $status .= '<p>Ошибка: Неизвестное арифметическое действие</p>';
    }


    if ($status === '') {  //Если все ок, то считаем
        $result = $arr[0];
        foreach ($arr as $index => $value) {
            if (!$index) { //перескакиваем нулевой элемент массива, он уже присвоен
                continue;
            }
            switch ($action) {// можно было бы совместить с проверкой арифметического действия с помощью default,
            // но, кмк, лучше продиагностировать на ошибки до вычислений
                case '+':
                    $result += $value;
                    break;
                case '-':
                    $result -= $value;
                    break;
                case '/':
                    $result /= $value;
                    break;
                case '*':
                    $result *= $value;
                    break;
            }
        }
        echo $result;
        $status = '<p>Successfully done!</p>';
    }
    return $status;
}

//
//Задание #3
//
//Функция должна принимать переменное число аргументов.
//Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие,
// которое необходимо выполнить со всеми передаваемыми аргументами.
//Остальные аргументы это целые и/или вещественные числа.
//
//Пример вызова: calcEverything(‘+’, 1, 2, 3, 5.2);
//Результат: 1 + 2 + 3 + 5.2 = 11.2


/**
 * @param $action
 * @return mixed|string
 */
function task3($action)
{
    if (func_num_args() >=3) {
        //Проверяем действие и что аргументов больше трех, т.е. даны 2 или больше чисел

        $result = func_get_arg(1);
        for ($i = 1; $i < func_num_args(); $i++) { //Думаю такой цикл удобнее чтобы проскочить нулевой аргумент
            if (gettype(func_get_arg($i)) === 'double' || gettype(func_get_arg($i)) === 'integer') {
                //проверяем, что аргументы - числа
                if ($i === 1) {//перескакиваем первый аргумент, он уже присвоен. Корявый момент, но лучше не придумалось
                    continue;
                }
                switch ($action) {
                    case '+':
                        $result += func_get_arg($i);
                        break;
                    case '-':
                        $result -= func_get_arg($i);
                        break;
                    case '/':
                        $result /= func_get_arg($i);
                        break;
                    case '*':
                        $result *= func_get_arg($i);
                        break;
                    default:
                        return '<p>Error. Wrong action.</p>';
                }
            } else {
                return '<p>Error. Wrong argument</p>';
            }
        }
    } else {
        return '<p>Error. Not enough arguments</p>';
    }
    return $result;
}

//Задание #4
//
//Функция должна принимать два параметра – целые числа.
//Если в функцию передали 2 целых числа, то функция должна отобразить таблицу умножения размером
// со значения параметров, переданных в функцию. (Например если передано 8 и 8,
// то нарисовать от 1х1 до 8х8). Таблица должна быть выполнена с использованием тега <table>
// В остальных случаях выдавать корректную ошибку.

/**
 * @param $row
 * @param $col
 * @return string
 */
function task4($row, $col)
{
    if (gettype($row) === 'integer' && gettype($col) === 'integer' && $row > 0 && $col > 0) { //Проверяем на тип и на
        //положительность

        echo '<table border="1" cellpadding="5">';

        for ($i = 1; $i <= $row; $i++) {
            echo '<tr>';
            for ($j = 1; $j <= $col; $j++) {
                echo '<td>' . $i * $j . '</td>';
            }
            echo '</tr>';
        }

        echo '</table>';
    } else {
        return '<p>Error: Wrong args</p>';
    }
    return '<p>Successfully done!</p>';
}


//Задание #5
//
//Написать две функции.
//Функция №1 принимает 1 строковый параметр и возвращает true, если строка является палиндромом*,
// false в противном случае. Пробелы и регистр не должны учитываться.
//Функция №2 выводит сообщение в котором на русском языке оговаривается результат из функции №1

/**
 * @param $string
 * @return bool
 */
function isPalindrome($string)
{
    $prepared_string = mb_strtoupper(str_replace(' ', '', $string)); //Вырезаем пробелы и засовываем в один регистр

    for ($i = 0, $j = mb_strlen($prepared_string) - 1; $i <= (mb_strlen($prepared_string) / 2),
         $j >= (mb_strlen($prepared_string) / 2); $i++, $j--) {
        //i растет от 0 до половины длины, j уменьшается от длины до половины, работает нормально на строках и с четным
        //и с нечетным кол-вом символов
        if (!($prepared_string[$i] === $prepared_string[$j])) { // если где то символы не равны - возвращаем false
            return false;
        }
    }
    return true; // Выполняется, если ни разу не выполнилось условие if
}

function task5($string)
{
    if (isPalindrome($string)) {
        echo "<p>Строка \'$string\' является палиндромом </p>";
    } else {
        echo "<p>Строка \'$string\' - не палиндром!</p>";
    }
}

//Задание #6 (выполняется после вебинара “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
//
//Выведите информацию о текущей дате в формате 31.12.2016 23:59
//Выведите unixtime время соответствующее 24.02.2016 00:00:00.

/**
 *
 */
function task6()
{
    echo date('d.m.Y H:i') . '<br />' . mktime(00, 00, 00, 02, 24, 2016) . '<br />';
}



//Задание #7 (выполняется после вебинара “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
//Дана строка: “Карл у Клары украл Кораллы”. удалить из этой строки все заглавные буквы “К”.
//Дана строка “Две бутылки лимонада”. Заменить “Две”, на “Три”. По желанию дополнить задание.

/**
 *
 */
function task7()
{
    echo preg_replace('|К|', '', 'Карл у Клары украл Кораллы') . '<br />' .
        preg_replace('|Две|', 'Три', 'Две бутылки лимонада');
}


//Задание #8 (выполняется после вебинара “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
//Напишите функцию, которая с помощью регулярных выражений,
// получит информацию о переданных RX пакетах из переданной строки:
//Пример строки: “RX packets:950381 errors:0 dropped:0 overruns:0 frame:0. “
//Если кол-во пакетов более 1000, то выдавать сообщение: “Сеть есть”
//Если в переданной в функцию строке есть “:)”, то нарисовать смайл в ASCII и не выдавать сообщение из пункта №3.
// Смайл должен храниться в отдельной функции


/**
 * @param $string
 * @return string
 */
function task8($string)
{
    if (!preg_match('/:\)/', $string)) { //проверяем есть ли смайл
        preg_match('/packets:(?<packets>(\d*))/i', $string, $match); //С помощью кармана выдергиваем число пакетов
        if ($match['packets'] > 1000) { // Ну тут все понятно
            return 'Сеть есть!';
        }
        return 'Сети нету :(';
    } else {
        return smile();
    }
}

function smile()
{
    return '<pre>
                          oooo$$$$$$$$$$$$oooo
                      oo$$$$$$$$$$$$$$$$$$$$$$$$o
                   oo$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$o         o$   $$ o$
   o $ oo        o$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$o       $$ $$ $$o$
oo $ $ "$      o$$$$$$$$$    $$$$$$$$$$$$$    $$$$$$$$$o       $$$o$$o$
"$$$$$$o$     o$$$$$$$$$      $$$$$$$$$$$      $$$$$$$$$$o    $$$$$$$$
  $$$$$$$    $$$$$$$$$$$      $$$$$$$$$$$      $$$$$$$$$$$$$$$$$$$$$$$
  $$$$$$$$$$$$$$$$$$$$$$$    $$$$$$$$$$$$$    $$$$$$$$$$$$$$  """$$$
   "$$$""""$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$     "$$$
    $$$   o$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$     "$$$o
   o$$"   $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$       $$$o
   $$$    $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$" "$$$$$$ooooo$$$$o
  o$$$oooo$$$$$  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$   o$$$$$$$$$$$$$$$$$
  $$$$$$$$"$$$$   $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$     $$$$""""""""
 """"       $$$$    "$$$$$$$$$$$$$$$$$$$$$$$$$$$$"      o$$$
            "$$$o     """$$$$$$$$$$$$$$$$$$"$$"         $$$
              $$$o          "$$""$$$$$$""""           o$$$
               $$$$o                                o$$$"
                "$$$$o      o$$$$$$o"$$$$o        o$$$$
                  "$$$$$oo     ""$$$$o$$$$$o   o$$$$""
                     ""$$$$$oooo  "$$$o$$$$$$$$$"""
                        ""$$$$$$$oo $$$$$$$$$$
                                """"$$$$$$$$$$$
                                    $$$$$$$$$$$$
                                     $$$$$$$$$$"
                                      "$$$""""
                                      </pre>';
}


//Задание #9 (выполняется после вебинара “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
//
//Создайте средствами ОС файл test.txt и поместите в него текст “Hello, world”
//Напишите функцию, которая будет принимать имя файла, открывать файл и выводить содержимое на экран.

/**
 * @param $filename
 * @return string
 */
function task9($filename)
{
    return file_get_contents($filename);
}

//Задание #10 (выполняется после вебинара “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
//
//Создайте файл anothertest.txt средствами PHP. Поместите в него текст - “Hello again!”

/**
 * @param $name
 * @param $string
 * @return string
 */
function task10($name, $string)
{
    $file =  fopen($name, 'a+'); //режим дописывания в файл
    fwrite($file, $string);
    fclose($file);
    return file_get_contents($name);
}
