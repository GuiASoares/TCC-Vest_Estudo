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
                if (isset($_POST["login"])) { ?>
                <h1>Entrar com sua Conta</h1>
                <form class="formOption" method="post">
                    <input type="submit" name="login" value="Login" style="background-color: #c0c0c0;">
                    <input type="submit" name="cadastrar" value="Cadastrar-se" style="background-color: #e0e0e0;">
                </form>
                <form action="mainPage.html" class="formDados">
                    <input type="email" name="email" id="" placeholder="Digite seu e-mail">
                    <input type="password" name="password" id="" placeholder="Digite sua senha">
                    <a href="">Esqueci a senha</a>
                    <input type="submit" value="Entrar" id="btnEntrar">
                </form>
            <?php } ?>
            <?php
            if (isset($_POST["cadastrar"])) { ?>
                <h1>Crie sua Conta</h1>
                <form class="formOption" method="post">
                    <input type="submit" name="login" value="Login" style="background-color: #e0e0e0;">
                    <input type="submit" name="cadastrar" value="Cadastrar-se" style="background-color: #c0c0c0;">
                </form>
                <form action="mainPage.html" class="formDados">
                    <input type="text" name="nome" id="" placeholder="Digite seu nome completo">
                    <input type="email" name="email" id="" placeholder="Digite seu e-mail">
                    <input type="password" name="password" id="" placeholder="Digite sua senha">
                    <input type="password" name="passwordConfirm" id="" placeholder="Confirme sua senha">
                    <input type="submit" value="Cadastrar-se" id="btnEntrar">
                </form>
            <?php } ?>

        </section>
    </main>
    <script src="../scripts/loginScript.js"></script>
</body>

</html>