<?php session_start(); 
if(isset($_GET["act"])){
	 if($_GET["act"]=="logout"){
session_destroy();
header("location: index.php");
exit;
}
	 }?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>GOOD FOOD - Início</title>
  <link rel="stylesheet" type="text/css" href="/s1/style.css"/>
 </head>
	 <?php include'cabecalho.php'; ?>

	 <div id="banner"> 
     <img src="imagens/banner.png" width="945px"
	height="270px">
	 </div>

	 <div id="conteudo"> 
	 
	 <div class="chamada">

     <!-- SLIDESHOW DAS OFERTAS -->
	 <div class="w3-content w3-section" style="max-width:500px">
  
     <img class="mySlide2 w3-animate-fading" src="imagens/pizza.png" style="width:100%" Height="360px" align="center">
     <img class="mySlide2 w3-animate-fading" src="imagens/lanche1.png" style="width:100% " Height="360px" align="center">
     <img class="mySlide2 w3-animate-fading" src="imagens/lanche2.png" style="width:100% " Height="360px" align="center">
 
     
	  <!--ANIMAÇÃO DO SLIDE -->
     <script>
      var myIndexum = 0;
um();

function um() {
    var i;
    var x = document.getElementsByClassName("mySlide2");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndexum++;
    if (myIndexum > x.length) {myIndexum = 1}    
    x[myIndexum-1].style.display = "block";  
    setTimeout(um, 5000 ); <!-- TEMPO PARA PASSAR A IMAGEM -->     
}
</script>
	 </div>
	 </div>

	 <div class="chamada">

<!-- SLIDESHOW DAS OFERTAS -->
	 <div class="w3-content w3-section" style="max-width:500px">
  
     <img class="mySlide1 w3-animate-fading" src="imagens/sorvete.png" style="width:100%" Height="360px" align="center">
     <img class="mySlide1 w3-animate-fading" src="imagens/sorvete3.png" style="width:100% " Height="360px" align="center">
     <img class="mySlide1 w3-animate-fading" src="imagens/sorvete2.png" style="width:100% " Height="360px" align="center">
 
     
	  <!--ANIMAÇÃO DO SLIDE -->
     <script>
      var myIndexdois = 0;
dois();

function dois() {
    var i;
    var x = document.getElementsByClassName("mySlide1");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndexdois++;
    if (myIndexdois > x.length) {myIndexdois = 1}    
    x[myIndexdois-1].style.display = "block";  
    setTimeout(dois, 5000 ); <!-- TEMPO PARA PASSAR A IMAGEM -->     
}
</script>
	 </div>
	 </div>

	 <div class="chamada">
	 <!-- SLIDESHOW DAS OFERTAS -->
	 <div class="w3-content w3-section" style="max-width:500px">

     <img class="mySlide4 w3-animate-fading" src="imagens/bebida.png" style="width:100%" Height="360px" align="center">
     <img class="mySlide4 w3-animate-fading" src="imagens/bebida1.png" style="width:100% " Height="360px" align="center">
     <img class="mySlide4 w3-animate-fading" src="imagens/bebida2.png" style="width:100% " Height="360px" align="center">

	  <!--ANIMAÇÃO DO SLIDE -->
     <script>
      var myIndextres = 0;
tres();

function tres() {
    var i;
    var x = document.getElementsByClassName("mySlide4");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndextres++;
    if (myIndextres > x.length) {myIndextres= 1}    
    x[myIndextres-1].style.display = "block";  
    setTimeout(tres, 5000 ); <!-- TEMPO PARA PASSAR A IMAGEM -->     
}
</script>
</div>
</div>
</div>
	 
 </body>
</html>
