<?php

use App\Configs\Database;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $connection = Database::getConnection();

    $migrationsDirectory = __DIR__ . '/migrations/';

    // Obter todos os arquivos no diretório de migrações
    $migrationFiles = glob($migrationsDirectory . '*.sql');

    foreach ($migrationFiles as $migrationFile) {
        // Ler o conteúdo do arquivo SQL
        $sql = file_get_contents($migrationFile);

        // Executar a migração
        $connection->exec($sql);

        echo "Migração executada: $migrationFile\n";
    }

    echo "Todas as migrações foram executadas com sucesso!\n";
} catch (\PDOException $e) {
    // Tratar erros de conexão...
    echo "Erro na execução das migrações: " . $e->getMessage();
}