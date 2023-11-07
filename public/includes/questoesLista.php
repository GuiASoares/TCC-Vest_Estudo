<?php
    include('../../src/controllers/checagemQuestao.php');
?>
<section id="container">
    <section id="tituloListaAulas">
        <a href="?opcao=questoesFaculdades&materia=<?=$materia?>&titulo=<?=$titulo?>"><button>Voltar</button></a>
        <h1>Questões - <?=$titulo?></h1>
    </section>
    <ul id="listaAulas">
        <?php foreach($questoes as $questao){?>
            <li><a href="questaoPage.php?questao=<?=$questao['id']?>" onclick="loading()"><?=$questao['nome']?></a></li>
        <?php } ?>
    </ul>
    <p id="erroCarregarAula" style="color: rgb(255, 0, 0); display: none;">Erro ao carregar questão!</p>
</section>
<div id="loadingDiv" style="display: none;">
    <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>