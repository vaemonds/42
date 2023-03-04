<?php

namespace App;

class TimeToWordConverter implements TimeToWordConvertingInterface
{
    private array $arr1;
    private array $arr2;
    private array $arr3;
    private array $arr4;
    private array $arr5;

    public function __construct() {
        $this->arr1 = array(
            0 => array(
                0 => 'час',
                1 => 'часа',
                2 => 'часов'
            ),
            1 => array(
                0 => 'минута',
                1 => 'минуты',
                2 => 'минут',
            )
        );
        $this->arr2 = array(
            0 => array(
                1 => 'Один',         // 1
                2 => 'Два',          // 2
                3 => 'Три',          // 2
                4 => 'Четыре',       // 2
                5 => 'Пять',         // 3
                6 => 'Шесть',        // 3
                7 => 'Семь',         // 3
                8 => 'Восемь',       // 3
                9 => 'Девять',       // 3
                10 => 'Десять',      // 3
                11 => 'Одиннадцать', // 3
                12 => 'Двенадцать'   // 3
            ),
            1 => array(
                1 => 'Один',         // 1
                2 => 'Два',          // 2
                3 => 'Три',          // 2
                4 => 'Четыре',       // 2
                5 => 'Пять',         // 3
                6 => 'Шесть',        // 3
                7 => 'Семь',         // 3
                8 => 'Восемь',       // 3
                9 => 'Девять',       // 3
                10 => 'Десять',      // 3
                11 => 'Одиннадцать', // 3
                12 => 'Двенадцать'   // 3
            )
        );
        $this->arr3 = array(
            1 => 'часа',
            2 => 'двух',
            3 => 'трёх',
            4 => 'четырёх',
            5 => 'пяти',
            6 => 'шести',
            7 => 'семи',
            8 => 'восьми',
            9 => 'девяти',
            10 => 'десяти',
            11 => 'одиннадцати',
            12 => 'двенадцати'
        );
        $this->arr4 = array(
            1 => 'Одна минута',             // 0
            2 => 'Две минуты',              // 1
            3 => 'Три минуты',              // 1
            4 => 'Четыре минуты',           // 1
            5 => 'Пять минут',              // 2
            6 => 'Шесть минут',             // 2
            7 => 'Семь минут',              // 2
            8 => 'Восемь минут',            // 2
            9 => 'Девять минут',            // 2
            10 => 'Десять минут',           // 2
            11 => 'Одиннадцать минут ',     // 2
            12 => 'Двенадцать минут',       // 2
            13 => 'Тринадцать минут',       // 2
            14 => 'Четырнадцать минут',     // 2
            15 => 'Четверть',               // -
            16 => 'Шестнадцать минут',      // 2
            17 => 'Семнадцать минут',       // 2
            18 => 'Восемнадцать минут',     // 2
            19 => 'Девятнадцать минут',     // 2
            20 => 'Двадцать минут',         // 2
            21 => 'Двадцать одна минут',    // 2
            22 => 'Двадцать две минут',     // 2
            23 => 'Двадцать три минут',     // 2
            24 => 'Двадцать четыре минут',  // 2
            25 => 'Двадцать пять минут',    // 2
            26 => 'Двадцать шесть минут',   // 2
            27 => 'Двадцать семь минут',    // 2
            28 => 'Двадцать восемь минут',  // 2
            29 => 'Двадцать девять минут',  // 2
            30 => 'Половина'                // -
        );
        $this->arr5 = array(
            1 => 'первого',
            2 => 'второго',
            3 => 'третьего',
            4 => 'четвертого',
            5 => 'пятого',
            6 => 'шетого',
            7 => 'седьмого',
            8 => 'восьмого',
            9 => 'девятого',
            10 => 'десятого',
            11 => 'одиннадцатого',
            12 => 'двенадцатого'
        );
    }

    public function convert(int $hours, int $minutes): string
    {
        $result = 'Некорректные данные' . PHP_EOL;
        if (($hours > 12 || $hours < 1 || !is_numeric($hours)) || ((int)$minutes > 59 || (int)$minutes < 0 || !is_numeric($minutes))) {
            print_r($result);
            die;
        }

        $zero_num_after = '';
        $zero_num_before = '';
        if((int)$minutes == 0) {
            $zero_num_after = '0';
        } else if((int)$minutes < 10) {
            $zero_num_before = '0';
        }

        if ((int)$minutes == 0) { // If null minutes
            if ((int)$hours == 1) {
                $hours_text = $this->arr1[0][0];
            } elseif ((int)$hours >= 2 && (int)$hours < 5) {
                $hours_text = $this->arr1[0][1];
            } else {
                $hours_text = $this->arr1[0][2];
            }
            $result = $hours . ':' . $zero_num_before.$minutes.$zero_num_after . " - " . $this->arr2[0][$hours] . " $hours_text" . '.' . PHP_EOL;
        } else if ((int)$minutes < 15 || ((int)$minutes != 15 && (int)$minutes < 30)) { // If not 15 and less 30
            $minutes_text = $this->arr4[(int)$minutes] . ' после ' . $this->arr3[(int)$hours] . '.';
            $result = $hours . ':' . $zero_num_before.$minutes.$zero_num_after . " - " . $minutes_text . PHP_EOL;
        } else if ((int)$minutes > 30) { // if more than 30
            if($hours == 12)
                $hours_arr_element = 1;
            else
                $hours_arr_element = (int)$hours + 1;
            $minutes_text = $this->arr4[60 - (int)$minutes];
            $result = $hours . ':' . $minutes.$zero_num_after . " - " . $minutes_text . ' до ' . $this->arr3[$hours_arr_element]. '.' . PHP_EOL;
        } else if ((int)$minutes == 15 || (int)$minutes == 30) {
            if($hours == 12)
                $hours_arr_element = 1;
            else
                $hours_arr_element = (int)$hours + 1;
            $result = $hours . ':' . $minutes . " - " . $this->arr4[$minutes] . " " . $this->arr5[$hours_arr_element] . '.' . PHP_EOL;
        }
        return $result;
    }
}