<section id="container">
    <h2>Bem-vindo <?=$_SESSION['nome']?>!</h2>

    <?php if($_SESSION['curso']){ ?>
        <p>Estude seguindo o seu cronograma de estudos ou por aulas da sua escolha.</p>
        <section id="containerMainOptions">
            <div class="mainOptions">
                <div>
                    <h3>Acessar Cronograma</h3>
                    <p>Continue estudando conforme seu cronograma:</p>
                </div>
                <a href="?opcao=cronogramaInclude" style="min-width: 40%;"><button style="background: rgba(0, 255, 0, 0.3);" class="buttonMainOptions">Cronograma</button></a>
            </div>
            <div class="mainOptions">
                <div>
                    <h3>Estudar por Conta</h3>
                    <p>Estude sozinho da maneira que preferir:</p>
                </div>
                <a href="?opcao=aulas" style="min-width: 40%;"><button style="background: rgba(0, 255, 255, 0.3);" class="buttonMainOptions">Aulas</button></a>
            </div>
        </section>
    <?php } else {?>
        <p>Crie um cronograma de estudo para começar sua preparação para os vestibulares!</p>
        <a href="?opcao=cronogramaInclude"><input type="button" value="Criar Cronograma" id="criarCronograma"></a>
    <?php } ?>
</section>