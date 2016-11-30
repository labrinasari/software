<?php

require_once 'Conexao.php';
require_once 'model/produtos.php';

class DaoProdutos {

    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new DaoProdutos();
        return self::$instance;
    }

    public function inserir(Produtos $produtos) {
        try {
            $sql = "INSERT INTO produtos "
                    . " (descricao,"
                    . " categoria_id,"
                    . " preco,"
                    . " imagem,"
                    . " promocao) "
                    . " VALUES "
                    . " (:descricao,"
                    . " :categoria_id,"
                    . " :preco,"
                    . " :imagem,"
                    . " :promocao)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":descricao", $produtos->getDescricao());
            $p_sql->bindValue(":categoria_id", $produtos->getCategoria());
            $p_sql->bindValue(":preco", $produtos->getPreco());
            $p_sql->bindValue(":imagem", $produtos->getImagem());
            $p_sql->bindValue(":promocao", $produtos->getPromocao());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function listar() {
        $sql = "SELECT produtos.id_produto,"
                . " produtos.descricao,"
                . " produtos.preco,"
                . " produtos.imagem,"
                . " produtos.promocao,"
                . " categoria.descricao as categoria"
                . " FROM produtos, categoria"
                . " WHERE produtos.categoria_id = categoria.id "
                . " ORDER BY produtos.descricao";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();
        return $p_sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletar($id) {
        $sql = "DELETE FROM produtos WHERE id_produto =:id";
        try {
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function getProdutos($id) {
        $sql = "SELECT * FROM produtos WHERE id_produto =:id";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
        return $p_sql->fetch(PDO::FETCH_ASSOC);
    }
    
    
    public function getLogin($login,$senha) {
        $sql = "SELECT * FROM produtos WHERE login=:login and senha=:senha";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":login", $login);
        $p_sql->bindValue(":senha", $senha);
        $p_sql->execute();
        return $p_sql->rowCount();
    }

    public function atualizar(Produtos $produtos) {
        try {
            $sql = "UPDATE produtos set descricao =:descricao, preco=:preco, categoria_id=:categoria,imagem=:imagem,promocao=:promocao"
                    . " WHERE id_produto=:id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $produtos->getId());
            $p_sql->bindValue(":descricao", $produtos->getDescricao());
            $p_sql->bindValue(":preco", $produtos->getPreco());
            $p_sql->bindValue(":categoria", $produtos->getCategoria());
            $p_sql->bindValue(":imagem", $produtos->getImagem());
            $p_sql->bindValue(":promocao", $produtos->getPromocao());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

}
