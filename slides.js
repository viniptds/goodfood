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
        setTimeout(um, 5000 ); // TEMPO PARA PASSAR A IMAGEM    
    }

    function dois() {
        var i;
        var x = document.getElementsByClassName("mySlide1");
        for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";  
        }
        myIndexdois++;
        if (myIndexdois > x.length) {myIndexdois = 1}    
        x[myIndexdois-1].style.display = "block";  
        setTimeout(dois, 5000 ); // TEMPO PARA PASSAR A IMAGEM -->     
    }

    
    function tres() {
        var i;
        var x = document.getElementsByClassName("mySlide4");
        for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
        }
        myIndextres++;
        if (myIndextres > x.length) {myIndextres= 1}    
        x[myIndextres-1].style.display = "block";  
        setTimeout(tres, 5000 ); // TEMPO PARA PASSAR A IMAGEM -->     
    }