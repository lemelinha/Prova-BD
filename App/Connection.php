<?php

namespace App;
use \PDO;

/**
 *  Classe de conexão com banco de dados
 */
abstract class Connection {
    /**
     *  Função de conexão
     * 
     *  Faz conexão com banco de dados via PDO
     * 
     * @return object
     */
    public static function connect(){
        $host = $_ENV['HOST'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $pwd = $_ENV['DB_PASSWORD'];
        $port = $_ENV['DB_PORT'];

        try {
            $conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname};", $user, $pwd);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            return $conn;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
