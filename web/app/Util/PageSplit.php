<?php


namespace App\Util;

/**
 * Class PageSplit
 * @package App
 *
 * @property string $requestUrl
 */
class PageSplit
{
    /**[
     * @var null|PageSplit
     */
    static protected $instance = null;

    static public function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    private $requestUrl = '';

    public function __construct()
    {
        $this->requestUrl = $_SERVER['REQUEST_URI'];
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
    public function getNowUrl()
    {
        return explode('/', $this->requestUrl);
    }
}
