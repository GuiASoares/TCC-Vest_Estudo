const menu = document.getElementById("menu");
const userMenu = document.getElementById("userMenu");
const menuOpen = document.getElementById("menuOpen");
const menuClose = document.getElementById("menuClose");
const itemsText = document.getElementsByClassName("itemsText");
const dropdown = document.querySelectorAll('.dropdown');

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

window.addEventListener('click', (e) => {
    const { baseVal: classTarget } = e.target.className

    if(userMenu.style.display == "none" && classTarget === 'dropdown'){
        userMenu.style.display = "block";
    } else {
        userMenu.style.display = "none";
    }

})


function loading(){
    document.getElementById('loadingDiv').style.display = "flex";  
    setTimeout(()=>{
        window.stop();
        document.getElementById('loadingDiv').style.display = "none";
        document.getElementById('erroCarregarAula').style.display = "block";
    }, 30000);
}