<?php

abstract class Pessoa 
{
    public $cod, $user, $nome, $endereco, $tel, $email, $senha;

    public function _construct()
    {

    }
    public function login(){

    }
    public function logout(){

    }
    public function get()
    {
        return $this;
    }

}

?>