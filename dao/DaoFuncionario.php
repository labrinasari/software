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

    public function inserir(Funcionario $funcionario) {
        try {
            $sql = "INSERT INTO funcionario "
                    . " (nome,"
                    . " login,"
                    . " senha) "
                    . " VALUES "
                    . " (:nome,"
                    . " :login,"
                    . " :senha)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $funcionario->getNome());
            $p_sql->bindValue(":login", $funcionario->getLogin());
            $p_sql->bindValue(":senha", $funcionario->getSenha());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function listar() {
        $sql = "SELECT * FROM funcionario ORDER BY nome";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();
        return $p_sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletar($id) {
        $sql = "DELETE FROM funcionario WHERE id =:id";
        try {
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function getFuncionario($id) {
        $sql = "SELECT * FROM funcionario WHERE id=:id";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
        return $p_sql->fetch(PDO::FETCH_ASSOC);
    }
    
    
    public function getLogin($login,$senha) {
        $sql = "SELECT * FROM funcionario WHERE login=:login and senha=:senha";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":login", $login);
        $p_sql->bindValue(":senha", $senha);
        $p_sql->execute();
        return $p_sql->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar(Funcionario $funcionario) {
        try {
            $sql = "UPDATE funcionario set nome =:nome, login=:login"
                    . " WHERE id=:id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $funcionario->getId());
            $p_sql->bindValue(":nome", $funcionario->getNome());
            $p_sql->bindValue(":login", $funcionario->getLogin());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }
    
    public function atualizarSenha(Funcionario $funcionario) {
        try {
            $sql = "UPDATE funcionario set senha =:senha"
                    . " WHERE id=:id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $funcionario->getId());
            $p_sql->bindValue(":senha", $funcionario->getSenha());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

}
