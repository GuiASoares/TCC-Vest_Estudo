<?php
    require('../../vendor/autoload.php');

    if(!isset($_GET['materia'], $_GET['titulo'])){
        echo "<script>javascript:history.go(-1)</script>";
        exit;
    } else {
        $materia = $_GET['materia'];
        $titulo = $_GET['titulo'];
    }