<?php

namespace App\Models;

use App\Configs\Database;

class CourseModel
{
    protected $table = 'courses';
    protected $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
        
    }

    public function getAllCourses($limit = null, $search = null)
    {
        try {
            $query = "SELECT * FROM $this->table";
    
            if ($search) {
                $query .= " WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
            }
    
            $query .= " ORDER BY created_at DESC";
            
            if ($limit && is_numeric($limit)) {
                $query .= " LIMIT $limit";
            }
    
            $statement = $this->connection->query($query);
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("Erro ao obter todos os cursos: " . $e->getMessage());
        }
    }

    public function getAllCoursesByAuthUser()
    {
        if (isset($_COOKIE['user_id'])) {
            $userId = $_COOKIE['user_id'];
        } else {
            return [];
        }

        try {
            $query = "SELECT * FROM $this->table WHERE user_id = $userId ORDER BY created_at DESC";
    
            $statement = $this->connection->query($query);
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("Erro ao obter todos os cursos: " . $e->getMessage());
        }
    }

    public function getCourseById($id)
    {
        try {
            $query = "SELECT * FROM $this->table WHERE id = :id";
            $statement = $this->connection->prepare($query);
            $statement->bindParam(':id', $id, \PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
    
            die("Erro ao obter o curso por ID: " . $e->getMessage());
        }
    }

    public function createCourse($data)
    {
        if (isset($_COOKIE['user_id'])) {
            $userId = $_COOKIE['user_id'];
        } else {
            return [];
        }

        try {
            $query = "INSERT INTO $this->table (name, description, short_description, image_filename, price, user_id) VALUES (:name, :description, :short_description, :image_filename, :price , :user_id)";
            $statement = $this->connection->prepare($query);
            $statement->bindParam(':name', $data['name']);
            $statement->bindParam(':description', $data['description']);
            $statement->bindParam(':short_description', $data['short_description']);
            $statement->bindParam(':image_filename', $data['image_filename']);
            $statement->bindParam(':price', $data['price']);
            $statement->bindParam(':user_id', $userId);
            $statement->execute();
            return $this->connection->lastInsertId();
        } catch (\PDOException $e) {
    
            die("Erro ao criar um novo curso: " . $e->getMessage());
        }
    }

    public function updateCourse($id, $data)
    {
        try {
            $query = "UPDATE $this->table SET name = :name, description = :description, short_description = :short_description, image_filename = :image_filename, price = :price WHERE id = :id";
            $statement = $this->connection->prepare($query);
            $statement->bindParam(':id', $id, \PDO::PARAM_INT);
            $statement->bindParam(':name', $data['name']);
            $statement->bindParam(':description', $data['description']);
            $statement->bindParam(':short_description', $data['short_description']);
            $statement->bindParam(':image_filename', $data['image_filename']);
            $statement->bindParam(':price', $data['price']);
            $statement->execute();
        } catch (\PDOException $e) {

            die("Erro ao atualizar o curso: " . $e->getMessage());
        }
    }

    public function deleteCourse($id)
    {
        try {
            $query = "DELETE FROM $this->table WHERE id = :id";
            $statement = $this->connection->prepare($query);
            $statement->bindParam(':id', $id, \PDO::PARAM_INT);
            $statement->execute();

            if ($statement->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {

            die("Erro ao excluir o curso: " . $e->getMessage());
        }
    }
}
