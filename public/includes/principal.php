<section id="container">
    <h2>Bem-vindo à Página do Usuário!</h2>

    <?php if($_SESSION['curso']){ ?>
        <p>Estude seguindo o seu cronograma de estudos ou por aulas da sua escolha.</p>
    <?php } else {?>
        <p>Crie um cronograma de estudo para começar sua preparação para os vestibulares!</p>
        <a href="?opcao=cronogramaInclude"><input type="button" value="Criar Cronograma" id="criarCronograma"></a>
    <?php } ?>
</section>