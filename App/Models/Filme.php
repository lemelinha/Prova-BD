<?php

namespace App\Models;
use Needs\Model\Model;

class Filme extends Model {
    public function cadastrarFilme($nome, $desc, $valor, $categoria) {
        try {
            $sql = "INSERT INTO
                        tb_filme
                    SET
                        nm_filme = :nome,
                        ds_filme = :descricao,
                        vl_filme = :valor,
                        id_categoria = :categoria
            ";
            $query = $this->db->prepare($sql);
            $query->bindParam(':nome', $nome);
            $query->bindParam(':descricao', $desc);
            $query->bindParam(':valor', $valor);
            $query->bindParam(':categoria', $categoria);
            $query->execute();
        } catch (\PDOException $e) {
            echo json_encode(['erro' => true, 'message' => 'Verifique as informações inseridas']);
            die();
        }
    }

    public function retornarFilmes($id=null) {
        $sql = "SELECT 
                    cd_filme,
                    nm_filme,
                    ds_filme,
                    vl_filme,
                    st_filme,
                    nm_categoria,
                    st_categoria
                FROM
                    tb_filme
                INNER JOIN
                    tb_categoria
                    ON
                        id_categoria = cd_categoria
        ";
        $params=[];
        if ($id != null) {
            $sql .= "WHERE cd_filme = ?";
            array_push($params, $id);
        }

        return $this->executeStatement($sql, $params);
    }

    public function retornarInventario () {
        $sql = "SELECT
                    id_filme,
                    id_loja,
                    cd_loja,
                    st_loja,
                    count(*) as qt_filme
                FROM
                    tb_inventario
                INNER JOIN
                    tb_loja
                    ON
                        id_loja = cd_loja
                GROUP BY
                    id_filme, id_loja
        ";
        return $this->executeStatement($sql);
    }

    public function entrada($filme, $loja, $entrada) {
        try {
            $sql = "INSERT INTO
                        tb_inventario
                    VALUES 
            ";

            for ($i = 0; $i < $entrada; $i++) {
                $sql .= "(NULL, :filme, :loja),";
            }
            $sql = rtrim($sql, ',');

            $query = $this->db->prepare($sql);
            $query->bindParam(':filme', $filme);
            $query->bindParam(':loja', $loja);
            $query->execute();

        } catch (\PDOException $e) {
            echo json_encode(['erro' => true, 'message' => 'Verifique as informações inseridas']);
            die();
        }
    }

    public function saida($filme, $loja, $saida) {
        $sql = "DELETE FROM
                    tb_inventario
                WHERE
                    id_filme = :filme AND
                    id_loja = :loja
                LIMIT
                    :saida
        ";
        $query = $this->db->prepare($sql);
        $query->bindParam(':filme', $filme);
        $query->bindParam(':loja', $loja);
        $query->bindParam(':saida', $saida, \PDO::PARAM_INT);
        $query->execute();
    }

    public function temEstoqueDisponivel($filme, $loja, $saida) {
        $sql = "SELECT
                    count(*) as qt_filme
                FROM
                    tb_inventario
                WHERE
                    id_filme = :filme AND
                    id_loja = :loja
        ";
        $query = $this->db->prepare($sql);
        $query->bindParam(':filme', $filme);
        $query->bindParam(':loja', $loja);
        $query->execute();
        $inventario = $query->fetchAll()[0];

        if ($saida > $inventario->qt_filme) {
            return false;
        }
        return true;
    }

    public function deletarFilme($id) {
        $sql = "UPDATE
                    tb_filme
                SET
                    st_filme = 'D'
                WHERE
                    cd_filme = :filme
        ";
        $query = $this->db->prepare($sql);
        $query->bindParam(':filme', $id);
        $query->execute();
    }

    public function editarFilme($filme, $desc, $valor, $categoria, $id) {
        try {
            $sql = "UPDATE
                        tb_filme
                    SET
                        nm_filme = :filme,
                        ds_filme = :ds,
                        vl_filme = :valor,
                        id_categoria = :categoria
                    WHERE
                        cd_filme = :id
            ";
            $query = $this->db->prepare($sql);
            $query->bindParam(':filme', $filme);
            $query->bindParam(':ds', $desc);
            $query->bindParam(':valor', $valor);
            $query->bindParam(':categoria', $categoria);
            $query->bindParam(':id', $id);
            $query->execute();
        } catch (\PDOException $e) {
            echo json_encode(['erro' => true, 'message' => 'Verifique as informações inseridas']);
            die();
        }
    }
}
