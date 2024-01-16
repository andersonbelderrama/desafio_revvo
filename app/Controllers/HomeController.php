<?php

namespace App\Controllers;

use App\Models\CourseModel;

class HomeController extends Controller
{
    public function index()
    {
        $courseModel = new CourseModel();
        $courses = $courseModel->getAllCourses();

        $this->renderView('HomeView', ['title' => 'Cursos', 'courses' => $courses]);
    }
}