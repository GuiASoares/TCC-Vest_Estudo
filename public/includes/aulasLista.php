<?php
    include('../../src/controllers/checagemMateria.php');
?>
<section id="container">
    <section id="tituloListaAulas">
    <a href="?opcao=aulas"><button>Voltar</button></a>
        <h1><?=$titulo?></h1>
    </section>
    <ul id="listaAulas">
        <?php foreach($aulas as $aula){ ?>
            <li><a href="../pages/aulaPage.php?aula=<?=$aula['id']?>" style="width: max-content;" onclick="loading()"><?=utf8_encode($aula['nome'])?></a></li>
        <?php } ?>
    </ul>
    <p id="erroCarregarAula" style="color: rgb(255, 0, 0); display: none;">Erro ao carregar aula!</p>
</section>
<div id="loadingDiv" style="display: none;">
    <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>