<?php
    require('../../vendor/autoload.php');

    use Src\Entity\Questao;
    use Dompdf\Dompdf;
    use Dompdf\Options;

    if(isset($_GET['materia'], $_GET['titulo'], $_GET['faculdade'])){
        $materia = $_GET['materia'];
        $titulo = $_GET['titulo'];
        $faculdade = $_GET['faculdade'];
    
        $questao = new Questao('', $materia, $faculdade);
        
        $questoes = $questao->consultarQuestoes();

    } else if(isset($_GET['questao'])){
        $id = $_GET['questao'];

        $questao = new Questao($id);

        $questoes = $questao->consultarQuestoes();

        $options = new Options();
        $options->setChroot(__DIR__);
        $options->setIsRemoteEnabled(true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($questoes[0]['conteudo']);
        $dompdf->addInfo('Title', $questoes[0]['nome']);
        $dompdf->render();
        header('Content-type: application/pdf; charset=UTF-8');
        echo $dompdf->output();

    } else{
        echo "<script>javascript:history.go(-1)</script>";
        exit;
    }
