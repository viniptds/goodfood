<?php

require "/pessoa-model.php";

class Parceiro extends Pessoa implements JsonSerializable {
    public $cnpj, $cep, $produtos;

    public function _construct()
    {

    }

    public function jsonSerialize()
    {
        return 
        [
            'cod' => $this->cod,
            'user' => $this->user,
            'nome' => $this->nome,
            'cnpj' => $this->cnpj,
            'cep' => $this->cep,
            'email' => $this->email,
            'tel' => $this->tel,
            'endereco' => $this->endereco,
            'senha' => $this->senha,
            'produtos' => $this->produtos

        ];
    }
}

?>