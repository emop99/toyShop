<?php


namespace App\Util;

/**
 * Class PageSplit
 * @package App
 */
class PageSplit
{
    /** @var string $requestUrl */
    protected static string $requestUrl = '';

    public function __construct()
    {
        static::$requestUrl = $_SERVER['REQUEST_URI'];
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
        return explode('/', static::$requestUrl);
    }
}
