<?php 
    session_start();

    require('../../vendor/autoload.php');

    use Src\Entity\Aula;
    use Src\Entity\CronogramaUsuario;

    if(!isset($_GET['aula']) || !isset($_SESSION['email'])){
        header('Location: ?opcao=cronogramaInclude');
        exit;
    }

    $id = $_GET['aula'];

    $aula = new Aula($id);

    $aula->consultar();
