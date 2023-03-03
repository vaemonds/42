<?php

namespace App;

interface TimeToWordConvertingInterface
{
    public function convert(int $hours, int $minutes): string;
}