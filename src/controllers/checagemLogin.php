<?php
    session_start();

    require ('../../vendor/autoload.php');

    use Src\Entity\Usuario;
    use Src\Entity\Cronograma;

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (!$email || !$senha){
        header('Location: ../../public/pages/loginPage.php?erro=entradasErro&opcao=Login');
        exit;
    } else {
        $usuario = new Usuario('', $email, $senha);
        $login = $usuario->logar();

        if($login){
            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['email'] = $usuario->email;
            $_SESSION['curso'] = $usuario->curso;
            $cronograma = new Cronograma($_SESSION['curso']);

            $cronograma->consultar();

            $_SESSION['aulas'] = $cronograma->aulas;
            header('Location: ../../public/pages/mainPage.php');
            exit;
        } else {
            header('Location: ../../public/pages/loginPage.php?erro=naoEncontrado&opcao=Login');
            exit;
        }
    }