<?php

use App\Configs\Database;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $connection = Database::getConnection();

    $migrationsDirectory = __DIR__ . '/migrations/';

    $migrationFiles = glob($migrationsDirectory . '*.sql');

    foreach ($migrationFiles as $migrationFile) {
      
        $sql = file_get_contents($migrationFile);

        $connection->exec($sql);

        echo "Migração executada: $migrationFile\n";
    }

    echo "Todas as migrações foram executadas com sucesso!\n";
} catch (\PDOException $e) {
  
    echo "Erro na execução das migrações: " . $e->getMessage();
}