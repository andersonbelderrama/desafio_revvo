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

    public function getAllCourses()
    {
        try {
            $query = "SELECT * FROM $this->table";
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
        try {
            $query = "INSERT INTO $this->table (name, description, shot_description, image_filename, price) VALUES (:name, :description, :shot_description, :image_filename, :price)";
            $statement = $this->connection->prepare($query);
            $statement->bindParam(':name', $data['name']);
            $statement->bindParam(':description', $data['description']);
            $statement->bindParam(':shot_description', $data['shot_description']);
            $statement->bindParam(':image_filename', $data['image_filename']);
            $statement->bindParam(':price', $data['price']);
            $statement->execute();
            return $this->connection->lastInsertId();
        } catch (\PDOException $e) {
    
            die("Erro ao criar um novo curso: " . $e->getMessage());
        }
    }

    public function updateCourse($id, $data)
    {
        try {
            $query = "UPDATE $this->table SET name = :name, description = :description, shot_description = :shot_description, image_filename = :image_filename, price = :price WHERE id = :id";
            $statement = $this->connection->prepare($query);
            $statement->bindParam(':id', $id, \PDO::PARAM_INT);
            $statement->bindParam(':name', $data['name']);
            $statement->bindParam(':description', $data['description']);
            $statement->bindParam(':shot_description', $data['shot_description']);
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
