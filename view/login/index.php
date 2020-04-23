<?php 
    require ABSPATH . "/view/_includes/header.php"; 
?>

<link rel="stylesheet" type="text/css" href='view/login/style.css'/>

<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->

<script type="text/javascript">
    function validar()
    {
        if (document.form1.user.value=="" || document.form1.senha.value=="")
        {
            alert("Preencha os campos");
            return false;
        }
        else
        if(document.form1.senha.value.length<8)
        {
            alert("Campo SENHA menor que 8 caracteres");
            return false;
        }
        else{
            document.form1.submit();
            return true;
        }
    } 
</script>

<div class="formlogin">

    <form name="form1" action="login/login" method="post" onsubmit="return validar();">

        <label for="login" >Tipo de Usuario: </label>

        <select name="tipo" id="login-option">
            <option value="0">Cliente</option>
            <option value="1">Parceiro</option>
        </select>

        <br>
        <br>            

        <label for="login">Login: </label>
        <input type="text" name="user">

        <br>
        <br>

        <label for="pass">Senha: </label>
        <input type="password" name="senha">

        <br>
        <br>

        <div id="bot">
            <input type="reset" value="Limpar" class="bt-form" >
            <input type="submit" id='sub' value="Entrar" class="bt-form" >  
            <br>
            <br>
        </div>
    </form>
	    
    <div id="nv">
        <a href="forgot"> Esqueci minha senha</a>
    </div>

    <br>
    <br>	
    
    <div id="pg">
        <a href="home"> Página Inicial</a>
    </div>
    <br>

    <div id="cd">
        <a href="cadastro">Cadastrar</a>
    </div>

</div>
<?php 
    require ABSPATH . "/view/_includes/footer.php";
?>