<?php


namespace App\Util;

/**
 * Class PageSplit
 * @package App
 */
class PageSplit
{
    /** @var string $requestUrl */
    public static string $requestUrl = '';

    public function __construct()
    {
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }

    /**
     * @return null|string[]
     */
    public static function getNowUrl(): array
    {
        static::$requestUrl = $_SERVER['REQUEST_URI'];
        return explode('/', static::$requestUrl);
    }

    /**
     * @return string
     */
    public static function urlCheck():string
    {
        return explode('?', $_SERVER['REQUEST_URI'])[0];
    }
}
