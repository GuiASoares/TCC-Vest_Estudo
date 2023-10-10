function showPassword(inputId, invisibleSvgId, visibleSvgId){
    const input = document.getElementById(inputId);
    const invisibleSvg = document.getElementById(invisibleSvgId);
    const visibleSvg = document.getElementById(visibleSvgId);

    invisibleSvg.style.display = 'block';
    visibleSvg.style.display = 'none';

    if(input.type == 'password'){
        input.type = 'text';
    } else {
        input.type = 'password';
    }
}