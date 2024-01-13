<?php

namespace App\Configs;

use Dotenv\Dotenv;

class Database
{
    public static function getConnection()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $dbname = $_ENV['DB_DATABASE'];
        $user = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];

        try {
            $connection = new \PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (\PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }
}
