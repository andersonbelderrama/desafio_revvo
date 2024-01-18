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

    public function createUser($user)
    {
        try {
            $query = "INSERT INTO $this->table (full_name, email, password) VALUES (:full_name, :email, :password)";
            $statement = $this->connection->prepare($query);
            $statement->bindParam(':full_name', $user['full_name']);
            $statement->bindParam(':email', $user['email']);
            $statement->bindParam(':password', $user['password']);
            $statement->execute();

            return $this->connection->lastInsertId();
        } catch (\PDOException $e) {
            // Trate o erro de inserção conforme necessário
            die("Erro ao criar um novo usuário: " . $e->getMessage());
        }
    }

    public function getUserByEmail($email)
    {
        try {
            $query = "SELECT * FROM $this->table WHERE email = :email";
            $statement = $this->connection->prepare($query);
            $statement->bindParam(':email', $email);
            $statement->execute();

            return $statement->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("Erro ao buscar usuário por e-mail: " . $e->getMessage());
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
