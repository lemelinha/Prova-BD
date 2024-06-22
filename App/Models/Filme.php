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
                INNER JOIN
                    tb_inventario
                    ON
                        id_filme = cd_filme
                INNER JOIN
                    tb_loja
                    ON
                        id_loja = cd_loja
        ";

        $inventario = $this->retornarInventario();

        return [$this->executeStatement($sql), $inventario];
    }

    public function retornarInventario () {
        $sql = "SELECT 
                    *
                FROM
                    tb_inventario
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
                    WHERE
                        id_filme = ? AND
                        id_loja = ?
            ";
            $result = $this->executeStatement($sql, [$filme, $loja]);
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

    public function saida($filme, $loja, $saida) {
        $sql = "SELECT
                    qt_filme
                FROM
                    tb_inventario
                WHERE
                    id_filme = ? AND
                    id_loja = ?
        ";
        $estoque_atual = $this->executeStatement($sql, [$filme, $loja])[0]->qt_filme;

        $sql = "UPDATE
                    tb_inventario
                SET
                    qt_filme = :qt
                WHERE
                    id_filme = :filme AND
                    id_loja = :loja
        ";
        $query = $this->db->prepare($sql);
        $query->bindValue(':qt', $estoque_atual - $saida);
        $query->bindParam(':filme', $filme);
        $query->bindParam(':loja', $loja);
        $query->execute();
    }

    public function temInventario($filme, $loja) {
        $sql = "SELECT
                    *
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
        if ($query->rowCount() == 0) {
            return false;
        }
        return true;
    }

    public function temEstoqueDisponivel($filme, $loja, $saida) {
        $sql = "SELECT
                    *
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
}
