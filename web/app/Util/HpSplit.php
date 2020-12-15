<?php


namespace App\Util;

/**
 * Class HpSplit
 * @package App\Util
 */
class HpSplit
{
    /**
     * @param string $number
     * @return string
     */
    public static function phone(string $number): string
    {
        $number = htmlspecialchars($number);
        return substr($number, 0, 3) . '-' . substr($number, 3, 4) . '-' . substr($number, 7, 4);
    }
}
