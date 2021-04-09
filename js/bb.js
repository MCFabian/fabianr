// JavaScript Document
var UD_MENU_OPEN = false;

function toggleMenu() {
    "use strict";
    console.log("Changing menu status");
    UD_MENU_OPEN = !UD_MENU_OPEN;
    document.getElementById("bb-btn").classList.toggle("is-active", UD_MENU_OPEN);
    document.getElementById("nav").classList.toggle("nav-active", UD_MENU_OPEN);
    document.getElementById("overlay").classList.toggle("overlay-active", UD_MENU_OPEN);
}

window.addEventListener("load", function(){
    document.getElementById("overlay").addEventListener("click", function(){
        UD_MENU_OPEN = !UD_MENU_OPEN;
        document.getElementById("bb-btn").classList.toggle("is-active", UD_MENU_OPEN);
        document.getElementById("nav").classList.toggle("nav-active", UD_MENU_OPEN);
        document.getElementById("overlay").classList.toggle("overlay-active", UD_MENU_OPEN);
        
    });
})


