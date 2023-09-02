function menuClicked() {
    let menu = document.getElementById("menu");
    if (menu.style.animationName == "menuOpen") {
        menu.style.animationName = "menuClose";
    } else {
        menu.style.animationName = "menuOpen";
    }
}