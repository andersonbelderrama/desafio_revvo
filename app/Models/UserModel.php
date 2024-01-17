<?php

namespace App\Models;

use App\Configs\Database;

class UserModel
{
    protected $table = 'users';
    protected $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function createUser($data)
    {
        try {
            $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);
    
            $query = "INSERT INTO $this->table (email, password, full_name, first_login) VALUES (:email, :password, :full_name, :first_login)";
            
            $statement = $this->connection->prepare($query);
            $statement->bindParam(':email', $data['email']);
            $statement->bindParam(':password', $hashedPassword);
            $statement->bindParam(':full_name', $data['full_name']);
            $statement->bindParam(':first_login', $data['first_login']);
    
            $statement->execute();
            
            return $this->connection->lastInsertId();
        } catch (\PDOException $e) {
            die("Erro ao criar um novo usuário: " . $e->getMessage());
        }
    }

    public function login($email, $password)
    {
        try {
            $query = "SELECT id, password FROM $this->table WHERE email = :email";
            $statement = $this->connection->prepare($query);
            $statement->bindParam(':email', $email);
            $statement->execute();

            $user = $statement->fetch(\PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Login bem-sucedido
                return $user['id'];
            } else {
                // Credenciais inválidas
                return false;
            }
        } catch (\PDOException $e) {
            die("Erro ao realizar o login: " . $e->getMessage());
        }
    }

    public function getUserById($userId)
    {
        try {
            $query = "SELECT * FROM $this->table WHERE id = :id";
            $statement = $this->connection->prepare($query);
            $statement->bindParam(':id', $userId);
            $statement->execute();

            return $statement->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("Erro ao buscar usuário por ID: " . $e->getMessage());
        }
    }

}
