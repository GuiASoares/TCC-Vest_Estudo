<?php 
    require('../../vendor/autoload.php');

    use Src\Entity\Cronograma;
    use Src\Entity\CronogramaUsuario;
    use Src\Entity\Aula;

    if(isset($_SESSION['curso'])){
        $cronograma = new Cronograma($_SESSION['curso']);
        $cronograma->consultar();

        $cronogramaUsuario = new CronogramaUsuario($_SESSION['email']);
        $cronogramaUsuario->consultar();

        $aula = new Aula();

        $aulasSemana = $cronogramaUsuario->aulasSemana;
        $aulasConcluidas = explode(',',$cronogramaUsuario->aulasConcluidas);
        $semanasConcluidas = $cronogramaUsuario->semanasConcluidas;
    }

    
?>