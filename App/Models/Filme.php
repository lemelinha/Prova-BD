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

    public function retornarFilmes() {
        $sql = "SELECT 
                    *
                FROM
                    tb_filme
                INNER JOIN
                    tb_categoria
                    ON
                        id_categoria = cd_categoria
        ";
        return $this->executeStatement($sql);
    }

    public function entrada($filme, $loja, $entrada) {
        try {
            $sql = "SELECT 
                        *
                    FROM
                        tb_inventario
                    INNER JOIN
                        tb_filme
                        ON
                            id_filme = cd_filme
                    INNER JOIN
                        tb_loja
                        ON
                            id_loja = cd_loja
            ";
            $result = $this->executeStatement($sql);
            if (!empty($result)) {
                $sql = "UPDATE
                            tb_inventario
                        SET
                            qt_filme = :qt
                        WHERE
                            id_filme = :filme AND
                            id_loja = :loja
                ";
                $query = $this->db->prepare($sql);
                $query->bindValue(':qt', $result[0]->qt_filme + $entrada);
                $query->bindParam(':filme', $filme);
                $query->bindParam(':loja', $loja);
                $query->execute();
            } else {
                $sql = "INSERT INTO
                            tb_inventario
                        SET
                            qt_filme = :qt,
                            id_filme = :filme,
                            id_loja = :loja
                ";
                $query = $this->db->prepare($sql);
                $query->bindParam(':qt', $entrada);
                $query->bindParam(':filme', $filme);
                $query->bindParam(':loja', $loja);
                $query->execute();
            }
        } catch (\PDOException $e) {
            echo json_encode(['erro' => true, 'message' => 'Verifique as informações inseridas']);
            die();
        }
    }
}
