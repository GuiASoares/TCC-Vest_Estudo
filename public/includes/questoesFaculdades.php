<?php
    if(!isset($_GET['materia'], $_GET['titulo'])){
        echo "<script>javascript:history.go(-1)</script>";
        exit;
    } else {
        $materia = $_GET['materia'];
        $titulo = $_GET['titulo'];
    }
?>
<section id="container">
    <section id="tituloListaAulas">
        <a href="?opcao=questoes"><button>Voltar</button></a>
        <h1>Faculdades</h1>
    </section>
    <article style="justify-content: center; gap: 10px;">
        <a href="?opcao=questoesLista&materia=<?=$materia?>&titulo=<?=$titulo?>&faculdade=unesp" class="mainOptions questoesFaculdades">
                <img src="../imgs/logoUnesp.svg" alt="UNESP" style="width: 80%;">
        </a>
        <a href="?opcao=questoesLista&materia=<?=$materia?>&titulo=<?=$titulo?>&faculdade=usp" class="mainOptions questoesFaculdades">
                <img src="../imgs/logoUsp.png" alt="USP" style="width: 70%;">
        </a>
        <a href="?opcao=questoesLista&materia=<?=$materia?>&titulo=<?=$titulo?>&faculdade=unicamp" class="mainOptions questoesFaculdades">
            <img src="../imgs/logoUnicamp.png" alt="UNICAMP" style="width: 52.5%;">
        </a>
    </article>
</section>