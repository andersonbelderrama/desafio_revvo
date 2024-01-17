<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Traits\SessionTrait;

class CourseController extends Controller
{
    use SessionTrait;

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

        $course['price'] = number_format($course['price'], 2, ',', '.');

        $this->renderView('Courses.CourseShowView', ['title' => $course['name'], 'course' => $course]);
    }

    public function create()
    {
        $this->renderView('Courses.CourseCreateView', ['title' => 'Criar Curso']);
    }

    public function store()
    {
       
        $imageUploaded = false;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/assets/img/courses/';
            $imageName = uniqid() . '_' . basename($_FILES['image']['name']);
            $uploadPath = $uploadDir . $imageName;

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension = pathinfo($imageName, PATHINFO_EXTENSION);
            
            if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);

                $imageUploaded = true;
            }
        }

        if (!$imageUploaded) {
            $this->setSessionError('Imagem é obrigatória para este curso.');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $shortDescription = $_POST['short_description'];
        if (strlen($shortDescription) > 70) {
            $this->setSessionError('A descrição curta deve ter no máximo 70 caracteres.');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $price = str_replace(',', '.', $_POST['price']);
        $price = number_format($price, 2, '.', ''); 

        $data = [
            'name' => $_POST['name'],
            'short_description' => $shortDescription,
            'description' => $_POST['description'],
            'price' => $price,
            'image_filename' => $imageName
        ];

        $courseModel = new CourseModel();
        $courseId = $courseModel->createCourse($data);

        $this->setSessionSuccess("Curso criado com sucesso. ID: $courseId");

        header('Location: /cursos'); 
        exit;
    }

    public function edit($id)
    {
        $courseModel = new CourseModel();
        $course = $courseModel->getCourseById($id);

        $this->renderView('Courses.CourseEditView', ['title' => 'Editar Curso: ' . $course['name'] . '', 'course' => $course]);
    }

    public function update($id)
    {
        $courseModel = new CourseModel();
        $course = $courseModel->getCourseById($id);

        $imageUploaded = false;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/assets/img/courses/';
            $imageName = uniqid() . '_' . basename($_FILES['image']['name']);
            $uploadPath = $uploadDir . $imageName;

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension = pathinfo($imageName, PATHINFO_EXTENSION);
            
            if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);

                $imageUploaded = true;
            }
        }

        if ($imageUploaded) {
            $image_filename = $imageName;
        } else {
            $image_filename = $course['image_filename'];
            $imageUploaded = true;
        }
        
        if (!$imageUploaded) {
            $this->setSessionError('Imagem é obrigatória para este curso.');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $price = str_replace(',', '.', $_POST['price']);

        $data = [
            'name' => $_POST['name'],
            'short_description' => $_POST['short_description'],
            'description' => $_POST['description'],
            'price' => $price,
            'image_filename' => $image_filename
        ];


        $courseModel->updateCourse($id, $data);

        $this->setSessionSuccess('Curso editado com sucesso.');

        header('Location: /curso/'.$id);
        exit;
    }

    public function delete($id)
    {
        $courseModel = new CourseModel();
        $courseModel->deleteCourse($id);

        $this->setSessionSuccess('Curso excluído com sucesso.');

        header('Location: /cursos');
    }

}