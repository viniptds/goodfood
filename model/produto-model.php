<?php

class Produto implements JsonSerializable {
    private $cod, $nome, $descricao, $preco, $genero;

    public function _construct()
    {

    }

    public function jsonSerialize()
    {
        return 
        [
            'cod' => $this->cod,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'genero' => $this->genero
        ];
    }
}

?>