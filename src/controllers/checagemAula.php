<?php 
    session_start();

    require('../../vendor/autoload.php');

    use Src\Entity\Aula;
    use Dompdf\Dompdf;
    use Dompdf\Options;

    if(!isset($_GET['aula']) || !isset($_SESSION['email'])){
        header('Location: ?opcao=cronogramaInclude');
        exit;
    }

    $id = $_GET['aula'];
    
    $aula = new Aula($id);
    
    $aula->consultar();
    
    $options = new Options();
    $options->setChroot(__DIR__);
    $options->setIsRemoteEnabled(true);

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml(utf8_encode($aula->conteudo));
    $dompdf->addInfo('Title', utf8_encode($aula->nome));
    $dompdf->render();
    header('Content-type: application/pdf; charset=UTF-8');
    echo $dompdf->output();