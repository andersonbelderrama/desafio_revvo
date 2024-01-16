<?php

namespace App\Controllers;

use App\Models\CourseModel;

class CourseController extends Controller
{
    public function index()
    {
        $courseModel = new CourseModel();
        $courses = $courseModel->getAllCourses();

        $this->renderView('Courses.CourseListView', ['title' => 'Meus Cursos', 'courses' => $courses]);
    }

    public function show($id)
    {
        $courseModel = new CourseModel();
        $course = $courseModel->getCourseById($id);

        $this->renderView('Courses.CourseShowView', ['title' => $course['name'], 'course' => $course]);
    }

    public function create()
    {
        $this->renderView('Courses.CourseCreateView', ['title' => 'Criar Curso']);
    }

    public function store()
    {
        $image = $_POST['image_filename'];

        $data = [
            'name' => $_POST['name'],
            'short_description' => $_POST['short_description'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'image_filename' => $_POST['image_filename']
        ];

        dd($data);

        //$courseModel = new CourseModel();
        //$courseModel->createCourse($data);

        //$this->renderView('Courses.CourseListView', ['title' => 'Meus Cursos']);
    }
}