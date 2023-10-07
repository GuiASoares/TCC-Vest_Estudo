<?php
    session_start();

    if(isset($_SESSION['nome'])){
        header('Location: index.php');
    }
    $erro = $_GET['erro'] ?? '';
    $mensagemErro = '';
    $erro == 'entradasErro' ? $mensagemErro = 'Insira todos os dados acima!' : '';
    $erro == 'senhasDiferentes' ? $mensagemErro = 'As senhas inseridas devem ser iguais!' : '';
    $erro == 'emailExistente' ? $mensagemErro = 'E-mail inserido já cadastrado!' : '';
    $erro == 'emailInvalido' ? $mensagemErro = 'Insira um e-mail existente!' : '';
    $erro == 'naoEncontrado' ? $mensagemErro = 'Usuário e/ou senha inválido(s)!' : '';
    $erro == 'sessaoInvalidada' ? $mensagemErro = 'Faça seu login para prosseguir!' : '';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagex/png" href="../imgs/logoVestEstudo.png">
    <link rel="stylesheet" href="../styles/loginStyle.css">
    <title>Entrada de Usuário</title>
</head>

<body>
    <main>
        <img src="../imgs/logoVestEstudo.png" alt="logoVestEstudo">
        <section id="container">
            <?php
                if (isset($_GET['opcao']) && $_GET['opcao'] == 'Login') { ?>
                <h1>Entrar com sua Conta <?php echo getenv('DB_HOST');?></h1>
                <form class="formOption" method="get">
                    <input type="submit" name="opcao" value="Login" style="background-color: #c0c0c0;">
                    <input type="submit" name="opcao" value="Cadastrar-se" style="background-color: #e0e0e0;">
                </form>
                <form action="../controllers/checagemLogin.php" method="post" class="formDados">
                    <input type="email" name="email" id="" placeholder="Digite seu e-mail">
                    <input type="password" name="senha" id="" placeholder="Digite sua senha">
                    <a href="">Esqueci a senha</a>
                    <p><?=$mensagemErro?></p>
                    <input type="submit" value="Entrar" id="btnEntrar">
                </form>
            <?php } ?>
            <?php
            if ((isset($_GET['opcao']) && $_GET['opcao'] == 'Cadastrar-se')) { ?>
                <h1>Crie sua Conta</h1>
                <form class="formOption" method="get">
                    <input type="submit" name="opcao" value="Login" style="background-color: #e0e0e0;">
                    <input type="submit" name="opcao" value="Cadastrar-se" style="background-color: #c0c0c0;">
                </form>
                <form action="../controllers/checagemCadastro.php" method="post" class="formDados">
                    <input type="text" name="nome" id="" placeholder="Digite seu nome completo">
                    <input type="email" name="email" id="" placeholder="Digite seu e-mail">
                    <input type="password" name="senha" id="" placeholder="Digite sua senha">
                    <input type="password" name="senhaConfirma" id="" placeholder="Confirme sua senha">
                    <p><?=$mensagemErro?></p>
                    <input type="submit" value="Cadastrar-se" id="btnEntrar">
                </form>
            <?php } ?>

        </section>
    </main>
    <script src="../scripts/loginScript.js"></script>
</body>

</html>