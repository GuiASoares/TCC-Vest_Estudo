<?php
    require('../../vendor/autoload.php');

    use Src\Entity\Questao;

    if(!isset($_GET['materia'], $_GET['titulo'], $_GET['faculdade'])){
        echo "<script>javascript:history.go(-1)</script>";
        exit;
    }

    $materia = $_GET['materia'];
    $titulo = $_GET['titulo'];
    $faculdade = $_GET['faculdade'];

    $questao = new Questao($materia, $faculdade);
    
    $consulta = $questao->consultarQuestoes();