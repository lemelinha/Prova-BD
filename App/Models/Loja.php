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

    public function retornarLojas($id=null) {
        $sql = "SELECT 
                    *
                FROM
                    tb_loja
        ";
        $params=[];
        if ($id != null) {
            $sql .= "WHERE cd_loja = ?";
            array_push($params, $id);
        }

        return $this->executeStatement($sql, $params);
    }

    public function deletarLoja($id) {
        $sql = "UPDATE
                    tb_loja
                SET
                    st_loja = 'D'
                WHERE
                    cd_loja = :loja
        ";
        $query = $this->db->prepare($sql);
        $query->bindParam(':loja', $id);
        $query->execute();
    }

    public function editarLoja($endereco, $bairro, $cidade, $estado, $id) {
        try {
            $sql = "UPDATE
                        tb_loja
                    SET
                        nm_endereco = :endereco,
                        nm_bairro = :bairro,
                        nm_cidade = :cidade,
                        cd_estado = :estado
                    WHERE
                        cd_loja = :id
            ";
            $query = $this->db->prepare($sql);
            $query->bindParam(':endereco', $endereco);
            $query->bindParam(':bairro', $bairro);
            $query->bindParam(':cidade', $cidade);
            $query->bindParam(':estado', $estado);
            $query->bindParam(':id', $id);
            $query->execute();
        } catch (\PDOException $e) {
            echo json_encode(['erro' => true, 'message' => 'Verifique as informações inseridas']);
            die();
        }
    }
}
