var myIndex = 0;

changeSlide();

    function changeSlide() {
        var i;
        var slide1 = document.getElementsByClassName("mySlide1");
        var slide2 = document.getElementsByClassName("mySlide2");
        var slide3 = document.getElementsByClassName("mySlide3");

        for (i = 0; i < slide1.length; i++) {
            slide1[i].style.display = "none";  
            slide2[i].style.display = "none";  
            slide3[i].style.display = "none";  
        }
        
        if (myIndex > slide1.length) {
            myIndex = 0
        }         


        slide1[myIndex].style.display = "block";  
        slide2[myIndex].style.display = "block";  
        slide3[myIndex].style.display = "block";  

        setTimeout(changeSlide, 5000 );    
    }

    function dois() {
        var i;
        var x = document.getElementsByClassName("mySlide1");
        for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";  
        }
        myIndexdois++;
        if (myIndexdois > x.length) {
            myIndexdois = 1
        }    
        x[myIndexdois-1].style.display = "block";  
        setTimeout(dois, 5000 ); // TEMPO PARA PASSAR A IMAGEM -->     
    }

    
    function tres() {
        var i;
        var x = document.getElementsByClassName("mySlide3");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        myIndextres++;
        if (myIndextres > x.length) {
            myIndextres= 1
        }    
        x[myIndextres-1].style.display = "block";  
        setTimeout(tres, 5000 ); // TEMPO PARA PASSAR A IMAGEM -->     
    }