<?php


namespace App\Http\Controllers;


trait ViewControl
{
    public function view()
    {
        $view = null;

        if ($this->request->method() == 'POST') {
            $mode = $this->request->input('mode');
            $view = $this->$mode($this->request);
        } else {
            $view = $this->show();
        }

        return $view;
    }
}
