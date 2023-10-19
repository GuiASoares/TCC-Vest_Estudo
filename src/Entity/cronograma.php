<?php 
    namespace Src\Entity;

    use Src\DB\Database;

    class Cronograma {

        public $area;

        public $aulas;

        public $totalAulas;

        public function __construct($area)
        {
            $this->area = $area;
        }

        public function consultar(){
            $database = new Database('cronograma');

            $consulta = $database->select('area="'.$this->area.'"')->fetchObject();

            $this->aulas = $consulta->aulas;
            $this->totalAulas = $consulta->totalAulas;

            return true;
        }
    }
?>