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
    $erro == 'senhaPequena' ? $mensagemErro = 'A senha deve conter no mínimo 8 caracteres!' : '';
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
                <h1>Entrar com sua Conta</h1>
                <form class="formOption" method="get">
                    <input type="submit" name="opcao" value="Login" style="background-color: #c0c0c0;">
                    <input type="submit" name="opcao" value="Cadastrar-se" style="background-color: #e0e0e0;">
                </form>
                <form action="../../src/controllers/checagemLogin.php" method="post" class="formDados">
                    <input type="email" name="email" id="" placeholder="Digite seu e-mail">
                    <div style="display: flex; justify-content:flex-end; align-items:center;">
                        <input type="password" name="senha" id="loginPassword" placeholder="Digite sua senha" style="width: 100%;">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512" id="loginHide" onclick="showPassword('loginPassword', 'loginShow', this.id)" style="position: absolute; margin-right:0.5%; cursor:pointer;"><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" id="loginShow" onclick="showPassword('loginPassword', 'loginHide', this.id)" style="position: absolute; margin-right:0.5%; cursor:pointer; display:none;"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                    </div>
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
                <form action="../../src/controllers/checagemCadastro.php" method="post" class="formDados">
                    <input type="text" name="nome" id="" placeholder="Digite seu nome completo">
                    <input type="email" name="email" id="" placeholder="Digite seu e-mail">
                    <div style="display: flex; justify-content:flex-end; align-items:center;">
                        <input type="password" name="senha" id="cadastrarPassword" placeholder="Digite sua senha" style="width: 100%;">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512" id="cadastrarHide" onclick="showPassword('cadastrarPassword', 'cadastrarShow', this.id)" style="position: absolute; margin-right:0.5%; cursor:pointer;"><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" id="cadastrarShow" onclick="showPassword('cadastrarPassword', 'cadastrarHide', this.id)" style="position: absolute; margin-right:0.5%; cursor:pointer; display:none;"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                    </div>
                    <div style="display: flex; justify-content:flex-end; align-items:center;">
                        <input type="password" name="senhaConfirma" id="cadastrarConfirmPassword" placeholder="Confirme sua senha" style="width: 100%;">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512" id="cadastrarConfirmHide" onclick="showPassword('cadastrarConfirmPassword', 'cadastrarConfirmShow', this.id)" style="position: absolute; margin-right:0.5%; cursor:pointer;"><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" id="cadastrarConfirmShow" onclick="showPassword('cadastrarConfirmPassword', 'cadastrarConfirmHide', this.id)" style="position: absolute; margin-right:0.5%; cursor:pointer; display:none;"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                    </div>
                    <p><?=$mensagemErro?></p>
                    <input type="submit" value="Cadastrar-se" id="btnEntrar">
                </form>
            <?php } ?>

        </section>
    </main>
    <script src="../scripts/loginScript.js"></script>
</body>

</html>