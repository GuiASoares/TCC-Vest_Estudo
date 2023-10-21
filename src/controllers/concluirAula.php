<?php 
    session_start();

    require('../../vendor/autoload.php');

    use Src\Entity\CronogramaUsuario;

    if(!isset($_GET['id'])){
        header('Location: ../../public/pages/mainPage.php?opcao=cronogramaInclude');
        exit;
    }

    $cronogramaUsuario = new CronogramaUsuario($_SESSION['email']);
    $cronogramaUsuario->consultar();

    $aulasConcluidas = $cronogramaUsuario->aulasConcluidas;
    $aulasConcluidas .= $_GET['id'] . ',';

    $atualizacao = $cronogramaUsuario->atualizar(['aulasConcluidas' => $aulasConcluidas]);

    $cronogramaUsuario->consultar();
    $aulasConcluidas = explode(',',$cronogramaUsuario->aulasConcluidas);
    $semanasConcluidas = $cronogramaUsuario->semanasConcluidas;
    $aulasSemana = $cronogramaUsuario->aulasSemana;

    if(count($aulasConcluidas) == $aulasSemana * ($semanasConcluidas + 1) + 1){
        $semanasConcluidas++;
        $cronogramaUsuario->atualizar(['semanasConcluidas' => $semanasConcluidas]);
    }

    echo $aulasConcluidas;
    if($atualizacao){
        header('Location: ../../public/pages/mainPage.php?opcao=cronogramaInclude');
        exit;
    }

?>