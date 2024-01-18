<?php

use App\Configs\Database;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $connection = Database::getConnection();

    $seedersDirectory = __DIR__ . '/seeders/';

    // Obter todos os arquivos no diretório de seeders
    $seederFiles = glob($seedersDirectory . '*.sql');

    foreach ($seederFiles as $seederFile) {
        // Ler o conteúdo do arquivo SQL
        $sql = file_get_contents($seederFile);

        // Executar o seeder
        $connection->exec($sql);

        echo "Seeder executado: $seederFile\n";
    }

    echo "Todos os seeders foram executados com sucesso!\n";
} catch (\PDOException $e) {
    // Tratar erros de conexão...
    echo "Erro na execução dos seeders: " . $e->getMessage();
}
