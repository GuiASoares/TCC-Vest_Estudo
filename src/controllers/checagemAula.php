<?php 
    session_start();

    require('../../vendor/autoload.php');

    use Src\Entity\Aula;
    use Dompdf\Dompdf;

    if(!isset($_GET['aula']) || !isset($_SESSION['email'])){
        header('Location: ?opcao=cronogramaInclude');
        exit;
    }

    $id = $_GET['aula'];
    
    $aula = new Aula($id);
    
    $aula->consultar();
    
    $dompdf = new Dompdf();
    $dompdf->loadHtml($aula->conteudo);
    $dompdf->addInfo('Title', $aula->nome);
    $dompdf->render();
    header('Content-type: application/pdf');
    echo $dompdf->output();