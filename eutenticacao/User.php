<?php


class Escritor {
    public $nome;
    public $email;
    public $senha;
    public $id;
    public function contruir($nome, $email, $senha,$id) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->id=$id;
    }

}


class Leitor {
    public $nome;
    public $email;
    public $senha;
    public $id;
    public function contruir($nome, $email, $senha,$id) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->id=$id;
    }
    }

?>