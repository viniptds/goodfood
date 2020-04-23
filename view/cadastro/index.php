<?php 
    require ABSPATH . "/view/_includes/header.php";
?> 
<link rel="stylesheet" type="text/css" href='style.css'/>
<script type="text/javascript">
    function cadastrar()
    {
        if (document.form1.nome.value=="" || document.form1.user.value=="" || document.form1.idade.value==""  || document.form1.endereco.value=="" || document.form1.tel.value=="" || document.form1.cpf.value=="" || document.form1.email.value=="" ||  document.form1.senha.value=="" || document.form1.cep.value=="" || document.form1.senha2.value=="")   
        {
		    alert("Preencha os campos")
		    return false;
        }
        else
        if(document.form1.senha2.value != document.form1.senha.value)
        {
            alert("Senhas não coincidem!")
            return false;
        }
    }
 </script>

<br><br><br><br>

<fieldset>
    <form name="form1" method="post" action="login/createuser">
        <div id='L' style="float:left;"> 
            Nome: <br><input required="" type="text" name="nome" autofocus maxlength="200"> 
            <br> <br>
            Usuário: <br><input required="" type="text" name="user" maxlength="200">
            <br> <br>
            Data de Nascimento: <br><input required="" type="date" name="idade">
            <br><br>
            Endereço: <br><input required="" type="text" name="endereco" maxlength="200">
            <br><br>
            Telefone: <br><input required="" type="text" name="tel" maxlength="15">
        </div>
        
	    <div id="R" style="position:relative; left:60px;"> 
            CPF: <br><input required="" type="text" name="cpf" maxlength="15">
            <br><br>
            E-mail: <br><input required="" type="email" name="email" maxlength="200">
            <br><br>
            Senha: <br><input required="" type="password" name="senha" maxlength="40">
            <br><br>
            Confirma Senha: <br><input required="" type="password" name="senha2" maxlength="40">
            <br><br>
            CEP: <br><input required="" type="text" name="cep" maxlength="15">
        </div>

        <br><br>

        <div id='D'>
            <input type="submit" value="Cadastrar" onclick="cadastrar()" style="font-size:15px;;width:82px; height:30px;">
        </div>
            <br><br>
    </form>
	
		<a href="../login" style="font-size:15px;;width:82px; height:30px;text-decoration:none;color:#000;"> Entrar</a>
		<br><br>
            
        <a href="../home" style="font-size:15px;;width:82px; height:30px;text-decoration:none;color:#000;"> Página Inicial</a>
      
            </div>
    </fieldset>
 </body>
</html>
