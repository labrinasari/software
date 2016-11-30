<?php

require_once 'Conexao.php';
require_once 'model/Funcionario.php';

class DaoFuncionario {

    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new DaoFuncionario();
        return self::$instance;
    }

    public function inserir(Funcionario $funcionarios) {        
        try {
            $sql = "INSERT INTO funcionarios "
                    . " (cpf_funcionarios,"
                    . " nome,"
                    . " usuario,"
                    . " senha,"
                    . " funcao,"
                    . " endereco)"                    
                    . " VALUES "
                    . " (:cpf_funcionarios,"
                    . " :nome,"
                    . " :usuario,"
                    . " :senha,"
                    . " :funcao,"
                    . " :endereco)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cpf_funcionarios", $funcionarios->getCpf_funcionarios());
            $p_sql->bindValue(":nome", $funcionarios->getNome());
            $p_sql->bindValue(":funcao", $funcionarios->getFuncao());
            $p_sql->bindValue(":endereco", $funcionarios->getEndereco());
            $p_sql->bindValue(":usuario", $funcionarios->getLogin());
            $p_sql->bindValue(":senha", $funcionarios->getSenha());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function listar() {
        $sql = "SELECT * FROM funcionarios ORDER BY nome";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();
        return $p_sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletar($id) {
        $sql = "DELETE FROM funcionarios WHERE cpf_funcionarios =:id";
        try {
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function getFuncionario($id) {
        $sql = "SELECT * FROM funcionarios WHERE cpf_funcionarios=:id";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
        return $p_sql->fetch(PDO::FETCH_ASSOC);
    }
    
    
    public function getLogin($login,$senha) {
        $sql = "SELECT * FROM funcionarios WHERE usuario=:login and senha=:senha";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":login", $login);
        $p_sql->bindValue(":senha", $senha);
        $p_sql->execute();
        return $p_sql->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar(Funcionario $funcionarios) {
        try {
            $sql = "UPDATE funcionarios set nome =:nome, usuario=:usuario, funcao=:funcao, endereco=:endereco"
                    . " WHERE cpf_funcionarios=:id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $funcionarios->getCpf_funcionarios());
            $p_sql->bindValue(":nome", $funcionarios->getNome());
            $p_sql->bindValue(":usuario", $funcionarios->getLogin());
            $p_sql->bindValue(":funcao", $funcionarios->getFuncao());
            $p_sql->bindValue(":endereco", $funcionarios->getEndereco());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }
    
    public function atualizarSenha(Funcionario $funcionarios) {
        try {
            $sql = "UPDATE funcionarios set senha =:senha"
                    . " WHERE cpf_funcionarios=:id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $funcionarios->getCpf_funcionarios());
            $p_sql->bindValue(":senha", $funcionarios->getSenha());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

}
