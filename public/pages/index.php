<?php
    session_start();

    ?>
<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vest Estudo</title>
        <link rel="shortcut icon" type="imagex/png" href="../imgs/logoVestEstudo.png">
        <link rel="stylesheet" href="../styles/style.css">
    </head>
    
    <body>
        <header>
            <div>
                <img src="../imgs/logoVestEstudo.png" alt="Vest Estudo" class="logoVestEstudo">
            </div>
            <?php 
            if(!isset($_SESSION['nome'])){?>
            <form action="loginPage.php" id="btnsEntradaUsuario" method="get">
                <input type="submit" name="opcao" value="Cadastrar-se" style="background: rgba(255, 0, 0, 0.3);">
                <input type="submit" name="opcao" value="Login" style="background: rgba(0, 255, 255, 0.3);">
            </form>
            <?php } else { ?>
                <form action="mainPage.php" id="btnsEntradaUsuario">
                <input type="submit" value="Entrar" style="background: rgba(0, 255, 0, 0.3);">
            </form>
            <?php } ?>
    </header>
    <main>
        <article id="sliderContainer">
            <h1 id="leftArrow">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                    <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                </svg>
            </h1>
            <ul class="slider">
                <li>
                    <input type="radio" id="slide1" name="slide" checked>
                    <label for="slide1"></label>
                    <img src="../imgs/slide1.png">
                </li>
                <li>
                    <input type="radio" id="slide2" name="slide">
                    <label for="slide2"></label>
                    <img src="../imgs/slide2.png">
                </li>
                <li>
                    <input type="radio" id="slide3" name="slide">
                    <label for="slide3"></label>
                    <img src="../imgs/slide3.png">
                </li>
            </ul>
            <h1 id="rightArrow"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                    <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                </svg></h1>
        </article>
        <section>
            <h1>Dúvidas Frequentes</h1>
            <article>
                <h2>O que é o Vest Estudo? <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" id="DuvFreqVestEstudo" onclick="showDetails(this.id)"><path d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg></h2>
                <p>O Vest Estudo é um site de estudo para vestibulares específicos, com o foco principal em ajudar o usuário a elaborar um cronograma de estudo e se preparar para tais provas.</p>
            </article>
            <article>
                <h2>Para quem é o Vest Estudo?<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" id="DuvFVestEstudo" onclick="showDetails(this.id)"><path d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg></h2>
                <p>O Vest Estudo é um site destinado à pessoas que desejam integrar em faculdades com vestibulares específicos, tais como: USP, Unesp e Unicamp.</p>
            </article>
        </section>

    </main>
    <footer>
        <div>
            <h2>Copyright © 2023</h2>
        </div>
    </footer>
    <script src="../scripts/script.js"></script>
</body>

</html>