<?php

require_once 'Conexao.php';
require_once 'model/Cliente.php';

class DaoCliente{

    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new DaoCliente();
        return self::$instance;
    }

    public function inserir(Cliente $cliente) {        
        try {
            $sql = "INSERT INTO clientes "
                    . " (cpf,"
                    . " nome,"
                    . " endereco,"
                    . " telefone)"                     
                    . " VALUES "
                    . " (:cpf,"
                    . " :nome,"
                    . " :endereco,"
                    . " :telefone)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cpf", $cliente->getCpf());
            $p_sql->bindValue(":nome", $cliente->getNome());
            $p_sql->bindValue(":endereco", $cliente->getEndereco());
            $p_sql->bindValue(":telefone", $cliente->getTelefone());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function listar() {
        $sql = "SELECT * FROM clientes ORDER BY nome";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();
        return $p_sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletar($id) {
        $sql = "DELETE FROM clientes WHERE cpf=:id";
        try {
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function getCliente($id) {
        $sql = "SELECT * FROM clientes WHERE cpf=:id";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
        return $p_sql->fetch(PDO::FETCH_ASSOC);
    }
    
    public function atualizar(Cliente $clientes) {
        try {
            $sql = "UPDATE clientes set cpf=:cpf, nome=:nome, endereco=:endereco, telefone=:telefone"
                    . " WHERE cpf=:cpf";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cpf", $clientes->getCpf());
            $p_sql->bindValue(":nome", $clientes->getNome());
            $p_sql->bindValue(":endereco", $clientes->getEndereco());
            $p_sql->bindValue(":telefone", $clientes->getTelefone());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }
}    
    
