<?php
    namespace Src\Entity;

    use Src\DB\Database;

    class Questao{
        public $materia;

        public $faculdade;

        public function __construct($materia = '', $faculdade = ''){
            $this->materia = $materia;
            $this->faculdade = $faculdade;
        }

        public function consultarQuestoes(){
            $database = new Database('questoes');
            
            $consulta = $database->select('materia="'.$this->materia.'" AND faculdade="'.$this->faculdade.'"')->fetchAll();

            return $consulta;
        }
    }