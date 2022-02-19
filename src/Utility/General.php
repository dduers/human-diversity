<?php

declare(strict_types=1);

namespace Dduers\HumanDiversity\Utility;

use DateTime;

final class General
{
    /**
     * create random number
     * @param int $min minimum number
     * @param int $max maximum number
     * @return int html hex color code
     */
    static function createRandomNumber(int $min, int $max): int
    {
        return rand($min, $max);
    }

    /**
     * create random html hex color code
     * @return string html hex color code
     */
    static function createRandomHexColor(): string
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }

    /**
     * create a random date YYYY-MM-DD
     * @return DateTime random date
     */
    static function createRandomDate(): DateTime
    {
        $day = self::createRandomNumber(1, 28);
        $month = self::createRandomNumber(1, 12);
        $maxYear = date('Y') - 1;
        $year = self::createRandomNumber(1920, $maxYear);
        return new DateTime($year . '-' . $month . '-' . $day);
    }
}
