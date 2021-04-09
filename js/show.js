function show()
{   

    if (document.getElementById("none")) {        
        document.getElementById("none").setAttribute("class", "show");
    }
    else {           
        document.getElementById("show").setAttribute("class", "none");
    }


}