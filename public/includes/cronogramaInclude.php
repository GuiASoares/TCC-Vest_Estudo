<section id="container">
    <h2>Cronograma de Estudo</h2>

    <?php 
        $erro = $_GET['erro'] ?? '';
        $mensagemErro = $erro == 'dataInadequada' ? 'As datas inseridas estão inadequadas!' : '';
        if(isset($_SESSION['curso'], $_SESSION['aulas'])){
        include('../../src/controllers/checagemCronogramaUsuario.php');
        $aulas = explode(',',$_SESSION['aulas']);
            if(count($aulasConcluidas) - 1 == count($aulas)){
    ?>
        <p>Você concluiu seu cronograma de estudo, veja nossos materiais de estudo para revisar as matérias.</p>
        <?php } else {?>
        <p>Estude seguindo o seu cronograma de estudos ou por aulas da sua escolha.</p>

        <section id="listaAulas">
            <h2>Semana <?=($semanasConcluidas + 1)?></h2>
            <?php
            for($i = ($semanasConcluidas * $aulasSemana); $i < ($aulasSemana + $aulasSemana * $semanasConcluidas); $i++){
                if($i < count($aulas)){ 
                $aula->__construct($aulas[$i]);
                $aula->consultar();
                ?>
                <?php if(in_array($aulas[$i], $aulasConcluidas)){?>
                    <p><?=$aula->nome?> - Concluída</p>
                <?php } else {?>
                <div>
                    <a href="../pages/aulaPage.php?aula=<?=$aulas[$i]?>"  onclick="loading()"><?=$aula->nome?></a>
                    <button><a href="../../src/controllers/concluirAula.php?id=<?=$aulas[$i]?>">Concluir</a></button>
                </div>
            <?php }}}}?>
        </section>
    <?php } else {?>
        <p>Crie um cronograma de estudo para começar sua preparação para os vestibulares!</p>
        <form action="../../src/controllers/checagemCronograma.php" method="post" id="formCronograma">
            <div>
                <label for="cursoSelect">Qual é a área do curso que deseja prestar?</label>
                <select name="curso" id="cursoSelect">
                    <option value="linguagens">Linguagens</option>
                    <option value="exatas">Exatas</option>
                    <option value="humanas">Humanas</option>
                    <option value="biologicas">Biológicas</option>
                </select>
            </div>
            <div>
                <label for="dataInicial">Qual a data de início dos seus estudos?</label>
                <input type="date" name="dataInicial" id="dataInicial" class="datas" required>
            </div>
            <div>
                <label for="dataFinal">Qual a data de término dos seus estudos?</label>
                <input type="date" name="dataFinal" id="dataFinal" class="datas" required>
            </div>
            <div>
                <p style="color: rgb(255, 0, 0);"><?=$mensagemErro?></p>
            </div>
            <input type="submit" value="Criar" id="criar">
        </form>
    <?php } ?>
</section>
<div id="loadingDiv" style="display: none;">
    <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>