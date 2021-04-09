// JavaScript Document
var UD_MENU_OPEN = false;

function toggleMenu() {
    "use strict";
    console.log("Changing menu status");
    UD_MENU_OPEN = !UD_MENU_OPEN;
    document.getElementById("bb-btn").classList.toggle("is-active", UD_MENU_OPEN);
    document.getElementById("responsivenav").classList.toggle("responsivenav-active", UD_MENU_OPEN);
}