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

    /**
     * create a random token
     * @return string the token
     */
    static function createToken(int $bytes_ = 64): string
    {
        return bin2hex(random_bytes($bytes_));
    }

    /**
     * password complexity check
     * @param string $password_ plain text password
     * @return bool true for complex password, false for non complex password
     */
    static public function isComplexPassword(string $password_): bool 
    {
        $_password = '';
        // at least 8 characters
        if (strlen($password_) < 8)
            return false;
        // password has uppercase and lowercase letters
        if (preg_match("/^(?=.*[a-z])(?=.*[A-Z]).+$/", $password_) !== 1)
            return false;
        // does contain a mix of letters and numbers
        if (preg_match("/^((?=.*[a-z])|(?=.*[A-Z]))(?=.*\d).+$/", $password_) !== 1)
            return false;
        // check for special chars
        $_password = $password_;
        $_password = preg_replace("/[a-z]/", '', $_password);
        $_password = preg_replace("/[A-Z]/", '', $_password);
        $_password = preg_replace("/[0-9]/", '', $_password);
        if (!strlen($_password))
            return false;
        return true;
    }
}
