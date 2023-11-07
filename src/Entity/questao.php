<?php
    namespace Src\Entity;

    use Src\DB\Database;

    class Questao{
        public $id;

        public $materia;

        public $faculdade;

        public function __construct($id = '', $materia = '', $faculdade = ''){
            $this->id = $id;
            $this->materia = $materia;
            $this->faculdade = $faculdade;
        }

        public function consultarQuestoes(){
            $id = $this->id != '' ? "id=".$this->id : '';
            $materia = $this->materia != '' ? "materia='".$this->materia."'" : '';
            $faculdade = $this->faculdade != '' ? "faculdade='".$this->faculdade."'" : '';
            $where = $id ? [$id] : [$materia, $faculdade];
            $database = new Database('questoes');
            
            $consulta = $database->select(implode(' AND ', $where))->fetchAll();

            return $consulta;
        }
    }