<?php

namespace App;

class TimeToWordConverter implements TimeToWordConvertingInterface
{
    private int $hours;
    private int $minutes;

    

    public int $result;

    /**
     * @return int
     */
    public function getHours(): int
    {
        return $this->hours;
    }

    /**
     * @param int $hours
     */
    public function setHours(int $hours): void
    {
        $this->hours = $hours;
    }

    /**
     * @return int
     */
    public function getMinutes(): int
    {
        return $this->minutes;
    }

    /**
     * @param int $minutes
     */
    public function setMinutes(int $minutes): void
    {
        $this->minutes = $minutes;
    }

    public function convert(int $hours, int $minutes): string
    {
        // TODO: Implement convert() method.
        return $hours + $minutes;
    }
}