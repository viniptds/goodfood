<?php

require("./model/Cliente.php");

class ClienteController extends MainController
{
    private $cliente;

    public function login()
    {
        if(!isset($cliente))
        {
            
            $cliente = new Cliente();
        }
    }
}

$cli = new Cliente();


echo(json_encode($cli));


?>