<?php

require_once 'Conexao.php';
require_once 'model/Categoria.php';

class DaoCategoria {

    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new DaoCategoria();
        return self::$instance;
    }

    public function inserir(Categoria $categoria) {
        try {
            $sql = "INSERT INTO categoria "
                    . " (descricao) "
                    . " VALUES "
                    . " (:descricao)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":descricao", $categoria->getDescricao());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function listar() {
        $sql = "SELECT * FROM categoria ORDER BY descricao";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();
        return $p_sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletar($id) {
        $sql = "DELETE FROM categoria WHERE id =:id";
        try {
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function getCategoria($id) {
        $sql = "SELECT * FROM categoria WHERE id=:id";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
        return $p_sql->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar(Categoria $categoria) {
        try {
            $sql = "UPDATE categoria set descricao =:descricao"
                    . " WHERE id=:id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $categoria->getId());
            $p_sql->bindValue(":descricao", $categoria->getDescricao());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

}
