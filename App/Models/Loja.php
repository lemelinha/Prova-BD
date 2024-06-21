<?php

namespace App\Models;
use Needs\Model\Model;

class Loja extends Model {
    public function cadastrarLoja($endereco, $bairro, $cidade, $estado) {
        try {
            $sql = "INSERT INTO
                        tb_loja
                    SET
                        nm_endereco = :endereco,
                        nm_bairro = :bairro,
                        nm_cidade = :cidade,
                        cd_estado = :estado
            ";
            $query = $this->db->prepare($sql);
            $query->bindParam(':endereco', $endereco);
            $query->bindParam(':bairro', $bairro);
            $query->bindParam(':cidade', $cidade);
            $query->bindParam(':estado', $estado);
            $query->execute();
        } catch (\PDOException $e) {
            echo json_encode(['erro' => true, 'message' => 'Verifique as informações inseridas']);
            die();
        }
    }

    public function retornarLojas() {
        $sql = "SELECT 
                    *
                FROM
                    tb_loja
        ";
        return $this->executeStatement($sql);
    }
}
