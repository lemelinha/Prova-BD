<?php

namespace App\Models;
use Needs\Model\Model;

class Categoria extends Model {
    public function cadastrarCategoria($nome) {
        try {
            $sql = "INSERT INTO
                        tb_categoria
                    SET
                        nm_categoria = :nome
            ";
            $query = $this->db->prepare($sql);
            $query->bindParam(':nome', $nome);
            $query->execute();
        } catch (\PDOException $e) {
            echo json_encode(['erro' => true, 'message' => 'Verifique as informações inseridas']);
            die();
        }
    }

    public function retornarCategorias () {
        $sql = "SELECT 
                    *
                FROM
                    tb_categoria
        ";
        return $this->executeStatement($sql);
    }
}
