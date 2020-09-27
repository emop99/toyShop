<?php

namespace App\Http\Middleware;

use App\Util\PageSplit;
use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        $url = PageSplit::getInstance()->getNowUrl();

        if (array_key_exists(2, $url)) {
            $url = $url[2];
        }

        if (empty($request->session()->get('adminInfo')) && $request->method() == 'GET' && $url !== 'login') {
            header('location: ' . '/admin/login');
            exit;
        } elseif (!empty($request->session()->get('adminInfo')) && $url === 'login' && $request->method() == 'GET') {
            header('location: ' . '/admin/main');
            exit;
        }

        return $next($request);
    }
}
