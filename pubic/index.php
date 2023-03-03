<?php
require_once "../vendor/autoload.php";

$time_to_word = new \App\TimeToWordConverter();

var_dump($time_to_word->convert(10, 15));