<?php
class Produtos {
    
    private $id;
    private $descricao;
    private $categoria;
    private $preco;
    private $imagem;
    private $promocao;
    
    function getPromocao() {
        return $this->promocao;
    }

    function setPromocao($promocao) {
        $this->promocao = $promocao;
    }
        
    function getId() {
        return $this->id;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getPreco() {
        return $this->preco;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }




}
