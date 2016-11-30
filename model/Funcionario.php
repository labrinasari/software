<?php

class Funcionario {
    private $cpf_funcionarios;
    private $nome;
    private $funcao;
    private $endereco;
    private $login;
    private $senha;
    
    function getCpf_funcionarios() {
        return $this->cpf_funcionarios;
    }

    function getNome() {
        return $this->nome;
    }

    function getFuncao() {
        return $this->funcao;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function setCpf_funcionarios($cpf_funcionarios) {
        $this->cpf_funcionarios = $cpf_funcionarios;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setFuncao($funcao) {
        $this->funcao = $funcao;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }




}
