<?php
    require('../../vendor/autoload.php');

    use Src\Entity\Questao;
    use Dompdf\Dompdf;
    use Dompdf\Options;

    if(isset($_GET['materia'], $_GET['faculdade'])){
        $materia = $_GET['materia'];
        $faculdade = $_GET['faculdade'];
    
        $questao = new Questao($materia, $faculdade);
        
        $questoes = $questao->consultarQuestoes();

        if(!$questoes){
            echo "<script>javascript:history.go(-1)</script>";
            exit;
        }

        $options = new Options();
        $options->setChroot(__DIR__);
        $options->setIsRemoteEnabled(true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(utf8_encode($questoes[0]['conteudo']));
        $dompdf->addInfo('Title', utf8_encode($questoes[0]['nome']));
        $dompdf->render();
        header('Content-type: application/pdf; charset=UTF-8');
        echo $dompdf->output();

    } else{
        echo "<script>javascript:history.go(-1)</script>";
        exit;
    }
