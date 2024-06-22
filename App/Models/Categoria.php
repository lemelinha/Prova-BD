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

    public function retornarCategorias ($id=null) {
        $sql = "SELECT 
                    *
                FROM
                    tb_categoria 
        ";
        $params=[];
        if ($id != null) {
            $sql .= "WHERE cd_categoria = ?";
            array_push($params, $id);
        }

        return $this->executeStatement($sql, $params);
    }

    public function deletarCategoria($id) {
        $sql = "UPDATE
                    tb_categoria
                SET
                    st_categoria = 'D'
                WHERE
                    cd_categoria = :categoria
        ";
        $query = $this->db->prepare($sql);
        $query->bindParam(':categoria', $id);
        $query->execute();
    }

    public function editarCategoria($categoria, $id) {
        try {
            $sql = "UPDATE
                        tb_categoria
                    SET
                        nm_categoria = :categoria
                    WHERE
                        cd_categoria = :id
            ";
            $query = $this->db->prepare($sql);
            $query->bindParam(':categoria', $categoria);
            $query->bindParam(':id', $id);
            $query->execute();
        } catch (\PDOException $e) {
            echo json_encode(['erro' => true, 'message' => 'Verifique as informações inseridas']);
            die();
        }
    }
}
