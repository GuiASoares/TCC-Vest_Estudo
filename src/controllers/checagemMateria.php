<?php
    require('../../vendor/autoload.php');

    use Src\Entity\Aula;

    if(!isset($_GET['materia'], $_GET['titulo'])){
        $materia = "Nenhuma matéria selecionada!";
    } else {
        $materia = $_GET['materia'];
        $titulo = $_GET['titulo'];

        $aula = new Aula('',$materia);
        $aulas = $aula->consultarMateria();
    }
