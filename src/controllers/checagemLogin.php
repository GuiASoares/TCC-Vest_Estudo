<?php
    session_start();

    require ('../../vendor/autoload.php');

    use Src\Entity\Usuario;

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (!$email || !$senha){
        header('Location: ../../public/pages/loginPage.php?erro=entradasErro&opcao=Login');
        exit;
    } else {
        $obUsuario = new Usuario('', $email, $senha);
        $login = $obUsuario->logar();
        if($login){
            $_SESSION['nome'] = $obUsuario->nome;
            $_SESSION['curso'] = $obUsuario->curso;
            header('Location: ../../public/pages/mainPage.php');
            exit;
        } else {
            header('Location: ../../public/pages/loginPage.php?erro=naoEncontrado&opcao=Login');
            exit;
        }
    }