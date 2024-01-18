<?php

namespace App\Controllers;

class Controller
{
    protected function renderView($view, $data = [])
    {
        extract($data);

        $title = $title = isset($data['title']) ? $data['title'] : 'Página sem título';
        $content = $this->loadView($view, $data);

        include __DIR__ . "/../Views/Layout/DefaultView.php";
    }

    protected function loadView($viewName, $data = [])
    {
        ob_start();

        extract($data);

        $viewPath = $this->getViewPath($viewName);

        include __DIR__ . "/../Views/$viewPath.php";

        return ob_get_clean();
    }

    private function getViewPath($viewName)
    {
 
        if (strpos($viewName, '.') !== false) {

            return str_replace('.', '/', $viewName);
        }

        return $viewName;
    }
}
