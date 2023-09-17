const menu = document.getElementById("menu");
const menuOpen = document.getElementById("menuOpen");
const menuClose = document.getElementById("menuClose");
const itemsText = document.getElementsByClassName("itemsText");

function menuClicked() {
    if (menu.style.animationName == "menuOpen") {
        for(i = 0; i < itemsText.length; i++)
            itemsText[i].style.display = "none";
        menuOpen.style.display = "block";
        menuClose.style.display = "none";
        menu.style.animationName = "menuClose";
    } else {
        for(i = 0; i < itemsText.length; i++)
            itemsText[i].style.display = "block";
        menuOpen.style.display = "none";
        menuClose.style.display = "block";
        menu.style.animationName = "menuOpen";
    }
}