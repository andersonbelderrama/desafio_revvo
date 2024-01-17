<?php

namespace App\Controllers;

use App\Models\CourseModel;

class HomeController extends Controller
{
    public function index($search = null)
    {
        $courseModel = new CourseModel();
        $courses = $courseModel->getAllCourses(null, $search);

        $this->renderView('HomeView', ['title' => 'Cursos', 'courses' => $courses]);
    }


}