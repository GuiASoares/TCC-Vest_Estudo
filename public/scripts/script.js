const leftArrow = document.getElementById('leftArrow');
const rightArrow = document.getElementById('rightArrow');
const slider = document.getElementsByName('slide');
let sliderCount = 0;
let controller = 0;

setInterval(() =>{
    rightArrow.onclick = () => {nextSlide();};
    leftArrow.onclick = () => {previousSlide();};
    if(controller == 1){
        controller = 0;
        return;
    }else{
    nextSlide();
    }
}, 5000);

function nextSlide(){
    if(sliderCount == 2){
        sliderCount = 0;
    } else{
        sliderCount++;
    }
    slider.item(sliderCount).checked = true;
    controller = 1;
}

function previousSlide(){
    if(sliderCount == 0){
        sliderCount = 2;
    } else {
        sliderCount--;
    }
    slider.item(sliderCount).checked = true;
    controller = 1;
}

function showDetails(id) {
    let clicked = document.getElementById(id);
    let parent = clicked.parentElement;
    let paragraph = parent.nextElementSibling;
    
    if (paragraph.style.animationName == "duvFreqAnimation") {
        paragraph.style.animationName = "duvFreqAnimation-reverse";
    } else{
        paragraph.style.animationName = "duvFreqAnimation";
    }
}

// let header = document.querySelector("header");
// let sticky = header.offsetTop;

// window.onscroll = function() {
//     if (window.pageYOffset > sticky) {
//         header.classList.add("sticky");
//       } else {
//         header.classList.remove("sticky");
//       }
// }