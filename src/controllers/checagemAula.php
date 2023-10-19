<?php
    session_start();

    require('../../vendor/autoload.php');

    use Src\Entity\Aula;

    if(!isset($_GET['aula'])){
        header('Location: ../../public/pages/mainPage.php?opcao=cronogramaInclude');
        exit;
    }

    $id = $_GET['aula'];

    $aula = new Aula($id);

    $aula->consultar();