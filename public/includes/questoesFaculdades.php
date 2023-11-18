<?php
    if(!isset($_GET['materia'])){
        echo "<script>javascript:history.go(-1)</script>";
        exit;
    } else {
        $materia = $_GET['materia'];
    }
?>
<section id="container">
    <section id="tituloListaAulas">
        <a href="?opcao=questoes"><button>Voltar</button></a>
        <h1>Faculdades</h1>
    </section>
    <article style="justify-content: center; gap: 10px;">
        <a href="questaoPage.php?materia=<?=$materia?>&faculdade=unesp" class="mainOptions questoesFaculdades" onclick="loading()">
                <img src="../imgs/logoUnesp.svg" alt="UNESP" style="width: 80%;">
        </a>
        <a href="questaoPage.php?materia=<?=$materia?>&faculdade=usp" class="mainOptions questoesFaculdades" onclick="loading()">
                <img src="../imgs/logoUsp.png" alt="USP" style="width: 70%;">
        </a>
        <a href="questaoPage.php?materia=<?=$materia?>&faculdade=unicamp" class="mainOptions questoesFaculdades" onclick="loading()">
            <img src="../imgs/logoUnicamp.png" alt="UNICAMP" style="width: 52.5%;">
        </a>
    </article>
    <p id="erroCarregarAula" style="color: rgb(255, 0, 0); display: none;">Erro ao carregar aula!</p>
</section>
<div id="loadingDiv" style="display: none;">
    <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>