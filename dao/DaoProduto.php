<?php

require_once 'Conexao.php';
require_once 'model/Produto.php';

class DaoProduto {

    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new DaoProduto();
        return self::$instance;
    }

    public function inserir(Produto $Produto) {
        try {
            $sql = "INSERT INTO produtos "
                    . " (descricao,"
                    . " marca_id,"
                    . " preco,"
                    . " imagem) "
                    . " VALUES "
                    . " (:descricao,"
                    . " :marca_id,"
                    . " :preco,"
                    . " :imagem)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":descricao", $Produto->getDescricao());
            $p_sql->bindValue(":marca_id", $Produto->getMarca());
            $p_sql->bindValue(":preco", $Produto->getPreco());
            $p_sql->bindValue(":imagem", $Produto->getImagem());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function listar() {
        $sql = "SELECT produtos.id,"
                . " produtos.descricao,"
                . " produtos.preco,"
                . " produtos.imagem,"
                . " marca.descricao as marca"
                . " FROM produtos, marca"
                . " WHERE produtos.marca_id = marca.id "
                . " ORDER BY produtos.descricao";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();
        return $p_sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletar($id) {
        $sql = "DELETE FROM Produto WHERE id =:id";
        try {
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function getProduto($id) {
        $sql = "SELECT * FROM Produto WHERE id=:id";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
        return $p_sql->fetch(PDO::FETCH_ASSOC);
    }
    
    
    public function getLogin($login,$senha) {
        $sql = "SELECT * FROM Produto WHERE login=:login and senha=:senha";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":login", $login);
        $p_sql->bindValue(":senha", $senha);
        $p_sql->execute();
        return $p_sql->rowCount();
    }

    public function atualizar(Produto $Produto) {
        try {
            $sql = "UPDATE Produto set descricao =:descricao, preco=:preco, marca_id=:marca,imagem=:imagem"
                    . " WHERE id=:id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $Produto->getId());
            $p_sql->bindValue(":descricao", $Produto->getDescricao());
            $p_sql->bindValue(":preco", $Produto->getPreco());
            $p_sql->bindValue(":marca", $Produto->getMarca());
            $p_sql->bindValue(":imagem", $Produto->getImagem());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

}
