<?php
    session_start();

    require("../../vendor/autoload.php");

    use Src\Entity\Usuario;

    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $senhaConfirma = $_POST['senhaConfirma'] ?? '';
    if(!$nome || !$email || !$senha || !$senhaConfirma){
        header('Location: loginPage.php?erro=entradasErro&opcao=Cadastrar-se');
        exit;
    } else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('Location: loginPage.php?erro=emailInvalido&opcao=Cadastrar-se');
            exit;
        }
        if($senha != $senhaConfirma){
            header('Location: ../pages/loginPage.php?erro=senhasDiferentes&opcao=Cadastrar-se');
            exit;
        } else {
            $obUsuario = new Usuario($nome, $email, $senha);
            $cadastro = $obUsuario->cadastrar();
            if($cadastro){
                $_SESSION['nome'] = $obUsuario->nome;
                $_SESSION['curso'] = $obUsuario->curso;
                header('Location: ../pages/mainPage.php');
                exit;
            } else {
                header('Location: ../pages/loginPage.php?erro=emailExistente&opcao=Cadastrar-se');
                exit;
            }
        }
    }