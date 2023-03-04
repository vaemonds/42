<?php
require_once "../vendor/autoload.php";

$time_to_word = new \App\TimeToWordConverter();

print_r($time_to_word->convert(7, 0));
print_r($time_to_word->convert(7, 01));
print_r($time_to_word->convert(7, 03));
print_r($time_to_word->convert(7, 12));
print_r($time_to_word->convert(7, 15));
print_r($time_to_word->convert(7, 22));
print_r($time_to_word->convert(7, 30));
print_r($time_to_word->convert(7, 35));
print_r($time_to_word->convert(7, 41));
print_r($time_to_word->convert(7, 56));
print_r($time_to_word->convert(7, 59));
