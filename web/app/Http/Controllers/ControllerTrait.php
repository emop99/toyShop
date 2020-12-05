<?php


namespace App\Http\Controllers;

/**
 * Trait ControllerTrait
 * @package App\Http\Controllers
 *
 * @property string $folderPath
 * @property string $className
 */
trait ControllerTrait
{
    private $folderPath = '';
    private $className = '';

    public function getControllerClass(): string
    {
        $this->className = ucwords($this->className) . 'Controller';
        $fileTail = '.php';
        $classFilePath = __DIR__ . '/' . $this->folderPath . '/' . $this->className . $fileTail;

        if (file_exists($classFilePath)) {
            return 'App\\Http\\Controllers\\'.$this->folderPath.'\\'.$this->className;
        }

        header('location: ' . '/admin/main');
        exit;
    }
}
