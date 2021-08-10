<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

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
        $this->className = ucfirst($this->className) . 'Controller';
        $fileTail = '.php';
        $classFilePath = __DIR__ . '/' . $this->folderPath . '/' . $this->className . $fileTail;

        if (file_exists($classFilePath)) {
            $this->folderPath = str_replace('/', '\\', $this->folderPath);
            return 'App\\Http\\Controllers\\'.$this->folderPath.'\\'.$this->className;
        } else {
            Log::info(__METHOD__ . '::' . $classFilePath);
        }

        header('location: ' . '/');
        exit;
    }
}
