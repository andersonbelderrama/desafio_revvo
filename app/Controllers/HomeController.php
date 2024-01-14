<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $test = 'Hello World';

        $this->renderView('HomeView', ['test' => $test, 'title' => 'Página Inicial']);
    }
}