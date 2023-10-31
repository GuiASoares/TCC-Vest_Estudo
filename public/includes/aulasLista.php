<?php
    include('../../src/controllers/checagemMateria.php');
?>
<section id="container">
    <section>
    <button><a href="mainPage?opcao=aulas">Voltar</a></button>
        <h1><?=$titulo?></h1>
    </section>
    <section id="listaAulas">
        <?php foreach($aulas as $aula){ ?>
            <a href="../pages/aulaPage.php?aula=<?=$aula['id']?>" style="width: max-content;" onclick="loading()"><?=$aula['nome']?></a>
        <?php } ?>
    </section>
</section>
<div id="loadingDiv" style="display: none;">
    <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>