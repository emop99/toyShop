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

    public function getControllerClass()
    {
        $this->className = ucwords($this->className) . 'Controller';
        $fileTail = '.php';
        $classFilePath = __DIR__ . '/' . $this->folderPath . '/' . $this->className . $fileTail;

        if (file_exists($classFilePath)) {
            return 'App\\Http\\Controllers\\'.$this->folderPath.'\\'.$this->className;
        }

        abort(404);
        Log::info(__FILE__ . ':' . __LINE__, [
            'ERROR' => 'getControllerClass :: file_exists($classFilePath) false',
            '$classFilePath' => $classFilePath
        ]);
        exit;
    }
}
