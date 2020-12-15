<?php


namespace App\Http\Controllers;

/**
 * Trait ViewControl
 * @package App\Http\Controllers
 */
trait ViewControl
{
    public function view()
    {
        $view = null;

        if ($this->request->method() == 'POST') {
            $mode = $this->request->input('mode');
            $view = $this->$mode($this->request);
        } elseif ($this->request->get('excelDown') == 1) {
            $view = $this->excelDown();
        } else {
            $view = $this->show();
        }

        return $view;
    }

    /**
     * @param $returnData
     */
    public function jsonEchoExit($returnData)
    {
        echo json_encode($returnData);
        exit;
    }
}
