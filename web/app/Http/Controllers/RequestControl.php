<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Trait RequestControl
 * @package App\Http\Controllers
 *
 * @property Request $request
 */
trait RequestControl
{
    private $request = null;

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }
}
