<?php
require_once "../vendor/autoload.php";

$time_to_word = new \App\TimeToWordConverter();

print_r($time_to_word->convert(3, 0));
