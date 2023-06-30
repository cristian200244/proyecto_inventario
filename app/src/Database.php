<?php
namespace App;

use PDO;

class Database {
    private PDO $pdo;

    public function __construct()
    {
        $path = __DIR__ . '/../../config.json';

        if (!file_exists($path)){
            $data = [
                'db' => [
                    'host' => 'localhost',
                    'user' => 'root',
                    'password' => 'root',
                    'database' => 'sistema_inventario',
                    'port' => null
                ]
            ];

            file_put_contents($path, json_encode($data, 128) );
        }

        $content = file_get_contents($path);
        
        /** @var array array asociativo */
        $config = json_decode($content, true);

        $db = $config['db'];

        $host = $db['host'];
        $user = $db['user'];
        $password = $db['password'];
        $database = $db['database'];

        $this->pdo = new PDO("mysql:host=$host; dbname=$database", $user, $password);

    }


    public function execute(string $sql, array $params = null) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function update(string $table, array $update, string $condition): bool {
        $sets = "";
        foreach($update as $key => $val){
            $sets .= ", $key = :$key";
        }
        $sets = substr($sets, 2);

        $sql = "update $table set $sets where $condition";

        $stmt = $this->pdo->prepare($sql);
        $ok = $stmt->execute($update);
        return $stmt->rowCount() > 0;
    }
}