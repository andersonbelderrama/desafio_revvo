<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Traits\SessionTrait;

class AuthController extends Controller
{
    use SessionTrait;

    public function index()
    {

        $this->renderView('LoginView',['title' => 'Login']);
    }

    public function register()
    {

        $this->renderView('RegisterView',['title' => 'Cadastro']);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new UserModel();

            // Verifica se os campos obrigatórios foram preenchidos
            if (isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['password'])) {
                
                // Verifica se o e-mail já está em uso
                $existingUser = $userModel->getUserByEmail($_POST['email']);
                if ($existingUser) {
                    // E-mail já em uso, redirecione ou exiba uma mensagem de erro
                    $this->setSessionError('E-mail já está em uso. Por favor, escolha outro e-mail.');
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                }

                // Cria um novo usuário
                $user = [
                    'full_name' => $_POST['full_name'],
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                ];

                // Insere o novo usuário no banco de dados
                if ($userModel->createUser($user)) {
                    $this->setSessionSuccess('Cadastro realizado com sucesso!');
                    header('Location: /cursos');
                    exit;
                } else {
                    // Se houver um erro ao criar o usuário, exiba uma mensagem ou redirecione para uma página de erro
                    $this->setSessionError('Erro ao criar o usuário. Por favor, tente novamente.');
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                }
            } else {
                $this->setSessionError('Por favor, preencha todos os campos obrigatórios.');
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
            }
        }
    }


    public function login()
    {

        //dd(password_hash('password', PASSWORD_DEFAULT));
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $userModel = new UserModel();
    
                $user = $userModel->getUserByEmail($_POST['email']);
    
                if ($user && password_verify($_POST['password'], $user['password'])) {

                    setcookie('user_id', $user['id'], time() + 2 * 60 * 60, "/");
    
                    header("Location: /cursos");
                    exit();

                } else {

                    $this->setSessionError("Credenciais inválidas. Por favor, tente novamente.");
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                }
            } else {

                $this->setSessionError("Por favor, forneça um e-mail e senha.");
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
        }

    }

    public function logout()
    {
        setcookie('user_id', '', time() - 3600, "/");

        $this->setSessionSuccess('Logout efetuado com sucesso!');
        header("Location: /");
        exit();
    }

}