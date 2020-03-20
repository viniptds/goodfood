<?php

require ("/pessoa-model.php");

class Cliente extends Pessoa implements JsonSerializable 
{
    public $cpf, $cep, $data_n;

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
            'cpf' => $this->cpf,
            'cep' => $this->cep,
            'data_n' => $this->data_n,
            'email' => $this->email,
            'tel' => $this->tel,
            'endereco' => $this->endereco,
            'senha' => $this->senha
        ];
    }

    public function exists()
    {
        try 
        {
            $con->prepare("select count(*) as 'C' from cliente where USER = ':user'");
            $con->bindParam(":user", $this->user);
            $con->execute();
            $row = $stmt->fetch();
            echo($row);

        } 
        catch(Exception $e) 
        {
            echo($e);
            $row = 0;
        }

        
        if($row>0)
        {
			return true;
        }
        return false;
    }

    public function get() 
    {
        try 
        {
            $con->prepare("select * from cliente where USER = ':user'");
            $con->bindParam(":user", $this->user);
            $row = $con->query();

            echo($row);
            return $row;

        } 
        catch(Exception $e) 
        {
            echo($e->getMessage());
        }
        return NULL;
    }

    public function insert() 
    {
        if(!$this->exists()) 
        {
            $insere= "insert into cliente (USER,NOME, DATA_N,ENDERECO,TEL,CPF,EMAIL,SENHA,CEP) values ('$us', '$nome', '$idade', '$endereco', '$tel', '$cpf', '$email', '$senha', '$cep')";
            $resultado=mysqli_query($conexao, $insere);
            return $resultado;
        }
        return false;
    }
}

?>