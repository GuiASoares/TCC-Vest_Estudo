<?php
    include('../../src/controllers/checagemQuestao.php');
?>
<section id="container">
    <section id="tituloListaAulas">
        <a href="?opcao=questoesFaculdades&materia=<?=$materia?>&titulo=<?=$titulo?>"><button>Voltar</button></a>
        <h1><?=$titulo?></h1>
    </section>
    <p><?php print_r($consulta);?></p>
</section>