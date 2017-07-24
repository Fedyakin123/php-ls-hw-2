<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 17.07.2017
 * Time: 13:16
 */
require_once('functions.php');

//echo '<p>============= Задание 1 ================</p>';
//
//
//$str_arr = ['blablabla', '123123123', 'bobcat', 'sequence']; //тестовый массив строк
//echo task1($str_arr, true); // сразу проверим со склееной строкой.
//
//
//echo '<p>============= Задание 2 ================</p>';
//
//
//echo task2([1, 'SDFSDF', 'sdfsd', '3454353', 'ADF'], '+sd', 5); // Проверим на обнаружение ошибок
//echo '<p>======</p>';
//echo task2([1, 4, 5, 6], '*'); // Проверим без ошибок
//
//
//echo '<p>============= Задание 3 ================</p>';
//
//echo task3('*', 1, 2, 3, 5.2);
//
//echo '<p>============= Задание 4 ================</p>';
//
//echo task4(15, 21);

//echo '<p>============= Задание 5 ================</p>';
//
//$palindrome = 'QWE rty   YTr    EWQ';
//task5($palindrome);
//echo '<p>============= Задание 6 ================</p>';
//task6();
//echo '<p>============= Задание 7 ================</p>';
//task7();
//echo '<p>============= Задание 8 ================</p>';
//$packets_str = 'RX packets:950381 errors:0 dropped:0 overruns:0 frame:0. ';
//$packets_str_smile = 'RX packets:950381 errors:0 dropped:0 overruns:0 frame:)0. ';
//
//echo 'Смайла нету: <br />' . task8($packets_str);
//echo '<p>==========================</p>';
//echo 'Смайл есть: <br />' . task8($packets_str_smile);
//echo '<p>============= Задание 9 ================</p>';
//$filename = './test.txt';
//echo task9($filename);
//echo '<p>============= Задание 10 ================</p>';
$test_file = "anothertest.txt";
$test_string = 'Hello again <br />';
echo task10($test_file, $test_string);
