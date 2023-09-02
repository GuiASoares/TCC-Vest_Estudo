const labelLogin = document.getElementById("lblLogin");
const labelCadastrar = document.getElementById("lblCadastrar");
const rbLogin = document.getElementById("loginRb");
const rbCadastrar = document.getElementById("cadastrarRb");

rbLogin.addEventListener("change", 
function Checked(){
    labelLogin.style.backgroundColor = "#c0c0c0";
    labelCadastrar.style.backgroundColor = "#e0e0e0";
});
rbCadastrar.addEventListener("change",
function Checked(){
    labelCadastrar.style.backgroundColor = "#c0c0c0";
    labelLogin.style.backgroundColor = "#e0e0e0";
});