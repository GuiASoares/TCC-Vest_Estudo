<?php 
    session_start();

    require('../../vendor/autoload.php');

    use Src\Entity\Usuario;
    use Src\Entity\CronogramaUsuario;
    use Src\Entity\Cronograma;

    $dataInicial = $_POST['dataInicial'];
    $dataFinal = $_POST['dataFinal'];
    $curso = $_POST['curso'];
    $data = new DateTime(date('Y-m-d'));
    $dataDiff = date_interval_format(date_diff(new DateTime($dataInicial), new DateTime($dataFinal)), '%R%a');
    $dataAtualDiff = date_interval_format(date_diff($data, new DateTime($dataInicial)), '%R%a') + 1;
    $semanasEstudo = ($dataDiff % 7) == 0 ? (int) ($dataDiff / 7) : (int) ($dataDiff / 7 + 1);

    if($dataDiff <= 0 || $dataAtualDiff < 0){
        header('Location: ../../public/pages/mainPage.php?erro=dataInadequada&opcao=cronogramaInclude');
        exit;
    } else {
        $usuario = new Usuario($_SESSION['nome'], $_SESSION['email'], '', $curso, (string) $dataInicial, (string) $dataFinal, $semanasEstudo);
        $usuario->atualizarCurso();
        $_SESSION['curso'] = $usuario->curso;

        $cronograma = new Cronograma($_SESSION['curso']);
        $cronograma->consultar();

        $_SESSION['aulas'] = $cronograma->aulas;

        $aulasSemana = ($cronograma->totalAulas % $semanasEstudo) == 0 ? (int) ($cronograma->totalAulas / $semanasEstudo) : (int) ($cronograma->totalAulas / $semanasEstudo + 1);

        $cronogramaUsuario = new CronogramaUsuario($_SESSION['email'], $_SESSION['curso'], $aulasSemana);
        $cronogramaUsuario->criarCronograma();

        header('Location: ../../public/pages/mainPage.php?opcao=cronogramaInclude');
        exit;
    }
?>